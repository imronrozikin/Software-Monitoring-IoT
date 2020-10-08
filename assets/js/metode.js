var auto_refresh = setInterval(
  function () {
  $('#metode').load('../include/auto_refresh/metode.php').fadeIn("slow");
   }, 1000);
