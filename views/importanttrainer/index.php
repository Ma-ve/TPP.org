
			<div class="tpp-app tpp-app-importanttrainers tpp-app-hidden"><?php
$this->render('importanttrainer/_general'); ?>

				<div class="table-responsive table-bordered table-pokemon pokemon-scrollable mtop20">
					<table class="table"><?php
	$importanttrainers = $importanttrainers['importanttrainers'];
	$this->render('trainer/_name', ['trainers' => $importanttrainers]);
	$this->render('trainer/_image', ['trainers' => $importanttrainers]);
	$this->render('importanttrainer/_type', ['importanttrainers' => $importanttrainers]);
	$this->render('trainer/_winloss_attempts', ['trainers' => $importanttrainers]);
	$this->render('trainer/_pokemon_moreinfo', ['trainers' => $importanttrainers]);  ?>

					</table>
				</div>
			</div>