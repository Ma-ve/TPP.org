<?php

namespace TPP\Models;

class EliteFour extends Trainer {

	public $id;
	public $name;
	public $type;
	public $attempts;
	public $wins;
	public $losses;
	public $time;
	public $is_rematch;
	public $order;

	public function __construct() {
		
	}

	public static function getEliteFour($where = null, $limit = null, $order = ' `order`, `id` ') {
		if(!is_null($where)) {
			$where = 'WHERE ' . $where;
		}

		$getEliteFour = TPP::db()->query("SELECT
			e.`id`,
			e.`name`,
			e.`type`,
			e.`attempts`,
			e.`wins`,
			e.`losses`,
			e.`time`,
			e.`is_rematch`,
			e.`order`,
			GROUP_CONCAT(DISTINCT CONCAT_WS(':', efp.`pokemon`, efp.`level`) SEPARATOR ',') as `pokemon`
			FROM `elite_four` e JOIN `elite_four_pokemon` efp ON efp.`elite_four_id` = e.`id`" . $where . " GROUP BY e.`id` ORDER BY " . $order . $limit);

		if(!$getEliteFour) return [];

		while($eliteFour = $getEliteFour->fetch()) {
			$newE4 = new self();
			$newE4->setAttributes([
				'id' 		=> (int) $eliteFour['id'],
				'name' 		=> $eliteFour['name'],
				'type' 		=> $eliteFour['type'],
				'attempts' 	=> (int) $eliteFour['attempts'],
				'wins' 		=> (int) $eliteFour['wins'],
				'losses' 	=> (int) $eliteFour['losses'],
				'time' 		=> $eliteFour['time'],
				'order' 	=> (int) $eliteFour['order'],
				'is_rematch' => (bool) $eliteFour['is_rematch'],
				'pokemon' => parent::getPokemonForTrainer($eliteFour['pokemon']),
			]);

			$return[] = $newE4;
		}
		return ['elitefour' => $return];
	}

	public static function getTrainerForBadge($leader, $pokemon_string) {
		$trainer = new Trainer();
		$trainer->setName($leader);
		foreach(explode(',', $pokemon_string) as $pokemon) {
			$ex = explode(':', $pokemon);
			$newPokemon = new Pokemon();
			$newPokemon->name = $ex[0];
			$newPokemon->level = $ex[1];
			$returnPokemon[] = $newPokemon;
		}
		$trainer->pokemon = $returnPokemon;
		return $trainer;
	}

//	public function showImage() {
//		return Image::toImage('/badges', $this->name, ['title' => $this->name . ' Badge', 'alt' => $this->name . ' Badge']);
//	}
}
