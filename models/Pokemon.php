<?php

class Pokemon extends Model {

	public $id;
	public $name;
	public $pokemon;
	public $level;
	public $nickname;
	public $poke_ball;
	public $gender;
	public $hold_item;

	public function showSomething() {
		$cont = new SiteController();
		echo $cont->actionIndex();
	}

	public static function getPokemon($where = null, $order = null, $limit = null) {
		if(!is_null($where)) {
			$where = ' WHERE ' . $where;
		} if(!is_null($order)) {
			$order = ' ORDER BY ' . $order;
		} if(!is_null($limit)) {
			$limit = ' LIMIT ' . $limit;
		}
		$getPokemon = TPP::db()->query("SELECT * FROM `pokemon`" . $where . $order . $limit) or die(TPP::db()->error);
		while($pok = $getPokemon->fetch_assoc()) {
			$newPokemon = new self();
			$newPokemon->setAttributes(array(
				'id' => $pok['id'],
				'name' => $newPokemon->setName($pok['name'], $pok['pokemon']),
				'pokemon' => $newPokemon->setPokemon($pok['pokemon']),
				'level' => $newPokemon->setLevel($pok['level']),
				'nickname' => $newPokemon->setNickname($pok['nickname']),
				'poke_ball' => $newPokemon->setPokeBall($pok['poke_ball']),
				'gender' => $newPokemon->setGender($pok['gender']),
				'hold_item' => $newPokemon->setHoldItem($pok['hold_item']),
				'moves' => Move::getMovesForPokemon($pok['id']),
			));
			$newPokemon->setAttributes($newPokemon->getFields());

			$return[] = $newPokemon;
		}
		return $return;
	}

	public function getFields() {
		$fields = array();
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
			pfe.`field_id` = f.`id`");
		$i = 0;
		while($fi = $getFields->fetch_assoc()) {
			$fields[$fi['name']] = $fi['value'];
		}
		if(isset($fields['next_move'])) {
			$move = new Move();
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

	public function setName($name, $pokemon) {
		return !empty($name) ? str_replace(array(' ', '\Pk'), array('&nbsp;', '<img src="/img/pk.png" title="" alt="">'), stripslashes(utf8_encode($name))) : utf8_encode($pokemon);
	}

	public function setPokemon($pokemon) {
		return utf8_encode($pokemon);
	}

	public function setLevel($level) {
		return $level !== 0 ? $level : '?';
	}

	public function setNickname($nickname) {
		return isset($nickname) ? stripslashes(utf8_encode($nickname)) : 'No nickname';
	}

	public function setPokeBall($poke_ball) {
		$item = new Item();
		$item->setName($poke_ball);
		return $item;
	}

	public function setGender($gender) {
		return isset($gender) ? $this->getGender($gender) : null;
	}

	public function setHoldItem($hold_item) {
		if(!is_null($hold_item)) {
			$item = new Item();
			$item->setName($hold_item);
			return $item;
		}
		return null;
	}

	public static function getPartyPokemon() {
		return Pokemon::getPokemon('`status` = 1', `party_order`, '6');
	}

	public static function getBoxPokemon() {
		return Pokemon::getPokemon('`status` = 2', '`id` DESC');
	}

	public static function getDaycarePokemon() {
		return Pokemon::getPokemon('`status` = 6', '`id` DESC');
	}

	private function getGender($g) {
		$return = ' <span class="gender">(&#979';
		switch($g[0]) {
			case 'm': $return .= '4';
				break;
			case 'f': $return .= '2';
				break;
		}

		return $return . ';)</span>';
	}

	public function showImage($htmlOptions = array(), $size = null) {
		$path = '/pokemon';
		$path .= !is_null($size) ? '/80' : '';
		return parent::image($path, $this->pokemon, $htmlOptions);
	}

	public function showMenuImage($htmlOptions = array()) {
		$addToImage = '';
		$addToImage .= isset($p->season) ? '_' . $p->season : '';
		$addToImage .= isset($p->gender) ? '_' . $p->gender : '';
		$addToImage .= isset($p->is_shiny) ? '_s' : '';
		return parent::image('/pokemon/sprites/red', $this->pokemon . $addToImage, $htmlOptions);
	}

	public function getNicknames() {
		$return = '';
		$array = explode('%', $this->nickname);
		$i = 0;
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
		$return = array();
		if(isset($this->moves)) {
			$hms = FuncHelp::getHmMoves();
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

}
