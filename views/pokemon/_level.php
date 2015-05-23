
					<tr><?php
foreach($pokemon as $p) { ?>

						<td class="valign-middle">Level <?= $p->level; ?><?php
	if(isset($p->has_pokerus)) {
		switch($p->has_pokerus) {
			case 1:
				$pokerusImg = '';
				$pokerusTitle = 'Is infected with Pok&eacute;rus';
				break;
			case 2:
				$pokerusImg = '_cured';
				$pokerusTitle = 'Is cured from Pok&eacute;rus';
				break;
		}
		if($p->has_pokerus == 1) { ?>

							<br /><?php
		} else {
			echo ' ';
		}
	
		echo Image::toImage('/misc', 'pokerus' . $pokerusImg, array('data-content' => $pokerusTitle, 'class' => 'tpp-tooltip')); ?></td><?php
	}
} ?>

					</tr>