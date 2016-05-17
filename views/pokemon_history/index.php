
			<div class="tpp-app tpp-app-pokemon-history tpp-app-hidden"><?php
$this->render('pokemon_history/_general'); ?>

				<div class="row"><?php
$amount_chunks = ceil(count($pokemon) / 2);
$amount_chunks = $amount_chunks > 1 ? $amount_chunks : 1;

$chunks = array_chunk($pokemon, $amount_chunks);
foreach($chunks as $pokemon) { ?>

					<div class="col-md-6">
						<div class="table-responsive table-bordered table-pokemon pokemon-scrollable mtop20">
							<table class="table"><?php
	$this->render('pokemon_history/_info', ['pokemon' => $pokemon]); ?>

							</table>
						</div>
					</div><?php
} ?>

				</div>
			</div>