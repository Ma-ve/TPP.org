<?php

class Controller {

	public function __construct() {
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

//	private function getDb() {
//		$db = new Db();
//		return $db->db;
//	}

	private function getGeneralInfo() {
//		$getGeneral = $this->db->query("SELECT * FROM `general`")or die($db->error);
		$getGeneral = TPP::db()->query("SELECT * FROM `general`")or die($db->error);
		while($getGen = $getGeneral->fetch_assoc()) {
			$gen[$getGen['name']] = array(
				"value" => utf8_encode(stripslashes($getGen['value'])),
				"id" => $getGen['id'],
			);
		}
		return $gen;
	}
}
