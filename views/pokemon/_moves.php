
					<tr><?php
for($i = 0; $i < count($party_pokemon); $i++) {
	$p = $party_pokemon[$i]; ?>

						<td class="valign-middle">
							<ul class="pokemon-moves"><?php
	if(isset($p->moves)) {
		foreach($p->getMoves() as $move) { ?>

								<li><?= $move; ?></li><?php
		}
	} ?>

							</ul>
						</td><?php
} ?>

					</tr>