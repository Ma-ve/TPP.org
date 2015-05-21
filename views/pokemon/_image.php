
					<tr><?php
for($i = 0; $i < count($party_pokemon); $i++) {
	$p = $party_pokemon[$i];

	$westEast = isset($genders[$i][1]) ? getWestEast($genders[$i][1]) : '';
	$season = isset($fields[$i]['season']) ? getSeason($fields[$i]['season']) : ''; ?>

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
