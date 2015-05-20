
					<tr><?php
for($i = 0; $i < count($party_pokemon); $i++) {
	$p = $party_pokemon[$i];

	$westEast = isset($genders[$i][1]) ? getWestEast($genders[$i][1]) : '';
	$season = isset($fields[$i]['season']) ? getSeason($fields[$i]['season']) : '';
	?>

						<td class="no-padding">
							<div class="padding8">
								<p class="pokemon-img-container relative w150 h150">
									<?= $p->showImage(); ?><?php


//										if(isset($_GET['mave'])) { echo safeName($pokemon[$i]) . $addToImage; exit(); }
	echo $p->showMenuImage(array('class' => 'pokemon-sprite'));
//		$titlePok = $pokemon[$i];
//		
//		$titlePok .= !empty($genders[$i]) ? ' - ' . genderName($genders[$i]) : '';
//		$titlePok .= !empty($fields[$i]['season']) ? ' - ' . ucwords($fields[$i]['season']) : '';
//		$titlePok .= !empty($fields[$i]['is_shiny']) ? ' - Shiny' : '';
		?>
								</p>
							</div>
						</td><?php
} ?>

					</tr>
