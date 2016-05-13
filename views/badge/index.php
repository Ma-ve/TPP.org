
			<div class="tpp-app tpp-app-badge tpp-app-hidden"><?php
$this->render('badge/_general', ['obtained' => $badges['obtained']]); ?>

				<div class="table-responsive table-bordered table-pokemon pokemon-scrollable mtop20">
					<table class="table"><?php
	$badges = $badges['badges'];
	$this->render('badge/_name', ['badges' => $badges]);
	$this->render('badge/_image', ['badges' => $badges]);
	$this->render('badge/_time', ['badges' => $badges]);
	$this->render('badge/_attempts', ['badges' => $badges]);
	$this->render('trainer/index', ['trainers' => array_map(function($b) { return $b->leader; }, $badges)]); ?>

					</table>
				</div>
			</div>