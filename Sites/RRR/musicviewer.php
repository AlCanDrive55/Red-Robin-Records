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
	<?php include 'DBconnect.php'; ?>
	<?php include 'productQuery.php'; ?>
	<?php include 'addToPlaylist.php'; ?>
	<?php include 'player.php'; ?>
	<?php
	$result = mysql_query($trackquery);
	$resulttracks = mysql_query($trackquery);
	$resultalbum = mysql_query($albumquery);
	if (!$result) {
    $error = 'Could not run query: ' . mysql_error();
    exit;
    }
	else if (mysql_num_rows($result)<1)
	{
		$error = "Can't find artist/album";
	}
	else
	{
    $row = mysql_fetch_array($result);
    $album 			= $row['ALBUM_NAME'];
    $artist 		= $row['ARTIST_NAME'];
    $artistimg		= $row['ARTIST_IMG'];
    $artistdesc		= $row['ARTIST_DESCRIPTION'];
    $albumimg		= $row['ALBUM_IMG'];
    $genre			= $row['GENRE_NAME'];
    $year			= $row['YEAR'];
    }
    ?>
<body>
	<div id="big_wrapper" class="duskbg">
		<?php include 'banner.php'; ?>
		<nav class="menu nightmenu">
			<?php include 'nav.php'; ?>
		</nav>
		<div id="center-wrap">
			<div id="artist-window-wrap" class="wrap">
				<div id="album-window">
					<div class="artist-pane">
						<img class="artist-image" src="assets/images/Artists/<?php echo $artistimg; ?>" alt="<?php echo $artist; ?>">
						<h1 class="artist-name"><?php echo $artist; echo $error;?></h1>
						<p class="artist-description"><?php echo $artistdesc; ?></p>
					</div>
				</div>
			</div>
			<div id="album-window-wrap" class="wrap">
				<div id="album-window">
					<div class="album-pane">
						<hr>
						<figure><img class="albumart"  src="assets/images/AlbumArt/
							<?php echo $albumimg ?>" alt="<?php echo $artist." - ".$album;?>">
						</figure>
						<p><b class="album-name"><?php echo $album; ?></b></p>
						<p><?php echo $year ?></p>
						<hr>
						<form id = "album-purchase" name="album-purchase" method="post" action="addToCart.php">
						<select required name='pid' id='format-box' class="center" style="width:30%;">
						<?php
							while($rowalbum = mysql_fetch_array($resultalbum)) {
								echo

							"<option name='pid' value='".$rowalbum['PRODUCT_ID']."'>".$rowalbum['ARTIST_NAME']." - ".$rowalbum['ALBUM_NAME']." - ".$rowalbum['TYPE']." - €".$rowalbum['PRICE']."</option>";
							}
						?>
						</select>
						<input type="submit" name="button" id="button" value="Add To Cart">
						</form>
						<hr>
						<div class="album-tracks">
						<table id="playlist" cover="assets/images/Artists/<?php echo $albumimg; ?>" album="<?php echo $album; ?>" cellspacing="0" cellpadding="0" border="0">
							<tr class="top-row">
								<th>Trackno</th>
								<th>Track</th>
								<th>Artist</th>
								<th>Album</th>
								<th>Add To playlist</th>
							</tr>
							<?php
								while ($rowtrack = mysql_fetch_assoc($resulttracks)) {
								echo
							"<tr class='' cover='{$albumimg}' trackno='{$rowtrack['TRACK_NO']}' albumtrackno='{$rowtrack['TRACK_NO']}' song='{$rowtrack[TRACK_NAME]}' artist='{$artist}' album='{$album}'>
								<td class='playtrack'>{$rowtrack['TRACK_NO']}</td>
								<td class='playtrack'>{$rowtrack[TRACK_NAME]}{$error}</td>
								<td class='playtrack'>{$artist}</td>
								<td class='playtrack'>{$album}</td>
								<td class='wish'><form id='trackToPlaylist' name='trackToPlaylist' method='post' action='addToPlaylist.php'>
        <input type='hidden' name='tid' id='tid' value='{$rowtrack['TRACK_ID']}' />
        <button type='submit' name='button' id='button'><i class='fa fa-list'></i></button></form></td></form>
        					</tr>";
							}
							?>
						</table>
						<script src="js/playlistSelector.js"></script>
						</div>
						<hr>
					</div>
					<div class="links-pane">
						<p>Other Albums by <b><?php echo $artist ?></b></p>
						<ul>
							<!-- $result3 = mysql_query($query);
							$similarAlbum = mysql_fetch_assoc($result2); -->
						</ul>
					</div>
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