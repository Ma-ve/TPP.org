<?php

use TPP\Helpers\Helper;

?>

					<tr><?php
foreach($badges as $b) { ?>

						<td><?= isset($b->time) ? Helper::getDateTime($b->time) : '<em>Not yet</em>'; ?></td><?php
} ?>

					</tr>
