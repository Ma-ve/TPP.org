<?php

namespace TPP\Models;

class Trainer extends Model {
	
	public $name;
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

	public static function getPokemonForTrainer($pokemon_string) {
		$returnPokemon = [];
		foreach(explode(',', $pokemon_string) as $pokemon) {
			$ex = explode(':', $pokemon);
			$newPokemon = new Pokemon();
			$newPokemon->name = $ex[0];
			$newPokemon->level = $ex[1];
			$returnPokemon[] = $newPokemon;
		}

		return $returnPokemon;

	}

	public function setPokemon($pokemon) {
		$this->pokemon = $pokemon;
	}
}