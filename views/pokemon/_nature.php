
					<tr><?php
foreach($pokemon as $p) { ?>

						<td class="valign-middle">
							<ul class="pokemon-moves">
								<li><em>Nature:</em></li>
								<li><?= isset($p->nature) ? '<span class="nature tpp-tooltip" data-content="' . $p->getNatureDescription() . '">' . $p->nature . '</span>' : '<em>Unknown</em>'; ?></li>
							</ul>
						</td><?php
	
} ?>

					</tr>