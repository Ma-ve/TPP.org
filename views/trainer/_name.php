
					<tr><?php
/** @var $t TPP\Models\Trainer|TPP\Models\EliteFour|TPP\Models\ImportantTrainer*/
foreach($trainers as $t) { ?>

						<td>
							<strong><?= $t->name; ?></strong><?php
	if(isset($t->nickname)) { ?>

							<br>
							<small><em><?= $t->nickname; ?></em></small><?php
	} ?>

						</td><?php
} ?>

					</tr>
