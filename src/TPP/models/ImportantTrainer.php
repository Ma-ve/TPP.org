<?php

namespace TPP\Models;

class ImportantTrainer extends Trainer {

	public $id;
	public $name;
	public $nickname;
	public $type;
	public $attempts;
	public $wins;
	public $losses;
	public $time;
	public $is_rematch;
	public $order_by;

	public function __construct() {
		
	}

	public static function getImportantTrainers($where = null, $limit = null, $order = ' i.`order_by`, i.`id` ') {
		if(!is_null($where)) {
			$where = 'WHERE ' . $where;
		}

		$getImportantTrainers = TPP::db()->query("SELECT
			i.`id`,
			i.`name`,
			i.`nickname`,
			i.`type`,
			i.`attempts`,
			i.`wins`,
			i.`losses`,
			i.`time`,
			i.`is_rematch`,
			i.`order_by`,
			GROUP_CONCAT(
				DISTINCT CONCAT_WS('" . self::SEPARATOR_2 . "',
					itp.`id`,
					itp.`pokemon`,
					itp.`level`,
					itp.`nickname`,
					itp.`item`
				) SEPARATOR '" . self::SEPARATOR_1 . "'
			) as `pokemon`,
			GROUP_CONCAT(
				DISTINCT CONCAT_WS('" . self::SEPARATOR_2 . "',
					itpm.important_trainer_pokemon_id,
					itpm.name
				) SEPARATOR '" . self::SEPARATOR_1 . "'
			) as `moves`
			FROM `important_trainer` i
			JOIN `important_trainer_pokemon` itp
				ON itp.`important_trainer_id` = i.`id`
		  	LEFT JOIN `important_trainer_pokemon_move` itpm
		  		ON itpm.`important_trainer_pokemon_id` = itp.`id`
			" . $where . "
			GROUP BY i.`id`
			ORDER BY " . $order . $limit);

		if(!$getImportantTrainers) return [];

		$return = [];
		while($importantTrainer = $getImportantTrainers->fetch()) {
			$newIT = new self();
			$newIT->setAttributes([
				'id' 		=> (int) $importantTrainer['id'],
				'name' 		=> $importantTrainer['name'],
				'nickname' 	=> $importantTrainer['nickname'],
				'type' 		=> $importantTrainer['type'],
				'attempts' 	=> (int) $importantTrainer['attempts'],
				'wins' 		=> (int) $importantTrainer['wins'],
				'losses' 	=> (int) $importantTrainer['losses'],
				'time' 		=> $importantTrainer['time'],
				'order_by' 	=> (int) $importantTrainer['order_by'],
				'is_rematch' => (bool) $importantTrainer['is_rematch'],
				'pokemon' => parent::getPokemonForTrainer($importantTrainer['pokemon']),
			]);

			$moves = [];
			foreach(explode(self::SEPARATOR_1, $importantTrainer['moves']) as $move) {
				$ex = explode(self::SEPARATOR_2, $move);
				$moves[$ex[0]][] = $ex[1];
			}
			foreach($newIT->pokemon as $p) {
				if(isset($moves[$p->id])) {
					$p->moves = $p->setMoves($moves[$p->id]);
				}
			}

			$return[] = $newIT;
		}
		return ['importanttrainers' => $return];
	}

}
