
					<tr><?php
foreach($pokemon as $p) { ?>

						<td class="valign-middle">
							<ul class="pokemon-moves">
								<li><em>Evolves:</em></li>
								<li><?php
								if(isset($p->evolves_method) || isset($p->evolves_level)) { ?><?= isset($p->evolves_method) ? 'with ' . $p->evolves_method : '';
								?><?= isset($p->evolves_level) ? 'Lv. ' . $p->evolves_level : ''; ?><?php
								} else { ?>-<?php } ?></li>
							</ul>
						</td><?php
	
} ?>

					</tr>