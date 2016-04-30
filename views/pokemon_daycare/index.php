
			<div class="tpp-app tpp-app-pokemon-daycare tpp-app-hidden"><?php
$this->render('pokemon_daycare/_general', ['count' => count($pokemon)]); ?>

				<div class="table-responsive table-bordered table-pokemon pokemon-scrollable mtop20">
					<table class="table"><?php
	$this->render('pokemon/_info', ['pokemon' => $pokemon]);
	$this->render('pokemon/_image', ['pokemon' => $pokemon, 'size' => 80]);
	$this->render('pokemon/_level', ['pokemon' => $pokemon]);
	$this->render('pokemon/_nickname', ['pokemon' => $pokemon]);
	$this->render('pokemon/_moves', ['pokemon' => $pokemon]); ?>

					</table>
				</div>
			</div>