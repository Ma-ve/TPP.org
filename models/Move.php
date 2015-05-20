<?php

class Move extends Model {
	
	public function loadModel($id) {
		
	}

	public static function getMovesForPokemon($id) {
		$query = TPP::db()->prepare('SELECT `name` FROM `move` WHERE `pokemon` = ? LIMIT 4');
		$query->bind_param('i', $id);
		$query->execute();
		$query->bind_result($name);
		$query->store_result();
		while($query->fetch()) {
			$return[] = $name;
		}
		return $return;
	}
}