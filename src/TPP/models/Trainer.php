<?php

namespace TPP\Models;

class Trainer extends Model {

	public $name;

	/**
	 * @var $pokemon Pokemon[]
	 */
	public $pokemon = [];
	
	public function __construct() {
		
	}
	
	public function setName($name) {
		$this->name = $name;
	}

	public function showImage() {
//		return '<i class="sprite-trainer sprite-trainer-' . Helper::safeName($this->name) . '" title="' . $this->name . '" alt="' . $this->name . '"></i>';
		return parent::image('trainers/' . TWITCHVERSION, $this->name);
	}

	public static function getPokemonForTrainer($pokemon_string, array $mapping, $return = false) {
		$returnPokemon = [];
		foreach(explode(self::SEPARATOR_1, $pokemon_string) as $pokemon) {
			$ex = explode(self::SEPARATOR_2, $pokemon);
			$newPokemon = new Pokemon();
			for($i = 0; $i < count($mapping); $i++) {
				$newPokemon->{$mapping[$i]} = $ex[$i];
			}
			$returnPokemon[] = $newPokemon;
		}

		return $returnPokemon;

	}

	public function setPokemon($pokemon) {
		$this->pokemon = $pokemon;
	}
}