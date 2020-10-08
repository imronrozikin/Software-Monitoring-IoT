var auto_refresh = setInterval(
  function () {
  $('#kadar').load('../include/auto_refresh/kadarAir.php').fadeIn("slow");
   }, 1000);
            
    