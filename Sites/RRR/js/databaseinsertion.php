<?php
$con = mysql_connect("localhost", "root", "root");
if(!$con)
{
	die('Could not connect:'.mysql_error());
}
mysql_select_db("RRR", $con);
//sanitize username
$TRACK1 = mysql_real_escape_string($TRACK1);
$sql="INSERT INTO TRACK (TRACK_NAME)
	VALUES
	('$TRACK1')";
$ARTIST = mysql_real_escape_string($ARTIST);
$sql="INSERT INTO TRACK (TRACK_NAME)
	VALUES
	('$TRACK1')";
if (!mysql_query($sql,$con))
{
	die('Error!! = '.mysql_error());
}
mysql_close($con);
echo "SUCCESS!";
?>