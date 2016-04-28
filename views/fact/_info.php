<?php
foreach($facts as $fact) { ?>

							<tr>
								<td class="text-left fact-item">
									<span><?= $fact->name; ?></span>
								</td>
								<td class="text-right fact-item"><?= !empty($fact->amount) ? '&times; ' . $fact->amount : $fact->value; ?></td>
							</tr><?php
}