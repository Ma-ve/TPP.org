<?php

class Init {

	public function __construct() {
		session_start();
		$this->loadConfig(json_decode(file_get_contents("config/config.json"), true));
	}	

	private function loadConfig($arr) {
		foreach($arr as $key => $val) {
			define($key, $val);
		}
		return true;
	}
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

