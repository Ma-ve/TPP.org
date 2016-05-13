<?php

namespace TPP\Models;

use \PDOStatement;
use \Exception;

class TPPPDOStatement extends PDOStatement {

	protected function __construct() {

	}

	public function execute($input_parameters = null) {
		try {
			return parent::execute($input_parameters);
		} catch(Exception $e) {
			TPP::setError($e);
		}
	}

}
