<?php
$time = microtime(true);
error_reporting(E_ALL);
ini_set('display_errors', 1);

prioIncludes();
includes();

new Init();

TPP::initializeConnection(new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE . TWITCHVERSION));


$site = new SiteController();
$site->actionIndex();

echo '<h1>loaded in ' . round(microtime(true) - $time, 7) . ' secs</h1>';
exit();

function prioIncludes() {

	$priorityIncludes = array(
		'controllers' => array(
			'Controller',
		),
		'models' => array(
			'TPP',
			'Model',
	));

	foreach($priorityIncludes as $key => $prio) {
		foreach($prio as $pr) {
			include_once($key . '/' . $pr . '.php');
		}
	}
}

function includes() {
	$includes = array('controllers', 'models', 'helpers');

	foreach($includes as $inc) {
		foreach(glob($inc . "/*.php") as $filename) {
			include_once($filename);
		}
	}
}
