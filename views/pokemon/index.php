<?php
$this->render('pokemon/_general'); ?>

			<div class="table-responsive table-bordered table-pokemon pokemon-scrollable">
				<table class="table"><?php
$this->render('pokemon/_info', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_image', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_level', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_nickname', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_hold_item', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_moves', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_ability', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_nature', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_characteristic', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_next_move', array('party_pokemon' => $party_pokemon));
$this->render('pokemon/_evolution', array('party_pokemon' => $party_pokemon)); ?>

				</table>
			</div>
