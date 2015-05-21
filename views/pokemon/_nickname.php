
					<tr><?php
for($i = 0; $i < count($party_pokemon); $i++) {
	$p = $party_pokemon[$i]; ?>

						<td class="valign-middle"><?= $p->getNicknames(); ?></td><?php

} ?>

					</tr>