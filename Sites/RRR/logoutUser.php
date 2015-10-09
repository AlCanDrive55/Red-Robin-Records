<?php
	session_start();

if (isset($_SESSION['username'])){
    $_SESSION = array(); //destroy all of the session variables
    session_destroy();
    header('Location: index.php');
 }

 ?>


