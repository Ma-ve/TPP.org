
			<div class="tpp-app tpp-app-elitefour tpp-app-hidden"><?php
$this->render('elitefour/_general'); ?>

				<div class="table-responsive table-bordered table-pokemon pokemon-scrollable mtop20">
					<table class="table"><?php
	$elitefour = $elitefour['elitefour'];
	$this->render('trainer/_name', ['trainers' => $elitefour]);
	$this->render('trainer/_image', ['trainers' => $elitefour]);
	$this->render('elitefour/_type', ['elitefour' => $elitefour]);
	$this->render('trainer/_winloss_attempts', ['trainers' => $elitefour]);
	$this->render('trainer/_pokemon_moreinfo', ['trainers' => $elitefour]);  ?>

					</table>
				</div>
			</div>