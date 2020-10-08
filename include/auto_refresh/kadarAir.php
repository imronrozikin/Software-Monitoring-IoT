<?php
include "../../include/koneksi.php";

$sql =  mysqli_query($connection, "SELECT * FROM data_sensor order by id_history desc limit 1");
$data = mysqli_fetch_array($sql);
$sql1 = mysqli_query($connection, "SELECT * FROM data_sensor ORDER BY id DESC LIMIT 1");
$data1 = mysqli_fetch_array($sql1);

$berat_cawan = 110;
$berat_kerupuk_awal = $data['berat']- $data1['berat'];
$kadar_air = $berat_kerupuk_awal / ($data['berat'] - $berat_cawan) * 100; 

echo round($kadar_air);
?>