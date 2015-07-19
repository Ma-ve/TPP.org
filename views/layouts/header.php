<!--



##############  ##############  ##############        ##############  ##############  ##############
      ##        ##          ##  ##          ##        ##          ##  ##        ####  ##
      ##        ##          ##  ##          ##        ##          ##  ##      ###     ##
      ##        ##          ##  ##          ##        ##          ##  #########       ##    ########
      ##        ##############  ##############        ##          ##  ##  #####       ##   #########
      ##        ##              ##              ####  ##          ##  ##    #####     ##          ##
      ##        ##              ##              ####  ##############  ##      ######  ##############

Checking out the source eh? I'll one-up you:
See the source at https://github.com/Ma-ve/TPP.org and help us improve :D



--><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="TwitchPlaysPokemon.org for the Twitch.tv stream status, updates, real time data, and so much more!">
		<meta name="author" content="Mave">
		<link rel="shortcut icon" href="favicon.ico?v2">

		<title>TwitchPlaysPok&eacute;mon / Twitch Plays Pok&eacute;mon - Let's Get Organized!</title><?php
		if(TPP_DEBUG) { ?>

		<link href="css/twitchplayspokemon.css" rel="stylesheet">
		<link href="css/spritesheets.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/grayscale.css" rel="stylesheet">
		<link href="css/jquery-ui.min.css" rel="stylesheet"><?php
		} else { ?>

		<link href="css/minified.css" rel="stylesheet"><?php
		} ?>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script><?php
		if(TPP_DEBUG) { ?>
		<script src="js/jquery.plugin.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script src="js/jquery.lazyload.min.js"></script>
		<script src="js/hammer.min.js"></script>
		<script src="js/jquery.mmenu.min.js"></script>
		<script src="js/jquery.mmenu.dragopen.min.js"></script>

		<script src="js/jquery-ui.min.js"></script>
		<script src="js/twitchplayspokemon.js"></script><?php
		} else { ?>

		<script src="js/minified.js"></script><?php
		} ?>

	</head>

	<body id="top"><!--
		<a href="https://github.com/Ma-ve/TPP.org">
			<img style="position: absolute; top: 0; right: 0; border: 0; z-index: 99999;" src="https://camo.githubusercontent.com/652c5b9acfaddf3a9c326fa6bde407b87f7be0f4/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6f72616e67655f6666373630302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png">
		</a>-->
		<nav class="navbar navbar-default navbar-fixed-top navbar-pokemon" role="navigation">
			<div class="container-fluid container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= $_SERVER['REQUEST_URI']; ?>"><span>T</span>witch<span>P</span>lays<span>P</span>okemon.org</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="non-tpp-app"><a href="https://sites.google.com/site/twitchplayspokemonstatus/" target="_blank">Google Doc</a></li>
						<li class="non-tpp-app"><a href="http://www.reddit.com/live/uaacu13x0zen/" target="_blank">Reddit Live Updater</a></li>
						<li class="tpp-app-nav"><a href="#" data-toggle="collapse" data-target=".nav-collapse" data-show="tpp-app-badge">Badges</a></li>
						<li class="tpp-app-nav"><a href="#" data-toggle="collapse" data-target=".nav-collapse" data-show="tpp-app-pokemon-box">Pok&eacute;mon in Boxes</a></li>
						<li class="tpp-app-nav"><a href="#" data-toggle="collapse" data-target=".nav-collapse" data-show="tpp-app-pokemon-daycare">Pok&eacute;mon in Daycare</a></li>
						<li class="tpp-app-nav"><a href="#" data-toggle="collapse" data-target=".nav-collapse" data-show="tpp-app-item">Items</a></li>
						<li class="tpp-app-nav"><a href="#" data-toggle="collapse" data-target=".nav-collapse" data-show="tpp-app-pokemon-history">Pok&eacute;mon History</a></li>
						<li class="tpp-app-nav"><a href="#" data-toggle="collapse" data-target=".nav-collapse" data-show="tpp-app-milestone">Milestones</a></li>
						<li class="tpp-app-nav"><a href="#" data-toggle="collapse" data-target=".nav-collapse" data-show="tpp-app-fact">Facts</a></li>
						<li class="tpp-app-nav"><a href="#" data-toggle="collapse" data-target=".nav-collapse" data-show="tpp-app-credit">Credits</a></li>
						<!--<li><a href="/" class="tpp-options">Settings</a></li>-->
					</ul>
				</div>
			</div>
		</nav>
		<div class="container tpp-container">
			<div class="pokemon-menu">
				<ul>
					<li><a href="#top">Top</a>
					<li><a href="#pokemon">Pok&eacute;mon [Party]</a>
					<li><a href="#badges">Badges</a>
					<li><a href="#pokemon-box">Box</a>
					<li><a href="#pokemon-daycare">Daycare</a>
					<li><a href="#items">Items</a>
					<!--<li><a href="#timeline">Timeline [NEW]</a>-->
					<li><a href="#pokemon-history">History</a>
					<li><a href="#milestones">Milestones</a>
					<li><a href="#facts">Facts</a>
					<li><a href="#credits">Credits [who to thank!]</a>
				</ul>
			</div>
