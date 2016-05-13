<?php

namespace TPP\Models;

use TPP\Helpers\Helper;

class Milestone extends Model {
	
	public $id;
	public $name;
	public $time;

	public function __construct() {
		
	}
	
	public static function getMilestones() {
		$getMilestones = TPP::db()->query("SELECT `id`, `name`, `time` FROM `milestone` WHERE `visible` = 1 ORDER BY `time`");
		$return = [];
		if($getMilestones) {
			while($mile = $getMilestones->fetch()) {
				$newMilestone = new self();
				$newMilestone->setAttributes($mile);
				$newMilestone->time = Helper::getDateTime($newMilestone->time);
				$return[]           = $newMilestone;
			}
		}
		return $return;
	}
}