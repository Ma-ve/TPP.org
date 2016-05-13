<?php

namespace TPP\Models;

class Item extends Model {
	
	public $name;
	public $id;
	public $item_type_id;
	public $item_type;
	public $pc;
	public $amount;

	public function __construct() {
		
	}

	public function setName($name) {
		$this->name = utf8_encode($name);
	}

	public function showImage() {
		return parent::image('/items');
	}

	public static function getAllItems() {
		$getItems = TPP::db()->query("
			SELECT
			 i.`id`, i.`name`, i.`pc`, i.`amount`,
			 it.`name` as `item_type`
			FROM `item` i
			JOIN `item_type` it
			ON i.`item_type_id` = it.`id`
			WHERE `amount` != 0 OR `amount` IS NULL
			ORDER BY
			 `item_type_id`, `pc`,
			  IFNULL(`amount`, 99) DESC, `name`")or die(TPP::db()->error);
		while($item = $getItems->fetch()) {
			$newItem = new self();
			$newItem->setAttributes($item);
			$return[$item['item_type']][] = $newItem;
		}
		return $return;
	}
}