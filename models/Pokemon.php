<?php

class Pokemon extends Model {
	
	public function showSomething() {
		$cont = new SiteController();
		echo $cont->actionIndex();
	}
}