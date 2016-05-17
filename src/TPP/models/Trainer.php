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

	public static function getPokemonForTrainer($pokemon_string, $mapping) {
		$returnPokemon = [];
		foreach(explode(self::SEPARATOR_1, $pokemon_string) as $pokemon) {
			$ex = explode(self::SEPARATOR_2, $pokemon);
			$newPokemon = new Pokemon();
			foreach($mapping as $k => $v) {
				$newPokemon->$k = $v;
			}
			$newPokemon->id = (int) $ex[0];
			$newPokemon->name = $ex[1];
			$newPokemon->level = $ex[2];
			$returnPokemon[] = $newPokemon;
		}

		return $returnPokemon;

	}

	public function setPokemon($pokemon) {
		$this->pokemon = $pokemon;
	}
}