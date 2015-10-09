<!DOCTYPE html>
<html lang="en">
<head>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<title>RRR - Index</title>
	<link rel="stylesheet" href="css/flickity.css" media="screen">
	<script src="js/flickity.pkgd.js"></script>
	<script src="js/registration.js"></script>
	<link rel="stylesheet" href="css/style.css";>
	<meta name="description" content="Red Robin Records">
	<meta name="keywords" content="Music">
	<meta name="author" content="Alan Flood">
</head>
<body>
</body>
	<?php include_once 'DBconnect.php'; ?>
	<?php include 'addToPlaylist.php'; ?>
	<?php include 'productQuery.php'; ?>
	<?php include 'player.php' ?>
	<div id="big_wrapper" class="dawnbg">
		<?php include 'banner.php'; ?>
		<nav class="menu dawnmenu">
		<?php include 'nav.php'; ?>
		</nav>
			<div id="Gallerywrap">
				<div id="Gallery" class="dawnmenu"> <!--Flickity Gallery -->
					<div class="gallery js-flickity" data-flickity-options='{ "autoPlay" : 7000, "imagesLoaded": true, "friction": 1.2,  "wrapAround": true, "pageDots": false, "freeScroll": true, "draggable": false}'>
						<div class="gallery-cell">
							<a href="index.php">
								<img src="assets/images/AlbumArt/VanillaSweetTalk.jpg" alt="" />
							</a>
							<div class="overlay">
								<span><b>Vanilla</b><br>Sweet Talk</span>
							</div>
						</div>
						<div class="gallery-cell">
							<a href="index.php">
								<img src="assets/images/AlbumArt/RTJ2.jpg" alt="" />
							</a>
							<div class="overlay">
								<span><b>Run The Jewels</b><br>Run The Jewels 2</span>
							</div>
						</div>
						<div class="gallery-cell">
							<a href="index.php">
								<img src="assets/images/AlbumArt/CB.jpg" alt="" />
							</a>
							<div class="overlay">
								<span><b>Courtney Barnett</b><br>Sometimes I Sit...</span>
							</div>
						</div>
						<div class="gallery-cell">
							<a href="index.php">
								<img src="assets/images/AlbumArt/SourSoul.jpg" alt="" />
							</a>
							<div class="overlay">
								<span><b>Ghostface Killah & Badbadnotgood</b><br>Sour Soul</span>
							</div>
						</div>
						<div class="gallery-cell">
							<a href="index.php">
								<img src="assets/images/AlbumArt/GoTeamSceneBetween.jpg" alt="" />
							</a>
							<div class="overlay">
								<span><b>The Go! Team</b><br>The Scene Between</span>
							</div>
						</div>
						<div class="gallery-cell">
							<a href="musicviewer.php?artist=Flight Facilities&album=Down to Earth">
								<img src="assets/images/AlbumArt/DTE.jpg" alt="" />
							</a>
							<div class="overlay">
								<span><b>Flight Facilities</b><br>Down To Earth</span>
							</div>
						</div>
						<div class="gallery-cell">
							<a href="musicviewer.php?artist=Todd Terje&album=It's Album Time">

								<img src="assets/images/AlbumArt/TTAlbumTime.jpg" alt="" />
							</a>
							<div class="overlay">
								<span><b>Todd Terje</b><br>Its Album Time</span>
							</div>
						</div>
						<div class="gallery-cell">
							<a href="index.php">
								<img src="assets/images/AlbumArt/RatClassics.jpg" alt="" />
							</a>
							<div class="overlay">
								<span><b>Ratatat</b><br>Classics</span>
							</div>
						</div>
						<div class="gallery-cell">
							<a href="musicviewer.php?artist=Ruckus Roboticus&album=Playing With Scratches">
								<img src="assets/images/AlbumArt/RuckRo.jpg" alt="" />
							</a>
							<div class="overlay">
								<span><b>Ruckus Roboticus</b><br>Playing With Scratches</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="center-wrap">
				<div id="recs" class="wrap">
					<div class="dawnmenu">
						<h1>Recommended For You</h1>
						<div id="recs-cells"> <!--- New Line -->
							<div class="recs-cell-top">
								<a href="musicviewer.php?artist=Dirty Gold&album=Roar">
									<img src="assets/images/AlbumArt/Roar.jpg" alt="" />
								<b>Dirty Gold</b><br>Roar</a>
							</div>
							<div class="recs-cell-top">
								<a href="musicviewer.php?artist=Ruckus Roboticus&album=Playing With Scratches">
									<img src="assets/images/AlbumArt/RuckRo.jpg" alt="" />
								<b>Ruckus Robotocus</b><br>Playing with Scratches</a>
							</div>
							<div class="recs-cell-top">
								<a href="musicviewer.php?artist=Floating Points&album=Shadows">
									<img src="assets/images/AlbumArt/Shadows.jpg" alt="" />
								<b>Floating Points</b><br>Shadows</a>
							</div>
							<div class="recs-cell-top">
								<a href="musicviewer.php?artist=Luomo&album=Vocalcity">
									<img src="assets/images/AlbumArt/LuomoVocal.jpg" alt="" />
								<b>Luomo</b><br>Vocalcity</a>
							</div>
						</div>
						<div id="recs-cells"> <!--- New Line --->
							<div class="recs-cell-top">
								<a href="musicviewer.php?artist=Supergrass&album=Road To Rouen">
									<img src="assets/images/AlbumArt/SupergrassRTR.jpg" alt="" />
								<b>Supergrass</b><br>Road to Rouen</a>
							</div>
							<div class="recs-cell-top">
								<a href="musicviewer.php?artist=Caribou&album=Our Love">
									<img src="assets/images/AlbumArt/caribouOL.jpg" alt="" />
								<b>Caribou</b><br>Our Love</a>
							</div>
							<div class="recs-cell-top">
								<a href="musicviewer.php?artist=Guru&album=Jazzmatazz Vol. 1">
									<img src="assets/images/AlbumArt/GuruJazz.jpg" alt="" />
								<b>Guru<br>Jazzmatazz Vol. 1</a>
							</div>
							<div class="recs-cell-top">
								<a href="musicviewer.php?artist=Max Graef&album=Rivers Of The Red Planet">
									<img src="assets/images/AlbumArt/MaxGraefRivers.png" alt="" />
								<b>Max Graef</b><br>Rivers of the Red Planet</a>
							</div>
						</div>
					</div>
				</div>
				<div id="specialoffs"
				</div>
			</div>
		</div>
		<footer class="dawnfoot">
		<div>
			<img src="assets/images/FooterDawn.jpg">
		</div>
		<div id="menu">
			<p>Alan Flood 2015</p>
		</div>
		</footer>
	</div>
</body>