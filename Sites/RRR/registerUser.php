<?php

$username = $_POST['Username'];
$firstname = $_POST['UserFirstName'];
$lastname = $_POST['UserLastName'];
$email = $_POST['UserEmail'];
$pass1 = $_POST['UserPass1'];
$pass2 = $_POST['UserPass2'];
if(!isset($username))
	die(header("location:reg&log.php?loginFailed=true&reason=usernameblank"));

if($pass1 != $pass2)
    die(header("location:reg&log.php?loginFailed=true&reason=passwordmismatch"));

$hash = hash('sha256', $pass1);

function createSalt()
{
    $string = md5(uniqid(rand(), true));
    return substr($string, 0, 3);
}
$salt = createSalt();
$hash = hash('sha256', $salt . $hash);

$con = mysql_connect("localhost", "root", "root");
if(!$con)
{
	die('Could not connect:'.mysql_error());
}
mysql_select_db("RRR", $con);
//sanitize username
$username = mysql_real_escape_string($username);
$sql="INSERT INTO USER (USERNAME, FIRSTNAME, LASTNAME, EMAIL, PASSWORD, SALT)
VALUES
('$username','$firstname','$lastname','$email','$hash','$salt')";

if (!mysql_query($sql,$con))
{
die(header('Location: reg&log.php#signup'));
}
mysql_close($con);

header('Location: reg&log.php#login');
