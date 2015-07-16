<?php

class Model {

	public function setAttributes($attributes) {
		foreach($attributes as $key => $value) {
			if($value != '') { 
				$key = gettype($key) === 'string' ? FuncHelp::utf8ify($key) : $key;
				$this->$key = gettype($value) === 'string' ? FuncHelp::utf8ify($value) : $value;
			}
		}
	}

	public function image($path = '', $name = null, $htmlOptions = array()) {
		if(is_null($name)) {
			$name = $this->name;
		}
		return Image::toImage($path, $name, $htmlOptions);
	}
}