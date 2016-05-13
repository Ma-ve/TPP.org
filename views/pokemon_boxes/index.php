<?php

use TPP\Helpers\Helper;

/**
 * @var $boxes	Boxes[]
 */
?>

			<div class="tpp-app tpp-app-pokemon-boxes tpp-app-hidden"><?php
$this->render('pokemon_boxes/_general'); ?>

<?php
$chunks = array_chunk($boxes, 4);
foreach($chunks as $chunk) { ?>

				<div class="row"><?php

	foreach($chunk as $box) {
		/**
		 * @var $box Box
		**/ ?>

					<div class="col-md-3 boxes">
						<h5>
							<strong>Box <?= $box->id; ?></strong>
							<?= $box->active ? '<small class="box-active">active</small>' : ''; ?>

							<?= isset($box->name) ? '<small>(' . $box->name . ')</small>' : ''; ?>

							<?= !empty($box->content) ? '<small>(' . count($box->pokemon) . ' Pok&eacute;mon)</small>' : ''; ?>

						</h5>
						<div class="box-background bg-<?= Helper::safeName($box->scenery); ?>">
							<?php
		if(empty($box->pokemon)) { ?>

							<em>No Pok&eacute;mon in this box</em><?php
		} else {
			foreach($box->content as $key_row => $row) {
				foreach($row as $pokemon) {
					/** @var $pokemon Pokemon */
					$title = isset($pokemon->name) ? $pokemon->name . ' (' . $pokemon->pokemon . ')' : $pokemon->pokemon;
					echo '<a href="#pokemon-' . $pokemon->id . '">' . $pokemon->showImageMenu(['title' => $title, 'alt' => $title]) . '</a>';
				}
			}

		} ?>

						</div>
					</div><?php

	} ?>
					</div><?php

} ?>


		</div>