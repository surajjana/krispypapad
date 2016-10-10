<?php
$hostname = "localhost";
$db_user = "root";
$db_password = "";
$database = "krispy_papad";
date_default_timezone_set('Asia/Calcutta');
global $db;
if(!isset($db)) {
    $db = mysqli_connect($hostname, $db_user, $db_password, $database);
}
if($db === false) {
    return mysqli_connect_error(); 
}
?>