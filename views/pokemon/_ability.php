
					<tr><?php
foreach($party_pokemon as $p) { ?>

						<td class="valign-middle">
							<ul class="pokemon-moves">
								<li><em>Ability:</em></li>
								<li><?= isset($p->ability) ? '<span class="nature tpp-tooltip" data-content="' . $p->getAbilityDescription() . '">' . $p->ability . '</span>' : '<em>Unknown</em>'; ?></li>
							</ul>
						</td><?php
	
} ?>

					</tr>