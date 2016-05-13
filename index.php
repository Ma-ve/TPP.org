<?php

use TPP\Models\TPP;

require("vendor/autoload.php");

$time = microtime(true);
prioIncludes();
includes();

new Init();

if(TPP_DEBUG) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}

TPP::initializeConnection();

$site = new SiteController();
$site->actionIndex();

echo '<h1>loaded in ' . round(microtime(true) - $time, 7) . ' secs</h1>';
exit;

function prioIncludes() {
	$priorityIncludes = [
		'controllers' => [
			'Controller',
		],
		'models' => [
			'Init',
		],
	];

	foreach($priorityIncludes as $key => $prio) {
		foreach($prio as $pr) {
			include_once($key . '/' . $pr . '.php');
		}
	}
}

function includes() {
	$includes = ['controllers', 'models', 'helpers'];

	foreach($includes as $inc) {
		foreach(glob($inc . "/*.php") as $filename) {
			include_once($filename);
		}
	}
}