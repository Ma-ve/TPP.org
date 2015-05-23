<?php
$this->render('item/_general', array('count' => count($items)));

$chunk = array_chunk($items, 4, true);
foreach($chunk as $items) { ?>

			<div class="row"><?php
	$this->render('item/_item', array('items' => $items)); ?>

			</div><?php
}