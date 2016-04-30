			<div class="tpp-app tpp-app-pokemon-party"><?php
$this->render('pokemon/_general', ['owned' => $owned, 'seen' => $seen]); ?>

				<div class="table-responsive table-bordered table-pokemon pokemon-scrollable" id="table-pokemon">
					<table class="table"><?php
$this->render('pokemon/_info', ['pokemon' => $pokemon]);
$this->render('pokemon/_image', ['pokemon' => $pokemon]);
$this->render('pokemon/_level', ['pokemon' => $pokemon]);
$this->render('pokemon/_nickname', ['pokemon' => $pokemon]);
$this->render('pokemon/_hold_item', ['pokemon' => $pokemon]);
$this->render('pokemon/_moves', ['pokemon' => $pokemon]);
//$this->render('pokemon/_ability', array('pokemon' => $pokemon));
//$this->render('pokemon/_nature', array('pokemon' => $pokemon));
$this->render('pokemon/_characteristic', ['pokemon' => $pokemon]);
$this->render('pokemon/_next_move', ['pokemon' => $pokemon]);
$this->render('pokemon/_evolution', ['pokemon' => $pokemon]); ?>

					</table>
				</div>
			</div>