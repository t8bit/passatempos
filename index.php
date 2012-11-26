<?php
session_start();
date_default_timezone_set('Europe/Lisbon');
$rotate=$_GET['route'];
if(!isset($rotate)){$rotate='';}

require_once('settings.php');
require_once('core/core.php');
require_once('router.php');
?>

