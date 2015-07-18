<?php

class Init {

	public function __construct() {
		session_start();
		$this->loadConfig(json_decode(file_get_contents("config/config.json"), true));
		if(!defined('TPP_DEBUG')) {
			define('TPP_DEBUG', false);
		}
	}	

	private function loadConfig($arr) {
		foreach($arr as $key => $val) {
			define($key, $val);
		}
		return true;
	}
}