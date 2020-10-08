<?php
include "../../include/koneksi.php";

 $query = "SELECT * FROM data_sensor order by id desc limit 1";
 $sql = mysqli_query($connection, $query);
 $data = mysqli_fetch_array($sql);

 $status = $data['status'];
 
 if($status == 1){
 	$kerupuk = 'Belum Kering';
 }else{
 	$kerupuk = 'Sudah Kering';
 }

echo $kerupuk;
?>