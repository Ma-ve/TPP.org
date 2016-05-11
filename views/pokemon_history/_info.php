<?php
/**
 * @var $p Pokemon
 */
foreach($pokemon as $p) { ?>

							<tr>
								<td style="height: 100px; line-height: 14px;" class="max-120">
									<span><?= $p->name; ?></span><?php
	if(isset($p->nickname)) { ?>

									<br>
									<small><?= $p->getNicknames(); ?></small><?php
	} ?>

								</td>
								<td style="height: 100px; line-height: 14px;"><?= $p->showImage([], 80); ?></td>
								<td style="height: 100px; line-height: 14px;">
									<ul class="pokemon-moves text-left">
										<li><strong>Level <?= $p->level == 0 ? '?' : $p->level; ?></strong></li><?php
	if(isset($p->moves)) {
		foreach($p->moves as $move) { ?>
										
										<li><small><?= $move->name; ?></small></li><?php
		}
	} ?>

									</ul>
								</td>
								<td style="height: 100px; line-height: 14px;" class="history-status history-<?= $p->getHistoryColour(); ?>">
									<span><?= $p->status; ?> <?php
										if($p->evohatch != '') {
											echo $p->getHistoryStatusText() . ' <em>' . $p->evohatch . '</em>';
										}
										echo ' ' . $p->getComment(); ?></span></td>
							</tr><?php
}