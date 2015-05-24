<?php

class Model {

	public function setAttributes($attributes) {
		foreach($attributes as $key => $value) {
			if($value != '') { 
				$key = gettype($key) === 'string' ? stripslashes(utf8_encode($key)) : $key;
				$this->$key = gettype($value) === 'string' ? stripslashes(utf8_encode($value)) : $value;
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