<?php
$this->render('pokemon_box/_general', array('count' => count($pokemon))); ?>

			<div class="table-responsive table-bordered table-pokemon pokemon-scrollable mtop20 tr-margin10">
				<table class="table"><?php
$chunk = array_chunk($pokemon, 6);
foreach($chunk as $pokemon) {

	$this->render('pokemon/_info', array('pokemon' => $pokemon));
	$this->render('pokemon/_image', array('pokemon' => $pokemon, 'size' => 80));
	$this->render('pokemon/_level', array('pokemon' => $pokemon));
	$this->render('pokemon/_nickname', array('pokemon' => $pokemon));
	$this->render('pokemon/_moves', array('pokemon' => $pokemon));
} ?>

				</table>
			</div>