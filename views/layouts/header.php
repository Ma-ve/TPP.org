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

		<title>TwitchPlaysPok&eacute;mon / Twitch Plays Pok&eacute;mon - Let's Get Organized!</title>
		<link href="css/twitchplayspokemon.css" rel="stylesheet">
		<link href="css/spritesheets.css" rel="stylesheet">
		<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/grayscale.css" rel="stylesheet">
		<link href="css/jquery-ui.min.css" rel="stylesheet"><?php /*

		<link href="css/minified.css" rel="stylesheet">*/ ?>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="js/jquery.plugin.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script src="js/jquery.lazyload.min.js"></script>

		<script src="js/jquery-ui.min.js"></script>
		<script src="js/twitchplayspokemon.js"></script><?php /*

		<script src="js/minified.js"></script>*/ ?>
	</head>

	<body id="top">
		<nav class="navbar navbar-default navbar-static-top navbar-pokemon" role="navigation">
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
						<li><a href="https://sites.google.com/site/twitchplayspokemonstatus/" target="_blank">Google Doc</a>
						<li><a href="http://www.reddit.com/live/uaacu13x0zen/" target="_blank">Reddit Live Updater</a>
						<!--<li><a href="/" class="tpp-options">Settings</a></li>-->
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
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
