<?php

class Move extends Model {
	
	public $name;
	public $level;
	
	public function loadModel($id) {
		
	}

	public static function getMovesForPokemon($id) {
		$query = TPP::db()->prepare('SELECT `name` FROM `move` WHERE `pokemon` = ? LIMIT 4');
		$query->bind_param('i', $id);
		$query->execute();
		$query->bind_result($name);
		$query->store_result();
		$return = [];
		while($query->fetch()) {
			$model = new self();
			$model->name = $name;
			$return[] = $model;
		}
		return $return;
	}
}