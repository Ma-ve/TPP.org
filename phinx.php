<?php

use TPP\Models\TPP;

require("vendor/autoload.php");
require("models/Init.php");

new Init();
TPP::initializeConnection();

return [
	'paths' => [
		'migrations' => 'db/migrations',
		'seeds' => 'db/seeds',
	],
	'environments' => [
		'default_migration_table' => 'migrations',
		'default_database' => 'development',
		'development' => [
			'name' => 'devdb',
			'connection' => TPP::db(),
		],
	],
];
