<?php  
  include 'includes/head.php';
  $money_out = 'active';
  $title = 'Expenses';
  if (isset($_REQUEST["category"])) { $category_id = $_REQUEST["category"]; } else{ $category_id = 1;}
?>
  <body>  
  <div class="site-wrap">

<?php  
  include 'includes/mobile-menu.php'; 
  include 'includes/sidebar5.php'; 
  $money_category = 'OUT';
?>    

<div class="py-5 quick-contact-info">
      <br />  <br /> 
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
        $.get("get/money-out.php",
          {
            date: document.getElementById("q-date").value,
            user_id: localStorage.getItem('1bcb607b3c39d0f2d566b162f408317a'),
            shop_id: localStorage.getItem('d93f14232df2dfe1d12c17faaa1ac647')
          },
          function(data,status){
            document.getElementById("my-container").innerHTML = data;
          });
      }
        function updateMonies(id) {
          var oAmt = parseFloat(document.getElementById("o-amt-"+id).value);
          var amt = parseFloat(document.getElementById("amt-"+id).value);
          var oldTotal = parseFloat(document.getElementById("total").innerHTML.replace(',',''));

          if (isNaN(amt)||document.getElementById("amt-"+id).value.trim()=='') amt = 0;
          if (isNaN(oAmt)||document.getElementById("o-amt-"+id).value.trim()=='') oAmt = 0;
          var newTotal = oldTotal+amt-oAmt;
          document.getElementById("amt-"+id).value = amt;
          document.getElementById("o-amt-"+id).value = amt;
          document.getElementById("total").innerHTML = newTotal.toLocaleString();
        }

        function postData(id){
        var amt = parseFloat(document.getElementById("amt-"+id).value);
        var name = document.getElementById("name-"+id).innerHTML;
        
          $.post("post/post-monies.php",
          {
            date: document.getElementById("q-date").value,
            category_id: id,
            amount: amt,
            user_id: localStorage.getItem('1bcb607b3c39d0f2d566b162f408317a'),
            shop_id: localStorage.getItem('d93f14232df2dfe1d12c17faaa1ac647')
          },
          function(data,status){
            toastr.success(name+'\nSuccessfully Updated');
          });
        }
      </script>
</html>
