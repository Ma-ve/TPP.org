<?php
$this->render('credit/_general');
foreach(array_chunk($credits, 2) as $credits) { ?>

						<div class="row credits"><?php
	$this->render('credit/_info', array('credits' => $credits)); ?>

						</div><?php
}
$this->render('credit/_recruitment');
$this->render('credit/_thanks');