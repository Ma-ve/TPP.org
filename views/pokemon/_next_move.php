
					<tr><?php
foreach($party_pokemon as $p) { ?>

						<td class="valign-middle">
							<ul class="pokemon-moves">
								<li><em>Next move:</em></li>
								<li><?=
	isset($p->next_move->name) ? $p->next_move->name : '-'; ?><?=
	isset($p->next_move->level) ? ' (Lv. ' . $p->next_move->level . ')' : ''; ?></li>
							</ul>
						</td><?php
	
} ?>

					</tr>