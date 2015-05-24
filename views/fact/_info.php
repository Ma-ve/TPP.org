<?php
foreach($facts as $fact) { ?>

							<tr>
								<td class="text-left">
									<span><?= $fact->name; ?></span>
								</td>
								<td class="text-right"><?= !empty($fact->amount) ? '&times; ' . $fact->amount : $fact->value; ?></td>
							</tr><?php
}