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
	 * @param string $content
	 *
	 * @return PDOStatement
	 */
	public function query($content) {
		$this->log($content);

		try {
			return parent::query($content);
		} catch(Exception $e) {
			TPP::setError($e);
			return false;
		}
	}

	/**
	 * @param string $content
	 * @param null   $options
	 *
	 * @return PDOStatement
	 */
	public function prepare($content, $options = []) {
		try {
			$this->log($content);

			$prepare  = parent::prepare($content, $options);
			$prepare2 = &$prepare;
			$this->log($prepare2, 'prepare', false);

			return $prepare2;
		} catch(Exception $e) {
			TPP::setError($e);
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
				(new DateTime(date("Y-m-d H:i:s." . $micro, $t)))->format('Y-m-d H:i:s.u'),
				$query ? SqlFormatter::highlight($content) : $content,
			];
		}
	}

}
