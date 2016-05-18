<?php

use TPP\Models\Image;
use TPP\Helpers\Helper;

?>

			<div class="tpp-app tpp-app-header">
				<div class="page-header">
					<h1>
						<a href="http://www.twitch.tv/twitchplayspokemon"><!--
							--><strong><i class="fa fa-external-link"></i>Twitch Plays Pok&eacute;mon</strong><!--
						--></a><!--
						--><a href="" class="pop-out btn btn-danger btn-xs"><i class="fa fa-expand"></i>Pop out</a>

						<span class="pull-right last-update">Last update: <?= Helper::getDateTime($general->last_update); ?></span>
					</h1><?php
	if(!empty($messages)) {
		$this->render('general/_messages', ['messages' => $messages]);
	} ?>

			<div class="pull-left current-status">
				<p>Current Goal: <strong><?= utf8_decode($general->current_goal); ?></strong></p>
				<p>Optional Goal: <strong><?= !empty($general->optional_goal) ? utf8_decode($general->optional_goal) : '-'; ?></strong></p>
				<p>Current Location: <strong><?= utf8_decode($general->current_location); ?></strong></p>
				<p>Current Pok&eacute;center: <strong><?= utf8_decode($general->current_pokecenter); ?></strong></p>
				<p>Money in hand: <strong><?= Image::toImage('/items', 'pokedollar', ['title' => 'Pok&eacute;dollar', 'alt' => 'Pok&eacute;dollar']); ?><?= $general->money; ?></strong></p>
			</div>
					<div class="current-info pull-right text-right">
						<p>Before this, we played Pok&eacute;mon:</p>
						<p><a href="/red">Red</a> | <a href="/crystal">Crystal</a> | <a href="/emerald">Emerald</a> | <a href="/firered">FireRed</a> | <a href="/platinum">Platinum</a> | <a href="/heartgold">HeartGold</a> | <a href="/black">Black</a> | <a href="/black2">Black 2</a></p>
						<p><a href="/x">X</a> | <a href="/omegaruby">Omega Ruby</a> | <a href="/ar">Anniversary Red</a> | <a href="/alphasapphire">Alpha Sapphire</a> | <a href="/colosseum">Colosseum</a> | <a href="/xd">XD</a></p>
						<p>We're playing <a href="http://www.reddit.com/r/twitchplayspokemon/" target="_blank">Touhoumon</a> right now!</p>
						<p><span class="more-info"><a href="" class="show-about"><i class="fa fa-caret-right"></i>What is this all about?</a></span>&nbsp;&nbsp;&nbsp;<span class="more-info"><a href="" class="show-feedback"><i class="fa fa-caret-right"></i>Feedback/suggestions?</a></span></p>
					</div>
			<div class="clearfix"></div>
		</div>
		<div id="about" class="about">
			<p>There's a livestreaming channel that's playing series of Pok&eacute;mon games. Normally live streams have one person controlling the game and everyone else simply watching them, but the creator of this live stream in particular set the game up so that anyone who comments on the stream can control the game. Anyone watching can tell the game to press any button at any time, and the game will do it. This created a game being played by thousands of people at the same time. Of course, coordinating thousands of people is impossible, so as a result the game has seriously struggled- the main character even struggles to walk in a straight line. But some combination of the main character's laughable failure to do anything, the fact that the entire audience is controlling the game together, and the unthinkable amount of progress they've made in the game so far has made Twitch Plays Pok&eacute;mon a real event for people who like video games, and as a result it's gotten super-popular.</p>
		</div>

		<div id="feedback" class="feedback">
			<textarea class="feedback-form" placeholder="Feedback, suggestions, anything you wish to say, fire away!"></textarea>
			<button class="btn btn-primary feedback-button">Submit!</button>
		</div><?php
		if(isset($general->notices)) {
			foreach($general->notices as $notice) { ?>

		<div class="alert alert-info"><?= $notice; ?></div><?php
			}
		} ?>

			</div>