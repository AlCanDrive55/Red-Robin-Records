<!DOCTYPE html>
<html lang="en">
<head>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css" media="screen">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
	<div id="player-container">
		<div id="playerToggle"><div class="center"><i class="playerToggleArrow fa fa-chevron-left"></i></div></div>
		<div id="audio-player">
		 	<div id="audio-info" class="player">
				<div class="progress">
					<div class="progressbar"></div>
				</div>
			<!-- <input id="volume" type="range" min="0" max="10" value="5"> -->
				<div class="current-track">
					<div class="top-controls">
					<ul>
						<li class="playlistToggle"><i class="fa fa-list"></i><i class="playlistToggleArrow fa fa-toggle-up"></i></li>
						<li class="playerClose"><i class="fa fa-close"></i></li>
					</ul>
		 			</div>
					<figure class="albumn-cover"><img class="cover" alt=""/></figure>
				    <div class="track-name">
				    	<h1><a id="track" class="title track"></a></h1>
				      	<h2>
				        	<span class="artist"><a id="artist"></a></span>
				        	&ndash;
				        	<span id="album" class="album"><a></a></span>
				      	</h2>
				      	<h3>
					      	<span>Track </span><span id="trackno" class="trackno"></span><span>.</span>
					      	&ndash;
					      	<span id="progress" class="duration"></span>
					     </h3>
						<div class="controls">
							<ul>
								<li class="toggle"><i class="fa fa-repeat"></i></li>
								<li id="prev"><i class="fa fa-fast-backward"></i></li>
								<li class="play" id="play"><i class="fa fa-play"></i></li>
								<li id="next"><i class="fa fa-fast-forward"></i></li>
								<li class="toggle"><i class="fa fa-random"></i></li>
							</ul>
						</div>
					</div>
				</div>
		 	</div>
		</div>
		<div id="playlistmenu" class="clearfix">
			<table id="playlist" cellspacing="0" cellpadding="0" border="0">
				<tr class="top-row">
					<th></th>
					<th></th>
					<th>Track</th>
					<th>Artist</th>
					<th>Album</th>
				</tr>
				<?php
					echo $mediaplayerOutput;
					?>
				</tr>
				<tr class="top-row">
					<td colspan="5"></th>
				</tr>
				<tr class="top-row">
					<td colspan="5"></th>
				</tr>
				<tr class="top-row">
					<td colspan="5"></th>
				</tr>
			</table>
		</div>
	</div>
	<script src="js/musicplayer.js"></script>
</body>
</html>
