
					<tr><?php
foreach($party_pokemon as $p) { ?>

						<td class="valign-middle">
							<ul class="pokemon-moves"><?php
	if(isset($p->moves)) {
		foreach($p->getMoves() as $move) {?>

								<li><?= $move; ?></li><?php
		}
	} ?>

							</ul>
						</td><?php
} ?>

					</tr>