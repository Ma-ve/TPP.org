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
			$newCredit->quote = Credit::getQuote($newCredit->quote);
			$newCredit->generations = self::getGenerations($newCredit->generations);
			$return[] = $newCredit;
		}
		return $return;
	}

	public function showImage() {
		return parent::image('/pokemon/80', $this->pokemon);
	}

	private static function getQuote($quote) {
		$quotes = explode('%%%', $quote);
		$i = rand(0, count($quotes)-1);
		return $quotes[$i];
	}

	private static function getGenerations($gens) {
		for($i = 0; $i < strlen($gens); $i++) {
			if((int) $gens[$i] !== 0) {
				
				$newObject = new StdClass();
				$newObject->id = $i+1;
				$newObject->roman = self::getRoman($i+1);
				$newObject->name = self::getGenerationName($i+1);
				$return[] = $newObject;
			}
		}
		return $return;
	}
	
	private static function getRoman($integer) { 
		switch($integer) {
			case 1: return 'I';
			case 2: return 'II';
			case 3: return 'III';
			case 4: return 'III';
			case 5: return 'IV';
			case 6: return 'IV';
			case 7: return 'V';
			case 8: return 'V';
			case 9: return 'VI';
			case 10: return 'VI';
			case 11: return 'I';
			default: return 'I';
		}
}

	private static function getGenerationName($integer) {
		switch($integer) {
			case 0: return '-';
			case 1: return 'Pok&eacute;mon Red';
			case 2: return 'Pok&eacute;mon Crystal';
			case 3: return 'Pok&eacute;mon Emerald';
			case 4: return 'Pok&eacute;mon FireRed';
			case 5: return 'Pok&eacute;mon Platinum';
			case 6: return 'Pok&eacute;mon HeartGold';
			case 7: return 'Pok&eacute;mon Black';
			case 8: return 'Pok&eacute;mon Black 2';
			case 9: return 'Pok&eacute;mon X';
			case 10: return 'Pok&eacute;mon Omega Ruby';
			case 11: return 'Pok&eacute;mon Red [Anniversary!]';
			default: return $integer;
		}
}

function getGenString($gens) {
	$i = 0;
	$return = '';
	for($j = 0; $j < strlen($gens); $j++) {
		$i++;
		if($gens[$j] != 0) {
			$return .= '								--><span class="tpp-tooltip credits-generation gen' . $i . '" data-content="Mod for ' . getGenName($i) . '">' . getRoman($i) . '</span><!--
';
		}
	}
	$return2 = substr($return, 0, -6);
	$return3 = substr($return2, 11);
	
	return '								' . $return3;
}
}