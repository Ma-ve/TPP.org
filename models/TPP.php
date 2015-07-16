<?php

class TPP {

	private static $instance;
	private $db_connection;

	public static function getInstance() {
		if(self::$instance == null) {
			$className = __CLASS__;
			self::$instance = new $className();
		}
		return self::$instance;
	}

	public static function initializeConnection($connectionInfo) {
		$db = self::getInstance();
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE . TWITCHVERSION);
		if(!$mysqli->set_charset('utf8')) {
			die('Could not set database charset to utf8');
		}
		$db->db_connection = $mysqli;
	}

	public static function db() {
		$db = self::getInstance();
		return $db->db_connection;
	}

}
