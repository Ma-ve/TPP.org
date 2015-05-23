<?php

class Trainer extends Model {
	
	public $name;
	
	public function __construct() {
		
	}
	
	public function setName($name) {
		$this->name = $name;
	}

	public function showImage() {
		return '<i class="sprite-trainer sprite-trainer-' . FuncHelp::safeName($this->name) . '" title="' . $this->name . '" alt="' . $this->name . '"></i>';
	}
}