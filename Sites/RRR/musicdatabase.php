<?php
	$artist=$_GET['artist'];
	$album=$_GET['album'];

	$con = mysql_connect("localhost", "root", "root");
	if(!$con)
	{
		die('Could not connect:'.mysql_error());
	}
	mysql_select_db("RRR-MusicDB", $con);
	$query =
	"SELECT  ALBUM.ALBUM_NAME, ARTIST.ARTIST_NAME, ARTIST.ARTIST_IMG, ARTIST.ARTIST_DESCRIPTION, ALBUM.ALBUM_IMG, ALBUM.NO_OF_TRACKS, GENRE.GENRE_NAME,  ALBUM.YEAR, TRACK.TRACK_NAME, ALBUM_TRACKS.TRACKNO
	FROM ALBUM
	INNER JOIN ARTIST
	ON ALBUM.ARTIST_ID = ARTIST.ARTIST_ID
	INNER JOIN ALBUM_TRACKS
	ON ALBUM.ALBUM_ID = ALBUM_TRACKS.ALBUM_ID
	INNER JOIN TRACK
	ON ALBUM_TRACKS.TRACK_ID = TRACK.TRACK_ID
	INNER JOIN GENRE
	ON ALBUM.GENRE_ID = GENRE.GENRE_ID
	WHERE ALBUM_NAME = '".mysql_real_escape_string($_GET['album'])."' AND ARTIST_NAME = '".mysql_real_escape_string($_GET['artist'])."'
	ORDER BY TRACKNO;";

	$result = mysql_query($query);
	$result2 = mysql_query($query);
	if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
    }
	else if (mysql_num_rows($result)<1)
	{
		 echo "Can't find artist";
	}
	else
	{
    $row = mysql_fetch_array($result);
    $album 			= $row[0];
    $artist 		= $row[1];
    $artistimg		= $row[2];
    $albumimg		= $row[4];
    $artistdesc		= $row[3];
    $totaltracks 	= $row[5];
    $genre			= $row[6];
    $year			= $row[7];
	}
?>