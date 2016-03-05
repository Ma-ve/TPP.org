
			<div class="tpp-app tpp-app-badge tpp-app-hidden"><?php
$this->render('badge/_general', array('obtained' => array_sum(array_map(function($v) { return $v['obtained']; }, $badges))));
foreach($badges as $title => $badges) { ?>

				<h4 id="<?= FuncHelp::safeName($title); ?>"><?= $title; ?></h4>
				<div class="table-responsive table-bordered table-pokemon pokemon-scrollable mtop20">
					<table class="table"><?php
						$badges = $badges['badges'];
						$this->render('badge/_name', array('badges' => $badges));
						$this->render('badge/_image', array('badges' => $badges));
						$this->render('badge/_time', array('badges' => $badges));
						$this->render('badge/_attempts', array('badges' => $badges));
						$this->render('badge/leader/index', array('badges' => $badges)); ?>

					</table>
				</div><?php
} ?>

			</div>