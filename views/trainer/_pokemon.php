
					<tr><?php
foreach($trainers as $t) { ?>

						<td>
							<ul class="pokemon-moves text-left"><?php
	foreach($t->pokemon as $pokemon) { ?>

								<li><?= $pokemon->name; ?> (Lv. <?= $pokemon->level; ?>)</li><?php
	} ?>

							</ul>
						</td><?php
} ?>

					</tr>
