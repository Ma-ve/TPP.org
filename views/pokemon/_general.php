
			<h3 id="pokemon" class="paragraph-container">
				<strong>Pok&eacute;mon in Party</strong>
				<a href="#pokemon" class="link-paragraph">&para;</a>
				<span class="pull-right owned">Owned: <?= $owned; ?></span>
				<span class="pull-right">Seen: <?= $seen; ?></span>
				<span class="pull-right pokedex-container">
					<a class="pop-pokedex" href="/pokedex">
						<?php echo Image::toImage('/misc', 'pokeball_sprite', array('alt' => 'Open Pok&eacute;dex!', 'title' => 'Open Pok&eacute;dex!', 'class' => 'pokedex')); ?>Pok&eacute;dex!
					</a>
				</span>
			</h3>