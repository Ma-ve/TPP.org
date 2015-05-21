<?php

class Pokemon extends Model {

	public $id;
	public $name;
	public $pokemon;
	public $level;
	public $nickname;
	public $poke_ball;
	public $gender;
	public $held_item;

	public function showSomething() {
		$cont = new SiteController();
		echo $cont->actionIndex();
	}

	public static function getPokemon($where = null) {
		if(!is_null($where)) {
			$where = 'WHERE ' . $where;
		}
		$getPokemon = TPP::db()->query("SELECT * FROM `pokemon` " . $where . " ORDER BY `party_order` ASC LIMIT 6") or die($db->error);
		while($pok = $getPokemon->fetch_assoc()) {
			$newPokemon = new Pokemon();
			$newPokemon->setAttributes(
					array(
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

//	$hmArray = explode(';', $gen['hms']['value']);
//	$getMoves = $db->query("SELECT * FROM `move` WHERE `pokemon` = '$pok[id]'");
//	while($move = $getMoves->fetch_assoc()) {
//		$moves[$moveCounter][] = in_array($move['name'], $hmArray) ? '<strong>' . $move['name'] . '</strong>' : $move['name'];
//	} $moveCounter++;
//	$fields[] = getFields($pok['id']);
			$return[] = $newPokemon;
		}
		return $return;
	}

	private function getFields() {
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
		return $fields;
	}

	private function setName($name, $pokemon) {
		return !empty($name) ? str_replace(array(' ', '\Pk'), array('&nbsp;', '<img src="/img/pk.png" title="" alt="">'), stripslashes(utf8_encode($name))) : utf8_encode($pokemon);
	}

	private function setPokemon($pokemon) {
		return utf8_encode($pokemon);
	}

	private function setLevel($level) {
		return $level !== 0 ? $level : '?';
	}

	private function setNickname($nickname) {
		return isset($nickname) ? stripslashes(utf8_encode($nickname)) : 'No nickname';
	}

	private function setPokeBall($poke_ball) {
		$item = new Item();
		$item->setName($poke_ball);
		return $item;
	}

	private function setGender($gender) {
		return isset($gender) ? $this->getGender($gender) : null;
	}

	private function setHoldItem($hold_item) {
//		return isset($hold_item) ?
//				'Holds: '
//				. utf8_encode(stripslashes($hold_item))
//				. ' <img src="/img/items/'
//				. FuncHelp::toImage($hold_item)
//				. '.png" title="'. utf8_encode(stripslashes($hold_item))
//				. '" alt="' . utf8_encode(stripslashes($hold_item)) . '">'
//			: '<em>No held item</em>';
		$item = new Item();
		$item->setName($hold_item);
		return $item;
	}

	public static function getPartyPokemon() {
		return Pokemon::getPokemon('`status` = 1');
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

	public function showImage($htmlOptions = array()) {
		return parent::image('/pokemon', $this->pokemon, $htmlOptions);
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
			return $this->nickname;
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
				if(in_array($move, $hms)) {
					$return[] = '<strong>' . $move . '</strong>';
				} else {
					$return[] = $move;
				}
			}
		}
		return $return;
	}
}
