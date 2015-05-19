<?php

class Pokemon extends Model {

	public function showSomething() {
		$cont = new SiteController();
		echo $cont->actionIndex();
	}

	public static function getPokemon($db, $where = null) {
		if(!is_null($where)) {
			$where = 'WHERE ' . $where;
		}
		$getPokemon = $db->query("SELECT * FROM `pokemon` " . $where . " ORDER BY `party_order` ASC LIMIT 6")or die($db->error);
		while($pok = $getPokemon->fetch_assoc()) {
			$return[] = array(
				'id' => $pok['id'],
				'name' => (!empty($pok['name'])) ? str_replace(array(' ', '\Pk'), array('&nbsp;', '<img src="/img/pk.png" title="" alt="">'), stripslashes(utf8_encode($pok['name']))) : utf8_encode($pok['pokemon']),
				'pokemon' => utf8_encode($pok['pokemon']),
				'levels' => $pok['level'] != 0 ? $pok['level'] : '?',
				'nicknames' => (!empty($pok['nickname'])) ? stripslashes(utf8_encode($pok['nickname'])) : "No nickname",
				'pokeBalls' => (!empty($pok['poke_ball'])) ? utf8_encode($pok['poke_ball']) : null,
				'genders' => (!empty($pok['gender'])) ? $pok['gender'] : null,
				'heldItems' => (!empty($pok['hold_item']))
				?
					'Holds: ' . utf8_encode(stripslashes($pok['hold_item'])) .
					' <img src="/img/items/' . toImage(stripslashes($pok['hold_item'])) . '.png" title="' . utf8_encode(stripslashes($pok['hold_item'])) . '" alt="' . utf8_encode(stripslashes($pok['hold_item'])) . '">'
				:
					'<em>No held item</em>'
			);
				
			
		}
		return $return;

	}
	public static function getPartyPokemon($db) {
		return Pokemon::getPokemon($db, '`status` = 1');
	}
}