<?php

namespace TPP\Models;

use TPP\Helpers\Helper;

class Pokemon extends Model
{

	const BOXES_ROWS = 4;
	const BOXES_COLS = 5;

	public $id;
	public $name;
	public $pokemon;
	public $level;
	public $nickname;
	public $poke_ball;
	public $gender;

	/**
	 * @var $hold_item Item[]
	 */
	public $hold_item;
	public $status;
	public $box;

	/**
	 * @var $moves Move[]
	 */
	public $moves;
	public $characteristic;
	public $ability;
	public $type1;
	public $type2;
	public $time_obtained;
	public $evolves_level;
	public $has_pokerus;
	public $evolves_method;
	public $evohatch;
	public $evohatch_linked;
	public $comment;
	public $next_move;
	public $next_move_level;

	public static function getPartyPokemon() {
		return Pokemon::queryPokemon('p.`status` = 1', `party_order`, '6');
	}

	public static function queryPokemon($where = null, $order = null, $limit = null) {
		if(!is_null($where)) {
			$where = ' WHERE ' . $where;
		}
		if(!is_null($order)) {
			$order = ' ORDER BY ' . $order;
		}
		if(!is_null($limit)) {
			$limit = ' LIMIT ' . $limit;
		}
		$getPokemon = TPP::db()->query("SELECT
			p.`id`, p.`pokemon`, p.`name`, p.`level`, p.`nickname`, p.`gender`, p.`hold_item`, p.`status`, p.`box_id`, p.`poke_ball`, p.`comment`,
			GROUP_CONCAT(DISTINCT m.`name` SEPARATOR ',') AS `moves`,
			s.`status` AS `status_name`
			FROM `pokemon` p
			LEFT JOIN `move` m
			ON m.`pokemon` = p.`id`
			JOIN `status` s
			ON s.`id` = p.`status`
			" . $where . " GROUP BY p.`id`" . $order . $limit);

		$return = [];

		while($pok = $getPokemon->fetch()) {
			$newPokemon = new self();
			$newPokemon->setAttributes([
										   'id'        => $pok['id'],
										   'name'      => $newPokemon->setName($pok['name'], $pok['pokemon']),
										   'pokemon'   => $newPokemon->setPokemon($pok['pokemon']),
										   'level'     => $newPokemon->setLevel($pok['level']),
										   'nickname'  => $newPokemon->setNickname($pok['nickname']),
										   'poke_ball' => $newPokemon->setPokeBall($pok['poke_ball']),
										   'gender'    => $newPokemon->setGender($pok['gender']),
										   'hold_item' => $newPokemon->setHoldItem($pok['hold_item']),
										   'box'       => (int)$pok['box_id'],
										   'status'    => $pok['status_name'],
										   'comment'   => Helper::getDateTime($pok['comment']),
										   'moves'     => $newPokemon->setMoves($pok['moves']),
									   ]);

			$return[$newPokemon->id] = $newPokemon;
		}
		$return = self::getFieldsAll($return);

		return $return;
	}

	public function setName($name, $pokemon) {
		return !empty($name)
			? str_replace([' ', '\Pk'], ['&nbsp;', '<img src="/img/pk.png" title="" alt="">'],
						  stripslashes(Helper::utf8ify($name)))
			: Helper::utf8ify($pokemon);
	}

	public function setPokemon($pokemon) {
		return Helper::utf8ify($pokemon);
	}

	public function setLevel($level) {
		return $level !== 0 ? $level : '?';
	}

	public function setNickname($nickname) {
		return isset($nickname) ? stripslashes(utf8_encode($nickname)) : 'No nickname';
	}

	public function setPokeBall($poke_ball) {
		if($poke_ball) {
			$item = new Item();
			$item->setName($poke_ball);

			return $item;
		}
		unset($this->poke_ball);
	}

	public function setGender($gender) {
		if($gender) {
			return $this->getGender($gender);
		}
		unset($this->gender);
	}

	private function getGender($g) {
		return $g;
	}

	public function setHoldItem($hold_item) {
		if($hold_item) {
			$item = new Item();
			$item->setName($hold_item);

			return $item;
		}
		unset($this->hold_item);
	}

	public function setMoves($moves) {
		if($moves) {
			$return = [];
			if(is_string($moves)) {
				$ex = explode(',', $moves);
			} elseif(is_array($moves) && !empty($moves)) {
				$ex = $moves;
			} else {
				TPP::setError('Unknown handling of moves: ' . $moves);
				return;
			}
			foreach($ex as $m) {
				$model       = new Move();
				$model->name = $m;
				$return[]    = $model;
			}

			return $return;
		}

	}

	public static function getFieldsAll(array &$pokemon) {
		if(empty($pokemon)) {
			return $pokemon;
		}

		$ids = [];
		foreach($pokemon as $k => $p) {
			$ids[] = $p->id;
		}

		$in_query = TPP::prepareParams($ids);

		$getFields = TPP::db()->prepare("
		SELECT
			f.`name`,
			pfe.`pokemon_id`,
			pfe.`value`
		FROM
			`pokemon_field_eav` pfe,
			`field` f
		WHERE
			pfe.`pokemon_id` IN(" . implode(',', array_keys($in_query)) . ")
		AND
			pfe.`field_id` = f.`id`
		ORDER BY
			pfe.`pokemon_id` DESC")
		;

		$getFields->execute($in_query);

		$pokemon_fields = [];
		while($fi = $getFields->fetch()) {
			$pokemon_fields[$fi['pokemon_id']][$fi['name']] = $fi['value'];
		}

		foreach($pokemon_fields as $pokemon_id => $fields) {
			$pok = $pokemon[$pokemon_id];
			/**
			 * @var $pok Pokemon
			 */
			if(isset($fields['next_move'])) {
				$move       = new Move();
				$move->name = $fields['next_move'];
				unset($fields['next_move']);
				if(isset($fields['next_move_level'])) {
					$move->level = $fields['next_move_level'];
					unset($fields['next_move_level']);
				}
				$fields['next_move'] = $move;
			}
			$pok->setAttributes($fields);
		}

		return $pokemon;
	}

	public static function getBoxPokemon() {
		return Pokemon::queryPokemon('p.`status` = 2', '`id` DESC');
	}

	public static function getDaycarePokemon() {
		return Pokemon::queryPokemon('p.`status` = 6', '`id` DESC');
	}

	public static function getHistoryPokemon() {
		return Pokemon::queryPokemon('p.`status` NOT IN(1,2,6,9)', '`comment` DESC');
	}

	public function __get($name) {
		if(isset($this->$name)) {
			if(method_exists($this, $method = 'get' . ucfirst($name))) {
				return $this->$method();
			}
			return $this->$name;
		}
	}

	public function __set($name, $value) {
		if(isset($this->$name)) {
			if(method_exists($this, $method = 'set' . ucfirst($name))) {
				$this->$method($value);
			} else {
				$this->$name = $value;
			}
		}
	}

	public function getFields() {
		$fields    = [];
		$getFields = TPP::db()->query("
		SELECT
			f.`name`,
			pfe.`pokemon_id`,
			pfe.`value`
		FROM
			`pokemon_field_eav` pfe,
			`field` f
		WHERE
			pfe.`pokemon_id` = $this->id
		AND
			pfe.`field_id` = f.`id`")
		;

		while($fi = $getFields->fetch()) {
			$fields[$fi['name']] = $fi['value'];
		}
		if(isset($fields['next_move'])) {
			$move       = new Move();
			$move->name = $fields['next_move'];
			unset($fields['next_move']);
			if(isset($fields['next_move_level'])) {
				$move->level = $fields['next_move_level'];
				unset($fields['next_move_level']);
			}
			$fields['next_move'] = $move;
		}

		return $fields;
	}

	public function beautifyGender() {
		if(isset($this->gender)) {
			$return = $this->gender == 'm' ? '4' : '2';

			return ' <span class="gender">(&#979' . $return . ';)</span>';
		}

		return null;
	}

	public function showImage($htmlOptions = [], $size = null) {
		$path = '/pokemon';
		$path .= !is_null($size) ? '/80' : '';
		$pokemon = $this->pokemon;

		if($pokemon == 'Jellicent' && $this->gender == 'f') {
			$pokemon = 'Jellicent-Female';
		}

		return parent::image($path, $pokemon, $htmlOptions);
	}

	public function showImageMenu($htmlOptions = []) {
		$path    = '/pokemon/sprites/menu-static';
		$pokemon = $this->pokemon;

		if($pokemon == 'Jellicent' && $this->gender == 'f') {
			$pokemon = 'Jellicent-Female';
		}

		return parent::image($path, $pokemon, $htmlOptions);
	}

	public function showImageSprite($htmlOptions = []) {
		$addToImage = '';
		$addToImage .= isset($this->season) ? '_' . $this->season : '';
		$addToImage .= isset($this->gender) ? '_' . $this->gender : '';
		$addToImage .= isset($this->is_shiny) ? '_s' : '';

		return parent::image('/pokemon/sprites/' . TWITCHVERSION, $this->pokemon . $addToImage, $htmlOptions);
	}

	public function getNicknames() {
		if($this->nickname == '') {
			return '<em>No nickname</em>';
		}

		$return = '';
		$array  = explode('%', $this->nickname);
		$i      = 0;
		if($this->nickname == 'No nickname') {
			return '<em>' . $this->nickname . '</em>';
		} else {
			foreach($array as $ar) {
				$return .= '"' . utf8_decode($ar) . '"';
				if(count($array) > 1) {
					$return .= $i < count($array) - 1 ? ',<br>' : '';
				}
				$i++;
			}
		}
		echo $return;
	}

	public function getMoves() {
		$return = [];
		if(isset($this->moves)) {
			$hms = Helper::getHmMoves();
			foreach($this->moves as $move) {
				if(in_array($move->name, $hms)) {
					$return[] = '<strong>' . $move->name . '</strong>';
				} else {
					$return[] = $move->name;
				}
			}
		}

		return $return;
	}

	public function getHistoryStatusText() {
		switch($this->status) {
			case 'Traded':
				return 'for';
			case 'Evolved':
				return 'into';
			case 'Hatched':
				return 'into';
			default:
				return null;
		}
	}

	public function getHistoryColour() {
		return strtolower($this->status);
	}

	public function getAbilityDescription() {
		return $this->ability;
	}

	public function getNatureDescription() {
		return $this->nature;
	}

	public function getCharacteristicDescription() {
		return $this->characteristic;
	}

	public function getComment($secs = false) {
		if(is_numeric($this->comment)) {
			return Helper::getDateTime($this->comment, $secs);
		}

		return $this->comment;
	}
}
