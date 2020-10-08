<?php
include "../koneksi.php";
$query = mysqli_query($connection, "SELECT * FROM data_sensor ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_array($query);
$status = $data['status'];
$suhu_float = $data['suhu'];
$kelembaban_float = $data['kelembaban'];
$suhu = (int)$suhu_float;
$kelembaban = (int)$kelembaban_float;

######################################################################################################
									// metode fuzzy sugeno
######################################################################################################

//fuzzyfikasi suhu
$nilaiDingin = 0;
if($suhu <= 30 ){
	$nilaiDingin = 1;
} 
else if ($suhu > 30 and $suhu < 45 )
{
	$nilaiDingin = (45 - $suhu) / (45 - 30); 
}else {
	$nilaiDingin = 0;
}

$nilaiHangat = 0;
if ($suhu > 30 and $suhu < 45){
	$nilaiHangat = ($suhu - 30) / (45 - 30);
}else if($suhu == 45){
	$nilaiHangat = 1;
}
else if($suhu >45 and $suhu < 60) {
	$nilaiHangat = (60  - $suhu ) / (60 - 45);
}
else{
	$nilaiHangat = 0;
}

$nilaiPanas = 0;
if ($suhu >45 and $suhu <= 60){
 $nilaiPanas = ($suhu - 45) / (60 - 45);
}else if($suhu < 45) {
		$nilaiPanas = 0;
}else if($suhu > 60){
	$nilaiPanas=1;
}

//Fuzzifikasi Kelembaban
$nilaiBasah = 0;
if($kelembaban >= 50){
	$nilaiBasah = 1;
}else if($kelembaban < 50 && $kelembaban > 40){
	$nilaiBasah = ($kelembaban - 40)/(50 - 40);
}else{
	$nilaiBasah = 0;
}

$nilaiLembab = 0;
if ($kelembaban >= 20 && $kelembaban <= 40) {
	$nilaiLembab = 1;
}else if($kelembaban > 40 && $kelembaban < 50){
	$nilaiLembab = (50 - $kelembaban)/(50-40);
}else if($kelembaban < 20 && $kelembaban > 10){
	$nilaiLembab = (20 - $kelembaban)/(20 - 10);
}else{
	$nilaiLembab = 0;
}

$nilaiKering = 0;
if ($kelembaban <= 10) {
	$nilaiKering = 1;
}else if($kelembaban > 10 && $kelembaban < 20){
	$nilaiKering = ($kelembaban - 10)/(20-10);
}else{
	$nilaiKering = 0;
}

//Rules Based Fuzzy;
$r1 = 90; //sangat terang
$r2 = 72; //terang
$r3 = 54; //normal
$r4 = 37; //redup
$r5 = 20; //sangat redup

//Defuzzyfikasi
$a1 = min($nilaiDingin, $nilaiBasah);   $z1 = $a1 * $r1;  
$a2 = min($nilaiDingin, $nilaiLembab);  $z2 = $a2 * $r2; 
$a3 = min($nilaiDingin, $nilaiKering);  $z3 = $a3 * $r3;
$a4 = min($nilaiHangat, $nilaiBasah);   $z4 = $a4 * $r2;
$a5 = min($nilaiHangat, $nilaiLembab);  $z5 = $a5 * $r3;
$a6 = min($nilaiHangat, $nilaiKering);  $z6 = $a6 * $r4;
$a7 = min($nilaiPanas,  $nilaiBasah);   $z7 = $a7 * $r3;
$a8 = min($nilaiPanas,  $nilaiLembab);  $z8 = $a8 * $r4;
$a9 = min($nilaiPanas,  $nilaiKering);  $z9 = $a9 * $r5;

$WA = ($z1+$z2+$z3+$z4+$z5+$z6+$z7+$z8+$z9)/($a1+$a2+$a3+$a4+$a5+$a6+$a7+$a8+$a9);
$defuzzyfikasi = (int)$WA;

##########################################################################################

$updateDataSQL = mysqli_query($connection, "UPDATE metode SET fs_dingin = '".$nilaiDingin."', fs_hangat = '".$nilaiHangat."', fs_panas = '".$nilaiPanas."', fk_kering = '".$nilaiKering."', fk_lembab = '".$nilaiLembab."', fk_basah = '".$nilaiBasah."', defuzzyfikasi = '".$WA."' ");

if($status == 1){
	$updateApi = "https://api.thingspeak.com/update?api_key=6QD8VBVQ22G4ZHWN&field1=$defuzzyfikasi";
	$kirimData = file_get_contents($updateApi);
}else{
	$updateApi = "https://api.thingspeak.com/update?api_key=6QD8VBVQ22G4ZHWN&field1=1";
	$kirimData = file_get_contents($updateApi);
}

echo $WA;
?>