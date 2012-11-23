<?php
session_start();
$rotate=$_GET['route'];
if(!isset($rotate)){$rotate='';}

require_once('settings.php');
require_once('core/core.php');
require_once('router.php');
?>

