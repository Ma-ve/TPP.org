<?php

class Model {

	public function setAttributes($attributes) {
		foreach($attributes as $key => $value) {
			$this->$key = $value;
		}
	}

	public function image($path = '', $name = null, $htmlOptions = array()) {
		if(is_null($name)) {
			$name = $this->name;
		}
		return Image::toImage($path, $name, $htmlOptions);
	}
}