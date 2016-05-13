<?php

namespace TPP\Models;

use \PDO;
use \PDOStatement;
use \Exception;

class TPP {

	/**
	 * TPP instance
	 * @var TPP
	 */
	private static $instance;
	/**
	 * PDO instance
	 * @var PDO|TPPPDO
	 */
	private $db_connection;

	/**
	 * Main path of current file, for debugging
	 * @var string
	 */
	public static $main_path;

	private static $errors = [];
	/**
	 * @return TPP
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			$className = __CLASS__;
			self::$instance = new $className();
		}
		return self::$instance;
	}

	public static function initializeConnection() {
		$db = self::getInstance();
		$db_opts = [
			'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . TWITCHVERSION,
			DB_USER,
			DB_PASS,
			[
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_STATEMENT_CLASS => TPP_DEBUG ? ['TPP\Models\TPPPDOStatement', []] : ['PDOStatement'],
			],
		];

		$pdo = TPP_DEBUG ? new TPPPDO(...$db_opts) : new PDO(...$db_opts);

		$db->db_connection = $pdo;
		self::$main_path = realpath(__DIR__ . '/TPP/');
	}

	/**
	 * @return PDO
	 */
	public static function db() {
		$db = self::getInstance();
		return $db->db_connection;
	}

	/**
	 *
	 */
	public static function end() {
		if(TPP_DEBUG) {
			echo '<pre style="text-align: left;">';
			var_dump(self::getErrors());
			echo '</pre>';
		}

		if(self::is_debug() && isset($GLOBALS['log'])) {
			foreach($GLOBALS['log'] as $key => $logs_container) {
				echo '<h1>' . ucfirst($key) . ' (' . count($GLOBALS['log'][$key]) . ')</h1>';
				echo '<table class="tpp-debug-table">';
				$i_log = 1;
				foreach($logs_container as $logs) {
					echo '<tr>
';
					echo '<td>' . $i_log++ . '</td>';
					foreach($logs as $log) {
						echo PHP_EOL;
						try {
							if($log instanceof PDOStatement) {
								ob_start();
								$log->debugDumpParams();
								$log = '<div style="height: 200px; overflow-y: scroll;">'
								   . '<pre>' . ob_get_clean() . '</pre>'
								   . '</div>';
							} elseif(is_array($log)) {
								$log = implode('</td><td>', $log);
							} else {
							}
						} catch(Exception $e) {
							echo '<pre>';
							var_dump($e);
							echo '</pre>';
							exit;
						}

						echo '<td>' . $log . '</td>';
					}
					echo '<tr>
';
				}
				echo '</table>';
			}

		}
	}

	/**
	 * @return bool
	 */
	public static function is_debug() {
		return TPP_DEBUG && isset($_GET['debug']);
	}

	/**
	 * @param $params
	 *
	 * @return array
	 */
	public static function prepareParams($params) {
		$return = [];
		foreach($params as $p) {
			$return[':n' . $p] = $p;
		}

		return $return;
	}

	/**
	 * @param string|Exception $error
	 */
	public static function setError($error) {
		if($error instanceof \Exception) {
			self::$errors[] = str_replace(self::$main_path, '', $error->getFile()) . ':' . $error->getLine() . ' - ' . $error->getMessage() . "\n" . $error->getTraceAsString();
		} else {
			self::$errors[] = $error;
		}
	}

	public static function getErrors() {
		$return = [];
		foreach(self::$errors as $er) {
			$return[] = $er;
		}

		return $return;
	}
}
