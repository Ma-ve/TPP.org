<?php
foreach($items as $type => $items) { ?>

				<div class="col-md-3">
					<ul class="items js-items-height">
						<li class="item-header"><strong><?= $type; ?></strong></li><?php
	foreach($items as $item) { ?>

						<li>
							<span><?= $item->showImage(); ?></span>
							<span><?= $item->name; ?></span><?=
							isset($item->amount) && $item->amount > 0 ? '<span> &times; ' . $item->amount . '</span>' : ''; ?>

						</li><?php
	} ?>

					</ul>
				</div><?php
}