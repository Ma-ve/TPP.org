<?php
global $milestoneCount;
foreach($milestones as $milestone) { ?>

							<tr>
								<td class="text-left">
									<span class="milestone-no"><?= ++$milestoneCount; ?></span>
									<span class="milestone-name"><?= $milestone->name; ?></span>
								</td>
								<td class="text-right"><small><?= $milestone->time; ?></small></td>
							</tr><?php
}