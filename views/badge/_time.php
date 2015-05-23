
					<tr><?php
foreach($badges as $b) { ?>

						<td><?= isset($b->time) ? FuncHelp::getDateTime($b->time) : '<em>Not yet</em>'; ?></td><?php
} ?>

					</tr>
