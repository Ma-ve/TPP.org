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
		$db->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE . TWITCHVERSION);
	}

	public static function db() {
		$db = self::getInstance();
		return $db->db_connection;
	}

}
