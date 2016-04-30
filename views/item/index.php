
			<div class="tpp-app tpp-app-item tpp-app-hidden"><?php
$this->render('item/_general', ['count' => count($items)]);

$chunk = array_chunk($items, 4, true);
foreach($chunk as $items) { ?>

				<div class="row"><?php
	$this->render('item/_item', ['items' => $items]); ?>

				</div><?php
} ?>

			</div>