<?php
$this->render('pokemon_daycare/_general', array('count' => count($pokemon))); ?>

			<div class="table-responsive table-bordered table-pokemon pokemon-scrollable mtop20">
				<table class="table"><?php
	$this->render('pokemon/_info', array('pokemon' => $pokemon));
	$this->render('pokemon/_image', array('pokemon' => $pokemon, 'size' => 80));
	$this->render('pokemon/_level', array('pokemon' => $pokemon));
	$this->render('pokemon/_nickname', array('pokemon' => $pokemon));
	$this->render('pokemon/_moves', array('pokemon' => $pokemon)); ?>

				</table>
			</div>