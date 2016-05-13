<?php

namespace TPP\Models;

class Box extends Model {
	
	public $id;
	public $name;
	public $scenery;
	public $active = false;
	public $pokemon = [];
	public $content = [];

	public function __construct() {
	}
	
	public static function getBoxes() {
		$return = [];
		$getBoxes = TPP::db()->query("SELECT `id`, `name`, `scenery`, `active` FROM `box` ORDER BY `id`");
		if(!$getBoxes) {
			return false;
		}

		while($box = $getBoxes->fetch()) {
			$newBox = new self();
			$newBox->setAttributes($box);
			$return[] = $newBox;
		}

		return $return;
	}

	public function setAttributes($attributes) {
		parent::setAttributes($attributes);
		if(isset($attributes['id'])) {
			$this->id = (int) $attributes['id'];
		}
		if(isset($attributes['active'])) {
			$this->active = (bool) $attributes['active'];
		}
	}
}