
					<tr><?php
foreach($party_pokemon as $p) { ?>

						<td class="no-padding">
							<div class="padding8">
								<p class="pokemon-img-container relative w150 h150" data-identifier="<?= $p->id; ?>">
									<?= $p->showImage();
									?><?= $p->showMenuImage(array('class' => 'pokemon-sprite')); ?>

								</p>
							</div>
						</td><?php
} ?>

					</tr>
