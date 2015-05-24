<?php
foreach($credits as $credit) { ?>

							<tr>
								<td class="text-left">
									<span><?= $credit->showImage() . $credit->name . $credit->title . $credit->quote; ?></span>
								</td>
								<td class="text-right"><?= $credit->generations ?></td>
							</tr><?php
}