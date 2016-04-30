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

	public static function initializeConnection() {
		$db = self::getInstance();
		$pdo = new pdo('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . TWITCHVERSION, DB_USER, DB_PASS, [
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		]);

		$db->db_connection = $pdo;
	}

	/**
	 * @return PDO
	 */
	public static function db() {
		$db = self::getInstance();
		return $db->db_connection;
	}

}
