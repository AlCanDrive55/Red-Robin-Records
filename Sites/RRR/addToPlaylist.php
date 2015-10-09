<?php
session_start();

include 'DBconnect.php';
//////////////////////////////////////////////////////////////////////////////////////////
/// Add a track to a users playlist
//////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['tid'])) {
    $tid = $_POST['tid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["playlist_array"]) || count($_SESSION["playlist_array"]) < 1) {
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["playlist_array"] = array(0 => array("track_id" => $tid));
		header("Location: " . $_SERVER["HTTP_REFERER"]);
			   exit();
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["playlist_array"] as $each_item) {
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "track_id" && $value == $tid) {
				  	$error = "Track already in playlist!";
					  $wasFound = true;
					  header("Location: " . $_SERVER["HTTP_REFERER"]);
					  exit();
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["playlist_array"], array("track_id" => $tid));
			   header("Location: " . $_SERVER["HTTP_REFERER"]);
			   exit();
		   }

	}
}

?>
<?php
//////////////////////////////////////////////////////////////////////////////////////////
///	Remove Single Track from a playlist
//////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["playlist_array"]) <= 1) {
		unset($_SESSION["playlist_array"]);
	} else {
		unset($_SESSION["playlist_array"]["$key_to_remove"]);
		sort($_SESSION["playlist_array"]);
	}
	header("location: playlist.php");
    exit();
 }
?>
<?php
//////////////////////////////////////////////////////////////////////////////////////////
///	Empty a playlist
//////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptyplaylist") {
    unset($_SESSION["playlist_array"]);
}
?>
<?php
//////////////////////////////////////////////////////////////////////////////////////////
///	Display tracks in a playlist
//////////////////////////////////////////////////////////////////////////////////////////

$playlistOutput = "";
if (!isset($_SESSION["playlist_array"]) || count($_SESSION["playlist_array"]) < 1) {
	$playlistOutput =
		"<tr class='top-row'>
			<td colspan='7'><h1>Your Playlist is empty!!</h1></td>
		</tr>";
}else{
	$i = 0;
	$TrackNo = 1;
	foreach($_SESSION['playlist_array'] AS $each_item){
		$i++;
		$track_id = $each_item['track_id'];
		$sql = mysql_query(
		"SELECT TRACK_ID,TRACK_NO, TRACK_NAME, ALBUM_NAME, ARTIST_NAME, YEAR, ALBUM_IMG, ARTIST_IMG, ARTIST_DESCRIPTION, GENRE_NAME FROM TRACK
		JOIN ALBUM
		ON ALBUM.ALBUM_ID = TRACK.ALBUM_ID
		JOIN ARTIST
		ON ARTIST.ARTIST_ID = ALBUM.ARTIST_ID
		JOIN GENRE
		ON GENRE.GENRE_ID = ALBUM.GENRE_ID
		WHERE TRACK_ID ='".$track_id."' LIMIT 1;");
		while ($trackrow = mysql_fetch_array($sql)) {
			$PlayTrack_ID = $trackrow["TRACK_ID"];
			$PlayTrack = $trackrow["TRACK_NAME"];
			$PlayAlbum = $trackrow["ALBUM_NAME"];
			$PlayArtist = $trackrow["ARTIST_NAME"];
			$PlayAlbum_IMG = $trackrow["ALBUM_IMG"];
			$PlayAlbumtrack = $trackrow['TRACK_NO'];
		}
		$playlistOutput .= "<tr class='' cover='{$PlayAlbum_IMG}' trackno='{$TrackNo}' albumtrackno='{$PlayAlbumtrack}' song='{$PlayTrack}' artist='{$PlayArtist}' album='{$PlayAlbum}'>";
		$playlistOutput .= "<td class='playtrack'><img class='thumb' src='assets/images/albumart/{$PlayAlbum_IMG}'alt='$PlayAlbum'</td>";
		$playlistOutput .= "<td class='playtrack'>{$TrackNo}</td>";
		$playlistOutput .= "<td class='playtrack'>{$PlayTrack}</td>";
		$playlistOutput .= "<td class='playtrack'>{$PlayArtist}</td>";
		$playlistOutput .= "<td class='playtrack'>{$PlayAlbum}</td>";
		$playlistOutput .= "<td><form action='addToPlaylist.php' method='post'><input name='index_to_remove' type='hidden' value='" . $i . "'/><button class='remove' name='deleteBtn" . $track_id . "' type='submit'><i class='fa fa-times-circle fa-2x' alt='X'></i></span></button></form></td>";
		$playlistOutput .= "<td class='toAlbum'><a href='musicviewer.php?artist={$PlayArtist}&album={$PlayAlbum}'><i class='fa fa-headphones fa-2x'></i></a></td>";

		$mediaplayerOutput .= "<tr class='' cover='{$PlayAlbum_IMG}' trackno='{$TrackNo}' albumtrackno='{$PlayAlbumtrack}' song='{$PlayTrack}' artist='{$PlayArtist}' album='{$PlayAlbum}'>";
		$mediaplayerOutput .= "<td class='playtrack'><img src='assets/images/AlbumArt/{$PlayAlbum_IMG}' alt='{$PlayAlbum}'></td>";
		$mediaplayerOutput .= "<td class='playtrack'>{$TrackNo}</td>";
		$mediaplayerOutput .= "<td class='playtrack'>{$PlayTrack}</td>";
		$mediaplayerOutput .= "<td class='playtrack'>{$PlayArtist}</td>";
		$mediaplayerOutput .= "<td class='playtrack'>{$PlayAlbum}</td>";
		$mediaplayerOutput .= "</tr>";
		$TrackNo++;
		}
	}
