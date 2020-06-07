<?php
//
define('DB_SERVER', '92.249.44.207');
define('DB_USERNAME', 'u725926379_admin');
define('DB_PASSWORD', 'a8-2LT2$_,@GNM&T');
define('DB_NAME', 'u725926379_contactdb');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>