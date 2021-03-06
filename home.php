<?php  
  include 'includes/head.php';
  $home = 'active';
  $title = 'Take Stock';
  if (isset($_REQUEST["category"])) { $category_id = $_REQUEST["category"]; } else{ $category_id = 1;}
?>
  <body>  
  <div class="site-wrap">

<?php  
  include 'includes/mobile-menu.php'; 
  $hour = (int) date('H');  
  include 'includes/sidebar5.php';

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
      <br />  <br /> 
      <div id="my-container" class="container"></div>
    </div>
    
<?php  include 'includes/footer.php'; ?>
  </div>

  </body>
<?php  include 'includes/scripts.php'; ?>
<script>
  localStorage.setItem('mSTOCK_PHONE', '<?php echo $_SESSION['mSTOCK_PHONE'];?>');  
  localStorage.setItem('mSTOCK_PASS', '<?php echo $_SESSION['mSTOCK_PASS'];?>');
  
  FilterByDate();
  function FilterByDate(){
	  document.getElementById("my-container").innerHTML = '<div class="imgbox"><img class="center-fit" src="images/loading.gif" rel="loading.gif"></div>';
    $.get("get/morning.php",
      {
        date: document.getElementById("q-date").value,
        user_id: localStorage.getItem('1bcb607b3c39d0f2d566b162f408317a'),
        shop_id: localStorage.getItem('d93f14232df2dfe1d12c17faaa1ac647'),
        category_id: <?php echo $category_id; ?>
      },
      function(data,status){
        document.getElementById("my-container").innerHTML = data;
        //alert("Data: " + data + "\nStatus: " + status);
      });
  }
  
  function calculateTtl(id) {
          var opening = parseFloat(document.getElementById("opening-"+id).value);
          var purchases = parseFloat(document.getElementById("purchases-"+id).value);
          if (isNaN(opening)||document.getElementById("opening-"+id).value.trim()=='') opening = 0;
          if (isNaN(purchases)||document.getElementById("purchases-"+id).value.trim()=='') purchases = 0;
          document.getElementById("opening-"+id).value = opening;
          document.getElementById("purchases-"+id).value = purchases;
          document.getElementById("ttl-"+id).innerHTML = opening+purchases;
		  var name = document.getElementById("name-"+id).innerHTML;
          postData(id,opening,purchases,name);
        }

        function postData(itemId,opening,purchases,name){
          $.post("post/post-morning.php",
          {
            date: document.getElementById("q-date").value,
            item_id: itemId,
            opening: opening,
            purchases: purchases,
            user_id: localStorage.getItem('1bcb607b3c39d0f2d566b162f408317a'),
            shop_id: localStorage.getItem('d93f14232df2dfe1d12c17faaa1ac647')
          },
          function(data,status){
            toastr.success(name+'\nSuccessfully Updated');
          });
        }
</script>
</html>