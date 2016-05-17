
					<tr><?php
/** @var $t TPP\Models\Trainer|TPP\Models\EliteFour */
	foreach($trainers as $t) { ?>

						<td>
							<table class="e4-moves"><?php
	foreach($t->pokemon as $pokemon) { ?>

								<tr>
									<td>
										<strong><?= $pokemon->name; ?></strong>
										<br>
										<?= $pokemon->showImage(['class' => 'img56'], 80); ?>

									</td>
									<td class="e4-pokemon-moves" rowspan="2">
										<ul class="text-right"><?php
											if(isset($pokemon->hold_item)) { ?>

												<li><?= $hold_item->showImage(); ?></li><?php
											}
											foreach($pokemon->moves as $move) { ?>

												<li><?= $move->name; ?></li><?php
											} ?>

										</ul>
									</td>
								</tr>
								<tr>
									<td>Lv. <?= $pokemon->level; ?></td>
								</tr><?php
	} ?>

							</table>
						</td><?php
} ?>

					</tr>
