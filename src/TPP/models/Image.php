<?php

namespace TPP\Models;

use TPP\Helpers\Helper;

class Image extends Model {

	public function __construct() {
	}

	public static function toImage($path, $name, $htmlOptions = []) {
		$image = IMG_PATH . $path . '/' . Helper::safeName($name) . '.png';
		if(TPP_DEBUG) {
			if(!file_exists($_SERVER['DOCUMENT_ROOT'] . $image)) {
//				$image = 'http://twitchplayspokemon.org/img/' . $path . '/' . Helper::safeName($name) . '.png';
			}
		}
		$return = '<img src="' . $image . '"';
		if(!empty($htmlOptions)) {
			foreach($htmlOptions as $key => $value) {
				$return .= ' ' . $key . '="' . $value . '"';
			}
		}
		if(!isset($htmlOptions['title'])) {
			$return .= ' title="' . $name . '"';
		} if(!isset($htmlOptions['alt'])) {
			$return .= ' alt="' . $name . '"';
		}
		$return .= '>';
		return $return;
	}

}
