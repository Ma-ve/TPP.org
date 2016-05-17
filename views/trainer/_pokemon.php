
					<tr><?php
foreach($trainers as $t) { ?>

						<td>
							<ul class="pokemon-moves text-left"><?php
	foreach($t->pokemon as $pokemon) { ?>

								<li><?= isset($pokemon->name) ? $pokemon->name : $pokemon->pokemon; ?> (Lv. <?= $pokemon->level; ?>)</li><?php
	} ?>

							</ul>
						</td><?php
} ?>

					</tr>
