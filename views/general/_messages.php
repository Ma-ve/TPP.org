<?php
$ms = $params['messages']; ?>

				<div class="alert alert-info">
					<p><strong>Heyo! You have a new message:</strong></p>
					<p><?= stripslashes($ms['message']); ?></p><?php
if(!empty($ms['suggestion'])) { ?>

					<p><em>This was sent in response to:</em></p>
					<p style="font-size: 0.9em;"><?= stripslashes($ms['suggestion']); ?></p><?php
} ?>

					<p>&ndash; <?= $ms['sentUser']; ?></p>
					<p>
						<a href="/read/<?= $ms['id']; ?>" class="btn btn-primary btn-sm">Mark as read</a>
					</p>
				</div>