<?php
$this->render('pokemon/_general'); ?>

			<div class="table-responsive table-bordered table-pokemon pokemon-scrollable">
				<table class="table"><?php
$this->render('pokemon/_info', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_image', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_level', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_nickname', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_moves', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_level', array('party_pokemon' => $party_pokemon)); ?>

				</table>
			</div>
