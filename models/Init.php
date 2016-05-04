<?php

class Init {

	public function __construct() {
		session_start();
		$this->loadConfig(include(__DIR__ . "/../config/config.php"));
		$this->loadConfig(include(__DIR__ . "/../../config/config.php"));
		if(!defined('TPP_DEBUG')) {
			define('TPP_DEBUG', false);
		}

		if(!defined('TWITCHVERSION') && (isset($_SERVER['VERSION']) || isset($_SERVER['REDIRECT_VERSION']))) {
			define('TWITCHVERSION', isset($_SERVER['VERSION']) ? $_SERVER['VERSION'] : $_SERVER['REDIRECT_VERSION']);
		}

		register_shutdown_function(['TPP', 'end']);
	}

	private function loadConfig($arr) {
		foreach($arr as $key => $val) {
			if(!defined($key)) {
				define($key, $val);
			}
		}
		return true;
	}
}
