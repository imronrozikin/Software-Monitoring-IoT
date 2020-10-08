var auto_refresh = setInterval(
  function () {
  $('#statuskerupuk').load('../include/auto_refresh/status_kerupuk.php').fadeIn("slow");
   }, 1000);
