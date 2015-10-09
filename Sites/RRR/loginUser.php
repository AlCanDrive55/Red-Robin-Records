<?php

$username = $_POST['Username'];
$password = $_POST['UserPass'];

$con = mysql_connect("localhost", "root", "root");
if(!$con)
{
	die('Could not connect:'.mysql_error());
}
mysql_select_db("RRR", $con);
$username = mysql_real_escape_string($username);
$query = "SELECT PASSWORD, SALT
        FROM USER
        WHERE USERNAME = '$username';";
$result = mysql_query($query);
if(mysql_num_rows($result) < 1) //no such user exists
{
    header('Location: registerUser.php#login');
    die();
}
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
$hash = hash('sha256', $userData['SALT'] . hash('sha256', $password) );
if($hash != $userData['PASSWORD']) //incorrect password
{
    header('Location: registerUser.php#login');
    die();
}
else
{
	session_start();
    session_regenerate_id (); //this is a security measure
    $_SESSION['valid'] = 1;
    $_SESSION['username'] = $username;
}
	header('Location: index.php');
