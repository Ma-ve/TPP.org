
					<tr><?php
/** @var $e TPP\Models\EliteFour */
foreach($elitefour as $e) { ?>

						<td><span class="elite-four-type <?= TPP\Helpers\Helper::safeName($e->type); ?>"><?= $e->type; ?></span></td><?php
} ?>

					</tr>
