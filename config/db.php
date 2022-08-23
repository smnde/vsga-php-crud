<?php


// Konfigurasi database
$db_host = 'localhost';
$db_username = 'root';
$db_password = '123qweasd';
$db_database = 'students';

$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if (!$connection) {
	die('Connection failed' . mysqli_connect_error());
}

// EOF