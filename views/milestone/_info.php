<?php
global $milestoneCount;
foreach($milestones as $milestone) { ?>

							<tr>
								<td class="text-left milestone-item">
									<span class="milestone-no"><?= ++$milestoneCount; ?></span>
									<span class="milestone-name"><?= $milestone->name; ?></span>
								</td>
								<td class="text-right milestone-item milestone-time"><small><?= $milestone->time; ?></small></td>
							</tr><?php
}