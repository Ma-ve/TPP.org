<?php

class Fact extends Model {

	/**
	 * ID of fact
	 * @var integer
	 */
	public $id;
	
	/**
	 * Name of fact
	 * @var string
	 */
	public $name;
	
	/**
	 * Value of fact
	 * @var string
	 */
	public $value;
	
	/**
	 * Amount of fact (Pokémon caught: 44)
	 * @var integer 
	 */
	public $amount;

	/**
	 * getFacts: Return all facts
	 * @return		array		Array of all Fact objects
	 */
	public static function getFacts() {
		$getFacts = TPP::db()->query("
			SELECT `id`, `name`, `value`, `amount`
			FROM `fact`
			WHERE `order_id` > 0
			ORDER BY `order_id`, `id`")or die(TPP::db()->error);
		while($fact = $getFacts->fetch()) {
			$newFact = new self();
			$newFact->setAttributes($fact);
			$return[] = $newFact;
		}
		return $return;
	}
}