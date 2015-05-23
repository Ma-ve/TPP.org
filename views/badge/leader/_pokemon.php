
					<tr><?php
foreach($badges as $b) { ?>

						<td>
							<ul class="pokemon-moves text-left"><?php
	foreach($b->leader->pokemon as $pokemon) { ?>

								<li><?= $pokemon->name; ?> (Lv. <?= $pokemon->level; ?>)</li><?php
	} ?>

							</ul>
						</td><?php
} ?>

					</tr>
