<?php
session_start();
if (!isset($_SESSION['id'])){
	 //Load on start
	header("Location: login-facebook.php");
}
if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'facebook') {
        header("Location: login-facebook.php");
    }
}
?>
