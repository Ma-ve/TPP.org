<?php
$this->render('pokemon_history/_general'); ?>

			<div class="row"><?php
foreach(array_chunk($pokemon, ceil(count($pokemon) / 2)) as $pokemon) { ?>

				<div class="col-md-6">
					<div class="table-responsive table-bordered table-pokemon pokemon-scrollable mtop20">
						<table class="table"><?php
	$this->render('pokemon_history/_info', array('pokemon' => $pokemon)); ?>

						</table>
					</div>
				</div><?php
} ?>

			</div>