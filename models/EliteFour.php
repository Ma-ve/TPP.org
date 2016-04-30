<?php

class EliteFour extends Model {

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

	public static function getEliteFour($where = null, $limit = null, $order = ' `order_id`, `id` ') {
		if(!is_null($where)) {
			$where = 'WHERE ' . $where;
		}

		$getEliteFour = TPP::db()->query("SELECT
			b.`id`,
			b.`name`,
			b.`time`,
			b.`leader`,
			b.`type`,
			b.`attempts`,
			GROUP_CONCAT(DISTINCT CONCAT_WS(':', bp.`pokemon`, bp.`level`) SEPARATOR ',') as `leader_pokemon`
			FROM `badge` b JOIN `badge_pokemon` bp ON bp.`badge_id` = b.`id`" . $where . " GROUP BY b.`id` ORDER BY " . $order . $limit);
		$obtained = 0;
		while($badg = $getEliteFour->fetch()) {
			$newBadge = new self();
			$newBadge->setAttributes([
				'id' => $badg['id'],
				'name' => $badg['name'],
				'time' => $badg['time'],
				'type' => $badg['type'],
				'leader' => self::getTrainerForBadge($badg['leader'], $badg['leader_pokemon']),
				'attempts' => $badg['attempts']
			]);
			if(isset($badg['time']) && $badg['time'] != '') {
				$obtained++;
			}
			$return[] = $newBadge;
		}
		return ['obtained' => $obtained, 'badges' => $return];
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

	public function showImage() {
		return Image::toImage('/badges', $this->name, ['title' => $this->name . ' Badge', 'alt' => $this->name . ' Badge']);
	}
}
