 <script type="text/javascript" >
   $(document).ready(function(){
      $('.suhu').load('suhu.php');
      refresh();
     
    });
    function refresh()
    {
      setTimeout(function(){
        $('.suhu').fadeOut('slow').load('suhu.php').fadeIn('slow');
        refresh();
      }, 3000);
    }
  </script>
 