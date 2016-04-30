
					<tr class="tr-spacer"></tr>
					<tr><?php
foreach($pokemon as $p) { ?>

						<td>
							<strong><?= $p->name; ?><?= isset($p->gender) ? ' ' . $p->BeautifyGender($p->gender) : ''; ?><?= isset($p->poke_ball) ? ' ' . $p->poke_ball->showImage() : ''; ?></strong>

							<br>
							<small class="pokemon-name">
								<em><?= $p->pokemon ?></em>
								<span><?= isset($p->is_shiny) ? Image::toImage('/misc', 'shiny', ['title' => 'Shiny Pok&eacute;mon', 'alt' => 'Shiny Pok&eacute;mon']) : ''; ?></span><!--<?php if(isset($p->type1)) { ?>

								--><span class="circle <?= strtolower($p->type1); ?> tpp-tooltip" data-content="<?= $p->type1; ?>"></span><!--<?php
							} if(isset($p->type2)) { ?>

								--><span class="circle <?= strtolower($p->type2); ?> tpp-tooltip" data-content="<?= $p->type2; ?>"></span><!--<?php
							} ?>

							--></small>


						</td><?php
} ?>

					</tr>