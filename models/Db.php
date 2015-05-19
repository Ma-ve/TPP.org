<?php

class Db {

	public function __construct() {
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE . TWITCHVERSION);
	}

}
