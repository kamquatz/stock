<?php  
  include 'includes/head.php';
  $users = 'active';
  $title = 'Users';
?>
  <body>  
  <div class="site-wrap">

<?php  
  include 'includes/mobile-menu.php'; 
  $hour = (int) date('H');
  include 'includes/sidebar.php';
?>    

    <div class="py-5 quick-contact-info">
      <br />  <br /> 
      <div class="container">

<?php 
  //if($hour<5){  include 'get/night.php'; }
  //elseif($hour<12){  include 'get/morning.php'; }
  //else{ include 'get/evening.php'; }
  include 'get/pwd-form.php';
?>
      
      </div>
    </div>
    
<?php  include 'includes/footer.php'; ?>
  </div>

  </body>
<?php  include 'includes/scripts.php'; ?>
</html>