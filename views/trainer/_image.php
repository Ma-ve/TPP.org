
					<tr><?php
foreach($trainers as $t) {
	/**
	 * @var $t \TPP\Models\Trainer
	 */?>

						<td><?= $t->showImage(); ?></td><?php
} ?>

					</tr>
