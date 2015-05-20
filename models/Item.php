<?php

class Item extends Model {
	
	public $name;
	
	public function __construct() {
		
	}

	public function setName($name) {
		$this->name = utf8_encode($name);
	}

	public function showImage() {
		return parent::image('/items');
	}
}