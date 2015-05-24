<?php
foreach($credits as $credit) { ?>

				<div class="col-md-6 credits-col">
					<div class="media spanibution"><?php
	if(isset($credit->link)) { ?>

						<a href="<?= $credit->link; ?>" target="_blank" class="img">
							<?= $credit->showImage(); ?>

						</a><?php
	} else { ?>

						<span class="img">
							<?= $credit->showImage(); ?>

						</span><?php
	} ?>

						<div class="bd">
							<strong><?= isset($credit->link) ? '<a href="' . $credit->link . '" target="_blank">' . $credit->name . '</a>' : $credit->name; ?></strong>
							<span class="text-muted"><?= $credit->title; ?></span>
							<p><?php
	foreach($credit->generations as $g) { ?>

								<span class="tpp-tooltip credits-generation gen<?= $g->id; ?>" data-content="Mod for <?= $g->name; ?>"><?= $g->roman; ?></span><?php
	} ?>

							</p>
							<p class="quote"><?= $credit->quote; ?></p>
						</div>
					</div>
				</div><?php
}