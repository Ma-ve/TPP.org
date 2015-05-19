<?php

class Controller {

	public function __construct() {
		session_start();
		$this->loadConfig(json_decode(file_get_contents("config/config.json"), true));
		$this->db = $this->getDb();
		$this->general = $this->getGeneralInfo();
		$this->help = new FuncHelp();
	}

	public function render($view, $params = array()) {
		if(!empty($params)) {
			foreach($params as $key => $p) {
				$$key = $p;
			}
		}
		include('views/' . $view . '.php');
	}
	
	private function loadConfig($arr) {
		foreach($arr as $key => $val) {
			define($key, $val);
		}
		return true;
	}

	private function getDb() {
		$db = new Db();
		return $db->db;
	}

	private function getGeneralInfo() {
		$getGeneral = $this->db->query("SELECT * FROM `general`")or die($db->error);
		while($getGen = $getGeneral->fetch_assoc()) {
			$gen[$getGen['name']] = array(
				"value" => utf8_encode(stripslashes($getGen['value'])),
				"id" => $getGen['id'],
			);
		}
		return $gen;
	}
}
