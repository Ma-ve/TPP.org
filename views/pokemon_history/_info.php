<?php
foreach($pokemon as $p) { ?>

							<tr>
								<td class="max-120">
									<span><?= $p->name; ?></span><?php
	if(isset($p->nickname)) { ?>

									<br>
									<small><?= $p->getNicknames(); ?></small><?php
	} ?>

								</td>
								<td><?= $p->showImage(array(), 80); ?></td>
								<td>
									<ul class="pokemon-moves text-left">
										<li><strong>Level <?= $p->level; ?></strong></li><?php
	foreach($p->moves as $move) { ?>
										
										<li><small><?= $move->name; ?></small></li><?php
	} ?>

									</ul>
								</td>
								<td class="history-status history-released">Released 36d 21h 9m</td>
							</tr><?php
}