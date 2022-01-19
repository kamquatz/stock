<?php  
  include 'includes/head.php';
  $summary = 'active';
  $title = 'Summary';
  if (isset($_REQUEST["category"])) { $category_id = $_REQUEST["category"]; } else{ $category_id = 1;}
?>
  <body>  
    <div class="site-wrap">

<?php  
  include 'includes/mobile-menu.php'; 
  include 'includes/sidebar2.php'; 
?>    

      <div class="py-5 quick-contact-info">
        <br />  <br /> <style>
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
        <div id="my-container" class="container">  
        <?php // include 'get/summary-sales.php'; ?>          
        </div>
        <div id="my-container2" class="container">  
        <?php  include 'get/chart.php'; ?>          
        </div>
      </div>
    
<?php  include 'includes/footer.php'; ?>
  </div>

  </body>
<?php  include 'includes/scripts.php'; ?>


<script>
FilterByDate();
  function FilterByDate(){
    document.getElementById("my-container").innerHTML = '<div class="imgbox"><img class="center-fit" src="images/loading.gif" rel="loading.gif"></div>';
    $.get("get/summary-categories.php",{
        date: document.getElementById("q-date").value
      },
      function(data,status){
        document.getElementById("my-container").innerHTML = data;
      });
  }
</script>

<script src="js/canvasjs.min.js"></script>
</html>