<?php

class ErrorHandler extends Exception {

	protected $severity;

	public function __construct($message, $code, $severity, $filename, $lineno) {
		$this->message = $message;
		$this->code = $code;
		$this->severity = $severity;
		$this->file = $filename;
		$this->line = $lineno;
	}

	public function getSeverity() {
		return $this->severity;
	}

}

function exception_error_handler($errno, $errstr, $errfile, $errline) {
	echo '<pre style="border: 3px solid red;">';
	throw new ErrorHandler($errstr, 0, $errno, $errfile, $errline);
}