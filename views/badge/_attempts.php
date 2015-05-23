
					<tr><?php
foreach($badges as $b) { ?>

						<td><?= isset($b->attempts) ? 'Attempts: <strong>' . $b->attempts . '</strong>' : 'None yet!</em>'; ?></td><?php
} ?>

					</tr>
