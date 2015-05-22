
					<tr><?php
foreach($party_pokemon as $p) { ?>

						<td class="valign-middle">
							<ul class="pokemon-moves">
								<li><em>Characteristic:</em></li>
								<li><?= isset($p->characteristic) ? '<span class="nature tpp-tooltip" data-content="' . $p->getCharacteristicDescription() . '">' . $p->characteristic . '</span>' : '<em>Unknown</em>'; ?></li>
							</ul>
						</td><?php
	
} ?>

					</tr>