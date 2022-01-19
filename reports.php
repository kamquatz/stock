<?php  
  include 'includes/head.php';
  $reports = 'active';
  $title = 'Sales Report';
  if (isset($_REQUEST["category"])) { $category_id = $_REQUEST["category"]; } else{ $category_id = 1;}
?>
  <body>  
    <div class="site-wrap">

<?php  
  include 'includes/mobile-menu.php'; 
  include 'includes/sidebar4.php'; 
?>    

      <div class="py-5 quick-contact-info">
        <br />  <br /> 
        <style>
        .imgbox {
			margin: 0;
			padding: 0;
            display: grid;
            height: 100%;
        }
        .center-fit {
			margin: 0;
			padding: 0;
            max-width: 100%;
            max-height: 100vh;
            margin: auto;
        }
    </style>
        <div id="my-container" class="container"></div>
    </div>
    
<?php  include 'includes/footer.php'; ?>
  </div>

  </body>
<?php  include 'includes/scripts.php'; ?>
<script>
FilterByDate();
  function FilterByDate(){
	  document.getElementById("my-container").innerHTML = '<div class="imgbox"><img class="center-fit" src="images/loading.gif" rel="loading.gif"></div>';
    $.get("get/stock-categories.php",
      {
        date: document.getElementById("q-date").value,
        user_id: localStorage.getItem('1bcb607b3c39d0f2d566b162f408317a'),
        shop_id: localStorage.getItem('d93f14232df2dfe1d12c17faaa1ac647')
      },
      function(data,status){
        document.getElementById("my-container").innerHTML = data;
        //alert("Data: " + data + "\nStatus: " + status);
      });
  }
</script>

</html>
