<?php
session_start();
/*if (!isset($_SESSION['id'])){
	header("Location: login-facebook.php");
}
if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'facebook') {
        header("Location: login-facebook.php");
    }
}*/
$_GET['user']=3;
date_default_timezone_set('Europe/Lisbon');
require_once('db.class.php');
require_once('fblogin.php');
require_once('module.php');
require_once('template.php');

?>
