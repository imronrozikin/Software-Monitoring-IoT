<?php 
include "../../include/koneksi.php";

$query = "SELECT * FROM data_sensor order by id desc limit 2";
$sql = mysqli_query($connection, $query);

foreach ($sql as $key => $value) {
 	$suhu[] = $value['suhu'];
 	$waktu[] = $value['tanggal'];
 } 

foreach ($waktu as $key => $value) {
	$datetime[] = date_format(date_create($value), "H:i:s");
}

$data_suhu = [];
$data_suhu[0] = $suhu[1];
$data_suhu[1] = $suhu[0];

$time = [];
$time[0] = $datetime[1];
$time[1] = $datetime[0]; 

echo json_encode([
	'chart' => [
		'suhu' => $data_suhu,
		'waktu' => $time
	]
]);

?>