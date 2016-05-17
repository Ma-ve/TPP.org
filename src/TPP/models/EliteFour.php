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

	public static function getEliteFour($where = null, $limit = null, $order = ' e.`order`, e.`id` ') {
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
			GROUP_CONCAT(
				DISTINCT CONCAT_WS('" . self::SEPARATOR_2 . "',
					efp.`id`,
					efp.`pokemon`,
					efp.`level`
				) SEPARATOR '" . self::SEPARATOR_1 . "'
			) as `pokemon`,
			GROUP_CONCAT(
				DISTINCT CONCAT_WS('" . self::SEPARATOR_2 . "',
					efpm.elite_four_pokemon_id,
					efpm.name
				) SEPARATOR '" . self::SEPARATOR_1 . "'
			) as `moves`
			FROM `elite_four` e
			JOIN `elite_four_pokemon` efp
				ON efp.`elite_four_id` = e.`id`
		  	LEFT JOIN `elite_four_pokemon_move` efpm
		  		ON efpm.`elite_four_pokemon_id` = efp.`id`
			" . $where . "
			GROUP BY e.`id`
			ORDER BY " . $order . $limit);

		if(!$getEliteFour) return [];

		$return = [];
		$beaten = $count_e4 = 0;
		while($eliteFour = $getEliteFour->fetch()) {
			$count_e4++;
			if(isset($eliteFour['time']) && $eliteFour['time'] != '') {
				$beaten++;
			}
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

			$moves = [];
			foreach(explode(self::SEPARATOR_1, $eliteFour['moves']) as $move) {
				$ex = explode(self::SEPARATOR_2, $move);
				$moves[$ex[0]][] = $ex[1];
			}
			foreach($newE4->pokemon as $p) {
				if(isset($moves[$p->id])) {
					$p->moves = $p->setMoves($moves[$p->id]);
				}
			}

			$return[] = $newE4;
		}
		return ['beaten' => $beaten === $count_e4, 'elitefour' => $return];
	}

	public static function getTrainerForBadge($leader, $pokemon_string) {
		$trainer = new Trainer();
		$trainer->setName($leader);
		foreach(explode(self::SEPARATOR_1, $pokemon_string) as $pokemon) {
			$ex = explode(self::SEPARATOR_2, $pokemon);
			$newPokemon = new Pokemon();
			$newPokemon->id = $ex[0];
			$newPokemon->name = $ex[1];
			$newPokemon->level = $ex[2];
			$returnPokemon[] = $newPokemon;
		}
		$trainer->pokemon = $returnPokemon;
		return $trainer;
	}

//	public function showImage() {
//		return Image::toImage('/badges', $this->name, ['title' => $this->name . ' Badge', 'alt' => $this->name . ' Badge']);
//	}
}
