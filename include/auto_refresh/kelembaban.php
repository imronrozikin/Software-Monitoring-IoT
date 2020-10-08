<?php
include "../../include/koneksi.php";

 $query = "SELECT * FROM data_sensor order by id desc limit 1";
 $sql = mysqli_query($connection, $query);
 $data = mysqli_fetch_array($sql);

echo $data['kelembaban'];

?>

