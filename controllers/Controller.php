<?php

class Controller {

	public function render($view, $params = [], $cache = false) {
		if(!empty($params)) {
			foreach($params as $key => $p) {
				$$key = $p;
			}
		}

		$view_file = __DIR__ . '/../views/' . $view . '.php';

		if(!TPP_DEBUG) {
			$write_cache = $cache && isset($_GET[TPP_CACHE_KEY]) ? true : false;
			$c_directory = __DIR__ . '../cached/' . $view;
			$c_file = '_cached.html';
			if($write_cache) {
				$this->cache($c_directory, $c_file, $view_file);
			}

			if(file_exists($c_directory . $c_file)) {
				include($c_directory . $c_file);
			} else {
				include($view_file);
			}
		} else {
			include($view_file);
		}
	}

	private function checkDirs($dirs) {
		$dirs = explode('/', $dirs);
		unset($dirs[count($dirs) - 1]);
		unset($dirs[0]);
		foreach($dirs as $dir) {
			$dir = __DIR__ . '/../cached/' . $dir;
			if(!is_dir($dir)) {
				mkdir($dir);
			}
		}
	}

	private function cache($c_directory, $c_file, $view_file) {
		ob_start();
		include($view_file);
		if(is_dir($c_directory)) {
			file_put_contents($c_directory . $c_file, ob_get_contents());
		} else {
			$this->checkDirs($c_directory);
			file_put_contents($c_directory . $c_file, ob_get_contents());
		}
		ob_clean();
	}
}