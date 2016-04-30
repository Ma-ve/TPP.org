
			<div class="tpp-app tpp-app-milestone tpp-app-hidden"><?php
$this->render('milestone/_general'); ?>

				<div class="row"><?php
/**
 * I can't find another way to do this.
 * Having $key * count($milestones) doesn't work, as 26/26/25 becomes 1-26, 27-52, 51-74 (note the starting # of the last one)
 */
$milestoneCount = 0;
foreach(array_split($milestones, 3) as $milestones) { ?>

					<div class="col-md-4 col-pokemon-milestones">
						<div class="table-responsive table-bordered table-striped table-pokemon table-milestones">
							<table class="table"><?php
	$this->render('milestone/_info', ['milestones' => $milestones]); ?>

							</table>
						</div>
					</div><?php
} ?>

				</div>
			</div>