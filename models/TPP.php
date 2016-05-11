<?php

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
			],
		];

		$pdo = TPP_DEBUG ? new TPPPDO(...$db_opts) : new PDO(...$db_opts);

		$db->db_connection = $pdo;
		self::$main_path = realpath(__DIR__ . '/../');
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

		if(self::is_debug()) {

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

	public static function setError($error) {
		self::$errors[] = $error;
	}

	public static function getErrors() {
		$return = [];
		foreach(self::$errors as $er) {
			if(isset($return[$er])) {
				$return[$er]++;
			} else {
				$return[$er] = 1;
			}
		}

		return $return;
	}
}

class TPPPDO extends PDO {

	/**
	 * TPPPDO constructor.
	 *
	 * @param       $dsn
	 * @param       $user
	 * @param       $pass
	 * @param array $options
	 */
	public function __construct($dsn, $user, $pass, $options = []) {
		parent::__construct($dsn, $user, $pass, $options);
	}

	/**
	 * @param string $content
	 *
	 * @return PDOStatement
	 */
	public function query($content) {
		$this->log($content);

		return parent::query($content);
	}

	/**
	 * @param string $content
	 *
	 * @return PDOStatement
	 */
	public function prepare($content) {
		$this->log($content);

		$prepare = parent::prepare($content);
		$prepare2 = &$prepare;
		$this->log($prepare2, 'prepare', false);

		return $prepare2;
	}

	/**
	 * @param        $content
	 * @param string $key
	 * @param bool   $query
	 */
	public function log($content, $key = 'query', $query = true) {
		if(TPP::is_debug()) {
			$t = microtime(true);
			$micro = sprintf("%06d",($t - floor($t)) * 1000000);

			$back_trace = debug_backtrace();
			$trace = '?';
			if(isset($back_trace[1])) {
				$tr = $back_trace[1];
				$trace = substr(str_replace(TPP::$main_path, '', $tr['file']) . ':' . $tr['line'], 1);
				if(isset($back_trace[2])) {
					$tr2 = $back_trace[2];
					$trace .= '<br>&nbsp;' . $tr2['function'] . '()';
				}
			}
			$GLOBALS['log'][$key][] = [
				$trace,
				(new DateTime(date("Y-m-d H:i:s." . $micro, $t)))->format('Y-m-d H:i:s.u'),
				$query ? SqlFormatter::highlight($content) : $content,
			];
		}
	}

}