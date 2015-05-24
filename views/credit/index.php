<?php
$this->render('credit/_general'); ?>

			<div class="row"><?php
foreach(array_chunk($credits, ceil(count($credits) / 2)) as $credits) { ?>

				<div class="col-md-6 col-pokemon-milestones">
					<div class="table-responsive table-bordered table-striped table-pokemon table-milestones">
						<table class="table"><?php
	$this->render('credit/_info', array('credits' => $credits)); ?>

						</table>
					</div>
				</div><?php
} ?>

			</div>