<?php
//Koneksi ke database

$server   = "localhost";
$usernames = "root";
$passwords = "";
$database = "db_skripsi_imron"; // nama database

$mysqli = mysqli_connect($server, $usernames, $passwords, $database);
$connection = new mysqli($server, $usernames, $passwords, $database);
//Check error, jikalau error tutup koneksi dengan mysql
if (mysqli_connect_errno()) {
	echo 'Koneksi gagal, ada masalah pada : ' . mysqli_connect_error();
	exit();
	mysqli_close($mysqli);
}
$con=new PDO("mysql:host=localhost;dbname=db_skripsi_imron","root","");

?>