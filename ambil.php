<?php
$date=date_create();
date_timestamp_get($date);
$time = date_format($date, "d:m:Y H:i:s");
echo $time;

?>