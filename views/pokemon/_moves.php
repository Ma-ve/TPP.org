
					<tr><?php
foreach($pokemon as $p) { ?>

						<td class="valign-middle">
							<ul class="pokemon-moves"><?php
	if(isset($p->moves) && !empty($p->moves)) {
		foreach($p->getMoves() as $move) {?>

								<li><?= $move; ?></li><?php
		}
	} else { ?>

								<li class="valign-middle">?</li><?php
	}?>

							</ul>
						</td><?php
} ?>

					</tr>