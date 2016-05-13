
					<tr><?php
foreach($trainers as $t) {
/** @var $t \TPP\Models\EliteFour|\TPP\Models\Trainer */?>

						<td>Win / Loss: <strong><?= $t->wins; ?> / <?= $t->losses; ?></strong></td><?php
} ?>

					</tr>
					<tr><?php
foreach($trainers as $t) { ?>

							<td><strong><?= $t->name; ?></strong></td><?php
} ?>

					</tr>
