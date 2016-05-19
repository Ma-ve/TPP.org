<?php

namespace TPP\Models;

use TPP\Helpers\Helper;

class Model {

	const SEPARATOR_1 = "%%%";
	const SEPARATOR_2 = "###";

	public function setAttributes($attributes) {
		foreach($attributes as $key => $value) {
			if(isset($value) && $value !== '') {
				if(!property_exists($this, $key)) {
					$called_class = get_called_class();
					TPP::setError($called_class . "->" . $key . ": Property '" . $key . "' does not exist for class '" . $called_class . "'");
				}
				$key = gettype($key) === 'string' && !ctype_alnum(str_replace(['-','_',' '], '', $key)) ? Helper::utf8ify($key) : $key;
				$this->$key = gettype($value) === 'string' ? Helper::utf8ify($value) : $value;
			}
		}
	}

	public function image($path = '', $name = null, $htmlOptions = []) {
		if(is_null($name)) {
			$name = $this->name;
		}
		if(strpos($path, '/') !== 0) {
			$path = '/' . $path;
		}
		return Image::toImage($path, $name, $htmlOptions);
	}
}
