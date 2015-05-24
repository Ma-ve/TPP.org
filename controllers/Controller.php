<?php

class Controller {

	public function render($view, $params = array()) {
		if(!empty($params)) {
			foreach($params as $key => $p) {
				$$key = $p;
			}
		}
		include('views/' . $view . '.php');
	}

}
