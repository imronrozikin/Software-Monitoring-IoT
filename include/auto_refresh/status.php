<?php
include "../../include/koneksi.php";

 $query = "SELECT * FROM metode order by id desc limit 1";
 $sql = mysqli_query($connection, $query);
 $data = mysqli_fetch_array($sql);

 $defuzzyfikasi = $data['defuzzyfikasi'];

 if($defuzzyfikasi <= 20 ){
	$status = 'Sangat Redup';
 }else if($defuzzyfikasi > 20 && $defuzzyfikasi <= 37 ){
 	$status = 'Redup';
 }else if($defuzzyfikasi > 37 && $defuzzyfikasi <= 54 ){
 	$status = 'Normal';
 }else if($defuzzyfikasi > 54 && $defuzzyfikasi <= 72 ){
 	$status = 'Terang';
 }else if($defuzzyfikasi > 72 && $defuzzyfikasi <= 90 ){
 	$status = 'sangat terang';
 }
 echo $status;
?>

