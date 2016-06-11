<?php

include 'logger.php';

$mysql_user = 'mysql';
$mysql_port = '3306';
$mysql_host = 'localhost';
$mysql_password = 'admin';
$mysql_dbname = 'Users';

$connection = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_dbname, $mysql_port);
if ($connection->connect_error) {
    die('Connect Error (' . $connection->connect_errno . ') '
    . $connection->connect_error);
} else {
    echo 'Success... ' . $connection->host_info . " (user: " . $mysql_user . ")\n";
}

?>