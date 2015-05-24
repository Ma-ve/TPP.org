<?php

class Milestone extends Model {
	
	public $id;
	public $name;
	public $time;

	public function __construct() {
		
	}
	
	public static function getMilestones() {
		$getMilestones = TPP::db()->query("SELECT `id`, `name`, `time` FROM `milestone` WHERE `visible` = 1 ORDER BY `time`")or die(TPP::db()->error);
		while($mile = $getMilestones->fetch_assoc()) {
			$newMilestone = new self();
			$newMilestone->setAttributes($mile);
			$newMilestone->time = FuncHelp::getDateTime($newMilestone->time);
			$return[] = $newMilestone;
		}
		return $return;
	}
}