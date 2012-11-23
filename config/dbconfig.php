<?php

define('DB_SERVER', 'mysql2.host-services.com');
define('DB_USERNAME', 'WEMAKE_passa');
define('DB_PASSWORD', 'passatempos');
define('DB_DATABASE', 'WEMAKE_passatempos');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>

