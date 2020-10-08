var auto_refresh = setInterval(
  function () {
  $('#status').load('../include/auto_refresh/status.php').fadeIn("slow");
   }, 1000);
