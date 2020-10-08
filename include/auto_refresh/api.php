<?php
include "../../include/koneksi.php";

 
$filename = "https://api.thingspeak.com/channels/1018506/feeds.json?results=1";
$data = file_get_contents($filename);
$array = json_decode($data, true);
foreach ($array['feeds'] as $row) {
	$date = $row['created_at'];
	$suhu = $row['field1'];
  $kelembaban = $row['field2'];
  $berat = $row['field3'];
  $status = $row['field4'];
  
  $cekDate = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM data_sensor WHERE tanggal='$date'"));

  $cekBerat = mysqli_query($connection,"SELECT * FROM data_sensor ORDER by id DESC LIMIT 1");
	$nilaiBerat = mysqli_fetch_array($cekBerat);
	$nilaiCekBerat = $nilaiBerat['berat'];
  $nilaiCekSuhu = $nilaiBerat['suhu'];
  $nilaiCekStatus = $nilaiBerat['status'];
  $nilaiCekKelembaban = $nilaiBerat['kelembaban'];
    if ($cekDate > 0){

    }else if($nilaiCekBerat == $berat && $nilaiCekSuhu == $suhu && $nilaiCekKelembaban == $kelembaban && $nilaiCekStatus == $status){

    }else {
		if($nilaiCekStatus == 2 && $status == 2){
     $sql1 = "INSERT INTO data_sensor(id_history, tanggal, entry_id, suhu,kelembaban, berat, status) VALUES ('0','".$row["created_at"]."','".  $row["entry_id"]."','".$row["field1"]."','".$row["field2"]."','".$row["field3"]."','".$row["field4"]."')";
       mysqli_query($connection, $sql1); 
     }else if($nilaiCekStatus == 2 && $status == 1){
		  $sql = mysqli_query($connection,"SELECT * FROM data_sensor ORDER BY id_history DESC LIMIT 1");
  	  $arrayID = mysqli_fetch_array($sql);
		  $id_history = $arrayID['id_history']; 
  		$tambahID = $id_history + 1;
  		$sql2 = "INSERT INTO data_sensor(id_history, tanggal, entry_id, suhu, kelembaban, berat, status) VALUES ('$tambahID','".$row["created_at"]."','".$row["entry_id"]."','".$row["field1"]."','".$row["field2"]."','".$row["field3"]."','".$row["field4"]."')";
    	 mysqli_query($connection, $sql2);
   		}else if($nilaiCekStatus == 1 && $status == 1){
   		$sql3 = "INSERT INTO data_sensor(id_history, tanggal, entry_id, suhu, kelembaban, berat, status) VALUES ('0','".$row["created_at"]."','".  $row["entry_id"]."','".$row["field1"]."','".$row["field2"]."','".$row["field3"]."','".$row["field4"]."')";
    	 mysqli_query($connection, $sql3);
   		}else if($nilaiCekStatus == 1 && $status == 2){
      $sql3 = "INSERT INTO data_sensor(id_history, tanggal, entry_id, suhu, kelembaban, berat, status) VALUES ('0','".$row["created_at"]."','".  $row["entry_id"]."','".$row["field1"]."','".$row["field2"]."','".$row["field3"]."','".$row["field4"]."')";
       mysqli_query($connection, $sql3);
      }
   	}
	}

echo $suhu;
?>

