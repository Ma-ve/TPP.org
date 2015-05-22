
					<tr><?php
foreach($party_pokemon as $p) { ?>

						<td><?= isset($p->hold_item) ? 'Holds: ' . $p->hold_item->name . ' ' . $p->hold_item->showImage() : '<em>No held item</em>'; ?></td><?php
} ?>

					</tr>