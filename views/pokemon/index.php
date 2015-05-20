<?php
$this->render('pokemon/_general'); ?>

			<div class="table-responsive table-bordered table-pokemon pokemon-scrollable">
				<table class="table"><?php
$this->render('pokemon/_info', array('party_pokemon' => $params['party_pokemon']));
$this->render('pokemon/_image', array('party_pokemon' => $params['party_pokemon'])); ?>

				</table>
			</div>
