<?php

namespace TPP\Models;

use \PDOStatement;
use \Exception;

class TPPPDOStatement extends PDOStatement {

	protected function __construct() {

	}

	public function execute(?array $params = null): bool {
		try {
			return parent::execute($params);
		} catch(Exception $e) {
			TPP::setError($e);
			return false;
		}
	}

}
