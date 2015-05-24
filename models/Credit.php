<?php

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
	 * Link of credit (optional)
	 * @var string
	 */
	public $link;

	/**
	 * getCredits: Return all credits
	 * @return		array		Array of all Credit objects
	 */
	public static function getCredits() {
		$getCredits = TPP::db()->query("
			SELECT `id`, `name`, `title`, `pokemon`, `quote`, `generations`, `link`
			FROM `credits`
			WHERE `order_id` > 0
			ORDER BY `order_id`, `id`")or die(TPP::db()->error);
		while($credit = $getCredits->fetch_assoc()) {
			$newCredit = new self();
			$newCredit->setAttributes($credit);
			$return[] = $newCredit;
		}
		return $return;
	}

	public function showImage() {
		return parent::image('/pokemon/80', $this->pokemon);
	}
}