<?php

class Image extends Model {

	public function __construct() {
		
	}

	public static function toImage($path = '', $name, $htmlOptions = array()) {
		$image = IMG_PATH . $path . '/' . FuncHelp::safeName($name) . '.png';
		$return = '<img src="' . $image . '" title="' . $name . '" alt="' . $name . '"';
		if(!empty($htmlOptions)) {
			foreach($htmlOptions as $key => $value) {
				$return .= ' ' . $key . '="' . $value . '"';
			}
		}
		$return .= '>';
		return $return;
	}

}
