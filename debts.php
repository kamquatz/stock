<?php  
  include 'includes/head.php';
  $debts = 'active';
  $title = 'Debts';
  if (isset($_REQUEST["category"])) { $category_id = $_REQUEST["category"]; } else{ $category_id = 1;}
?>
  <body>  
  <div class="site-wrap">

<?php  
  include 'includes/mobile-menu.php'; 
  include 'includes/sidebar3.php'; 
?>    

    <div class="py-5 quick-contact-info">
      <br />  <br /> 
      <div class="container">
      <?php  
        include 'get/debts-categories.php'; 
        include 'get/history-debts.php'; 
      ?> 
        
      </div>
    </div>
    
<?php  include 'includes/footer.php'; ?>
  </div>

  </body>
<?php  include 'includes/scripts.php'; ?>
</html>