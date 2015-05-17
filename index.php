<?php
$time = microtime(true);
error_reporting(E_ALL);
ini_set('display_errors', 1);

$includes = array('controllers', 'models', 'helpers');

foreach($includes as $inc) {
	foreach(glob($inc . "/*.php") as $filename) {
		include $filename;
	}
}


include('views/layouts/header.php');
$pok = new Pokemon;
echo $pok->showSomething();

echo '<h1>loaded in ' . round(microtime(true) - $time, 7) . ' secs</h1>'; exit();