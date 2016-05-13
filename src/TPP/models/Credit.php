<?php

namespace TPP\Models;

use stdClass;

class Credit extends Model {

	/**
	 * ID of credit person
	 * @var integer
	 */
	public $id;

	/**
	 * Name of credit
	 * @var string
	 */
	public $name;

	/**
	 * Title of credit person: creator, maintainer, response team
	 * @var string
	 */
	public $title;

	/**
	 * Pokémon of credit
	 * @var string
	 */
	public $pokemon;

	/**
	 * Quote of credit
	 * @var string
	 */
	public $quote;

	/**
	 * Generations of credit (0011101 or 1111111 etc)
	 * @var integer
	 */
	public $generations;

	/**
	 * Generations of credit (power of 2))
	 * @var integer
	 */
	public $gen_flags;

	/**
	 * Link of credit (optional)
	 * @var string
	 */
	public $link;

	/**
	 * Contains all available generations
	 * @var array
	 */
	public static $available_generations = [];

	/**
	 * Generate available generations
	 */
	public static function prepareGenerations() {
		$getGenerations = TPP::db()->query("
		SELECT `id`, `gen`, `name`, `short`
		FROM `runs`
		ORDER BY `id` ASC");

		$i = 0;
		if($getGenerations) {
			while($gen = $getGenerations->fetch()) {
				self::$available_generations[pow(2, $i++)] = [
					'roman' => $gen['gen'],
					'name'  => $gen['name'],
					'url'   => $gen['short'],
				];
			}
		}
	}

	/**
	 * getCredits: Return all credits
	 * @return		array		Array of all Credit objects
	 */
	public static function getCredits() {
		self::prepareGenerations();

		$getCredits = TPP::db()->query("
			SELECT `id`, `name`, `title`, `pokemon`, `quote`, `gen_flags`, `link`
			FROM `credits`
			WHERE `order_id` > 0
			AND `visible` = 1
			ORDER BY `order_id`, `id`
		");

		$return = [];
		if($getCredits) {
			while($credit = $getCredits->fetch()) {
				$newCredit = new self();
				$newCredit->setAttributes($credit);
				$newCredit->quote = self::getQuote($newCredit->quote);

				$newCredit->generations = self::getGenerations((int)$newCredit->gen_flags);
				$return[]               = $newCredit;
			}
		}

		return $return;
	}

	/**
	 * @return string
	 */
	public function showImage() {
		return parent::image('/pokemon/80', $this->pokemon);
	}

	/**
	 * @param string $quote
	 *
	 * @return mixed
	 */
	private static function getQuote($quote) {
		$quotes = explode('%%%', $quote);
		$i = rand(0, count($quotes)-1);
		return stripslashes($quotes[$i]);
	}

	/**
	 * @param int $gens
	 *
	 * @return array
	 */
	private static function getGenerations($gens) {
		$i = 0;
		foreach(self::$available_generations as $key => $info) {
			$key = str_replace('key', '', $key);
			$i++;
			if($gens & $key) {
				$newObject = new stdClass();
				$newObject->id = $i;
				$newObject->roman = $info['roman'];
				$newObject->name = 'Pok&eacute;mon ' . $info['name'];
				$return[] = $newObject;
			}
		}

		return $return;
	}

}