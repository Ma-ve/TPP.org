<?php

namespace TPP\Models;

use DateTime;
use \PDO;
use \Exception;
use PDOStatement;
use SqlFormatter;

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
	 * @param string $query
	 * @param int|null $fetchMode
	 * @param mixed ...$fetchModeArgs
	 *
	 * @return PDOStatement|false
	 */
	public function query(string $query, ?int $fetchMode = null, mixed ...$fetchModeArgs): PDOStatement|false {
		$this->log($query);

		try {
			return parent::query($query, $fetchMode, ...$fetchModeArgs);
		} catch(Exception $e) {
			TPP::setError($e);
			return false;
		}
	}

	/**
	 * @param string $query
	 * @param array  $options
	 *
	 * @return PDOStatement|false
	 */
	public function prepare(string $query, array $options = []): PDOStatement|false {
		try {
			$this->log($query);

			$prepare  = parent::prepare($query, $options);
			$prepare2 = &$prepare;
			$this->log($prepare2, 'prepare', false);

			return $prepare2;
		} catch(Exception $e) {
			TPP::setError($e);
			return false;
		}

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
				(new DateTime(date("Y-m-d H:i:s." . $micro, (int)$t)))->format('Y-m-d H:i:s.u'),
				$query ? SqlFormatter::highlight($content) : $content,
			];
		}
	}

}
