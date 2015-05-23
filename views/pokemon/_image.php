
					<tr><?php
foreach($pokemon as $p) {
	$size = isset($size) ? $size : null;
?>

						<td class="no-padding">
							<div class="padding8">
								<p class="pokemon-img-container relative w<?= !is_null($size) ? $size : '150'; ?> h<?= !is_null($size) ? $size : '150'; ?>" data-identifier="<?= $p->id; ?>">
									<?= $p->showImage(array(), $size);
									?><?= is_null($size) ? $p->showMenuImage(array('class' => 'pokemon-sprite')) : ''; ?>

								</p>
							</div>
						</td><?php
} ?>

					</tr>
