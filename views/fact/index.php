
			<div class="tpp-app tpp-app-fact tpp-app-hidden"><?php
$this->render('fact/_general'); ?>

				<div class="row"><?php
foreach(array_chunk($facts, ceil(count($facts) / 3)) as $facts) { ?>

					<div class="col-md-4 col-pokemon-milestones">
						<div class="table-responsive table-bordered table-striped table-pokemon table-milestones">
							<table class="table"><?php
	$this->render('fact/_info', array('facts' => $facts)); ?>

							</table>
						</div>
					</div><?php
} ?>

				</div>
			</div>