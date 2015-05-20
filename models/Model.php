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
		$image = IMG_PATH . $path . '/' . FuncHelp::safeName($name) . '.png';
//		if(file_exists($image)) {
			$return = '<img src="' . $image . '" title="' . $name . '" alt="' . $name . '"';
			if(!empty($htmlOptions)) {
				foreach($htmlOptions as $key => $value) {
					$return .= ' ' . $key . '="' . $value . '"';
				}
			}
			$return .= '>';
			return $return;
//		}
//		return null;
	}
}