
					<tr><?php
foreach($trainers as $t) {
/** @var $t \TPP\Models\EliteFour|\TPP\Models\Trainer */?>

						<td>Win / Loss: <strong><?= $t->wins; ?> / <?= $t->losses; ?></strong></td><?php
} ?>

					</tr>
					<tr><?php
foreach($trainers as $t) { ?>

							<td>
								<span>First beaten: <strong><?= TPP\Helpers\Helper::getDateTime($t->time); ?></strong></span>
								<br>
								<span>Attempts first win: <strong><?= $t->attempts; ?></strong></span><?php
} ?>

					</tr>
