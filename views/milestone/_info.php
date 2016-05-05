<?php
global $milestoneCount;
foreach($milestones as $milestone) {
	$milestoneCount++; ?>

							<tr>
								<td class="text-left milestone-item">
									<span class="milestone-no<?= $milestoneCount >= 100 ? ' milestone-100' : ''; ?>">
										<?= $milestoneCount; ?>

									</span>
									<span class="milestone-name"><?= $milestone->name; ?></span>
								</td>
								<td class="text-right milestone-item milestone-time"><small><?= $milestone->time; ?></small></td>
							</tr><?php
}