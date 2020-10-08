<?php 
$suhu = $_GET['suhu'];
$kelembaban = $_GET['kelembaban'];

$content = "diterima suhu".$suhu."dan".$kelembaban."kelembaban";
$status = file_put_contents('fileku.php', $content, FILE_APPEND);

if($status != false)
{
	echo "sukses";
}else{
	echo "gagal";
}
?>