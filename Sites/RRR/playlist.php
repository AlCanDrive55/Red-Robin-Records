<!DOCTYPE html>
<html lang="en">
<head>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<title>RRR - Index</title>
	<link rel="stylesheet" href="css/style.css">
	<meta name="description" content="Red Robin Records">
	<meta name="keywords" content="Music">
	<meta name="author" content="Alan Flood">
</head>
<?php include_once 'DBconnect.php'; ?>
<?php include 'addToPlaylist.php'; ?>
<?php include 'player.php'; ?>
<body>
	<div id="big_wrapper" class="duskbg">
		<?php include 'banner.php'; ?>
		<nav class="menu nightmenu">
			<?php include 'nav.php'; ?>
		</nav>
		<div id="center-wrap">
			<div id="album-window-wrap" class="wrap">
				<div id="album-window">
					<div class="album-tracks">
						<table id="playlist" cellspacing="0" cellpadding="0" border="0">
							<tr class="top-row">
								<th></th>
								<th>Trackno</th>
								<th>Track</th>
								<th>Artist</th>
								<th>Album</th>
								<th></th>
								<th><small>Go to Album</small></th>
							</tr>
							<?php
							echo $playlistOutput;
							?>
						</table>
					<script src="js/playlistSelector.js"></script>
					</div>
				<hr>
				</div>
			</div>
		</div>
		<footer class="duskfoot">
		<div>
			<img src="assets/images/FooterDusk.jpg">
		</div>
		<div class="duskfoot">
			<p>Alan Flood 2015</p>
		</div>
		</footer>
	</div>
</body>