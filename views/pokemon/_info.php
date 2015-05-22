
					<tr><?php
foreach($party_pokemon as $p) { ?>

						<th><?php
						echo $p->name;
						echo $p->gender;
						echo $p->poke_ball->showImage(); ?>

							<br>
							<small class="pokemon-name">
								<em><?= $p->pokemon ?></em>
								<span><?= isset($p->is_shiny) ? ' <img src="/img/misc/shiny.png" title="Shiny Pok&eacute;mon" alt="Shiny Pok&eacute;mon">' : ''; ?></span><!--<?php if(isset($p->type1)) { ?>

								--><span class="circle <?= strtolower($p->type1); ?> tpp-tooltip" data-content="<?= $p->type1; ?>"></span><!--<?php
							} if(isset($p->type2)) { ?>

								--><span class="circle <?= strtolower($p->type2); ?> tpp-tooltip" data-content="<?= $p->type2; ?>"></span><!--<?php
							} ?>

							--></small>


						</th><?php
} ?>

					</tr>
