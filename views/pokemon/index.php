			<div class="tpp-app tpp-app-pokemon-party"><?php
$this->render('pokemon/_general', array('owned' => $owned, 'seen' => $seen)); ?>

				<div class="table-responsive table-bordered table-pokemon pokemon-scrollable">
					<table class="table"><?php
$this->render('pokemon/_info', array('pokemon' => $pokemon));
$this->render('pokemon/_image', array('pokemon' => $pokemon));
$this->render('pokemon/_level', array('pokemon' => $pokemon));
$this->render('pokemon/_nickname', array('pokemon' => $pokemon));
$this->render('pokemon/_hold_item', array('pokemon' => $pokemon));
$this->render('pokemon/_moves', array('pokemon' => $pokemon));
$this->render('pokemon/_ability', array('pokemon' => $pokemon));
$this->render('pokemon/_nature', array('pokemon' => $pokemon));
$this->render('pokemon/_characteristic', array('pokemon' => $pokemon));
$this->render('pokemon/_next_move', array('pokemon' => $pokemon));
$this->render('pokemon/_evolution', array('pokemon' => $pokemon)); ?>

					</table>
				</div>
			</div>