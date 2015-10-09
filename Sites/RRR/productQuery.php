<?php
	session_start();

	$artist_name = $_GET[artist];
	$album_name = $_GET[album];

	include 'DBconnect.php';

	$trackquery =
	"SELECT TRACK_ID,TRACK_NO, TRACK_NAME, ALBUM_NAME, ARTIST_NAME, YEAR, ALBUM_IMG, ARTIST_IMG, ARTIST_DESCRIPTION, GENRE_NAME FROM TRACK
	JOIN ALBUM
	ON ALBUM.ALBUM_ID = TRACK.ALBUM_ID
	JOIN ARTIST
	ON ARTIST.ARTIST_ID = ALBUM.ARTIST_ID
	JOIN GENRE
	ON GENRE.GENRE_ID = ALBUM.GENRE_ID
	WHERE ALBUM_NAME = '".mysql_real_escape_string($album_name)."' AND ARTIST_NAME = '".mysql_real_escape_string($artist_name)."'
	ORDER BY TRACK_NO;";

	$albumquery =
	"SELECT PRODUCT.PRODUCT_ID, PRODUCT.TYPE, PRICE, ALBUM_NAME, ARTIST_NAME, ALBUM_IMG
	FROM PRODUCT
	JOIN ALBUM_RELEASE
	ON PRODUCT.PRODUCT_ID = ALBUM_RELEASE.ALBUM_PRODUCT_ID
	JOIN ALBUM
	ON ALBUM.ALBUM_ID = ALBUM_RELEASE.ALBUM_ID
	JOIN ARTIST
	ON ARTIST.ARTIST_ID = ALBUM.ARTIST_ID
	WHERE ALBUM_NAME = '".mysql_real_escape_string($album_name)."' AND ARTIST_NAME = '".mysql_real_escape_string($artist_name)."'
	ORDER BY TYPE;";


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