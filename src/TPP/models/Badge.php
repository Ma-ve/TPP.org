<?php

namespace TPP\Models;

class Badge extends Model {

	public $id;
	public $name;
	public $time;
	public $leader;
	public $attempts;
	public $type;

	public function __construct() {
		
	}

	public static function getBadges($where = null, $limit = null, $order = ' `order_id`, `id` ') {
		if(!is_null($where)) {
			$where = 'WHERE ' . $where;
		}

		$getBadges = TPP::db()->query("SELECT
			b.`id`,
			b.`name`,
			b.`time`,
			b.`leader`,
			b.`type`,
			b.`attempts`,
			GROUP_CONCAT(DISTINCT CONCAT_WS('" . self::SEPARATOR_2 . "', bp.`id`, bp.`pokemon`, bp.`level`) SEPARATOR '" . self::SEPARATOR_1 . "') as `leader_pokemon`
			FROM `badge` b JOIN `badge_pokemon` bp ON bp.`badge_id` = b.`id`" . $where . " GROUP BY b.`id` ORDER BY " . $order . $limit);
		$obtained = 0;

		$return = [];
		if($getBadges) {
			while($badg = $getBadges->fetch()) {
				$newBadge = new self();
				$newBadge->setAttributes([
											 'id' => (int) $badg['id'],
											 'name' => $badg['name'],
											 'time' => $badg['time'],
											 'type' => $badg['type'],
											 'leader' => self::getTrainerForBadge($badg['leader'], $badg['leader_pokemon']),
											 'attempts' => (int) $badg['attempts']
										 ]);
				if(isset($badg['time']) && $badg['time'] != '') {
					$obtained++;
				}
				$return[] = $newBadge;
			}
		} else {
			$obtained = '?';
		}
		return ['obtained' => $obtained, 'badges' => $return];
	}

	public static function getTrainerForBadge($leader, $pokemon_string) {
		$trainer = new Trainer();
		$trainer->setName($leader);
		$trainer->setPokemon($trainer->getPokemonForTrainer($pokemon_string));

		return $trainer;
	}

	public function showImage() {
		return Image::toImage('/badges', $this->name, ['title' => $this->name . ' Badge', 'alt' => $this->name . ' Badge']);
	}
}
