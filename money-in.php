<?php  
  include 'includes/head.php';
  $money_in = 'active';
  $title = 'Counter';
  if (isset($_REQUEST["category"])) { $category_id = $_REQUEST["category"]; } else{ $category_id = 1;}
?>
  <body>  
  <div class="site-wrap">

<?php  
  include 'includes/mobile-menu.php'; 
  include 'includes/sidebar5.php'; 
  $money_category = 'IN';
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
        $.get("get/money-in.php",
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
          var closing = parseFloat(document.getElementById("closing-"+id).value);   
          var closingOld = parseFloat(document.getElementById("closing-old-"+id).value);   
          var oldTotal = parseFloat(document.getElementById("total_cash").innerHTML.replace(',',''));
          var exp = parseFloat(document.getElementById("exp").value);   

          if (isNaN(closing)||document.getElementById("closing-"+id).value.trim()=='') closing = 0;
          if (isNaN(closingOld)||document.getElementById("closing-old-"+id).value.trim()=='') closingOld = 0;
          var newTotal = oldTotal+closing-closingOld;
          var received = newTotal+exp;
          
          document.getElementById("closing-old-"+id).value = closing;
          document.getElementById("total_cash").innerHTML = newTotal.toLocaleString();
          document.getElementById("total_received").innerHTML = received.toLocaleString();
        }

        function postData(id){
        var amt = parseFloat(document.getElementById("closing-"+id).value);
        var name = document.getElementById("closing-name-"+id).innerHTML;
        
          $.post("post/post-monies.php",
          {
            date: document.getElementById("q-date").value,
            category_id: id,
            amount: amt,
            user_id: localStorage.getItem('1bcb607b3c39d0f2d566b162f408317a'),
            shop_id: localStorage.getItem('d93f14232df2dfe1d12c17faaa1ac647')
          },
          function(data,status){
            toastr.success(name + '\nSuccessfully Updated');
           // FilterByDate();
          });
        }
        
        function updatExp() {
          var exp = parseFloat(document.getElementById("exp").value);   
          var expOld = parseFloat(document.getElementById("exp-old").value);   
          var oldReceived = parseFloat(document.getElementById("total_received").innerHTML.replace(',',''));

          if (isNaN(exp)||document.getElementById("exp").value.trim()=='') exp = 0;
          if (isNaN(expOld)||document.getElementById("exp-old").value.trim()=='') expOld = 0;
          var received = oldReceived+exp-expOld;
          
          document.getElementById("exp-old").value = exp;
          document.getElementById("total_received").innerHTML = received.toLocaleString();
        }

        function postExp(){
          var amt = parseFloat(document.getElementById("exp").value);
        
          $.post("post/post-exps.php",
          {
            date: document.getElementById("q-date").value,
            amount: amt,
            user_id: localStorage.getItem('1bcb607b3c39d0f2d566b162f408317a'),
            shop_id: localStorage.getItem('d93f14232df2dfe1d12c17faaa1ac647')
          },
          function(data,status){
            toastr.success('Expenses\nSuccessfully Updated');
          });
        }
        
        function updateDebts(id) {
          var debt = parseFloat(document.getElementById("debt-"+id).value);   
          var debtOld = parseFloat(document.getElementById("debt-old-"+id).value);   

          if (isNaN(debt)||document.getElementById("debt-"+id).value.trim()=='') debt = 0;
          if (isNaN(debtOld)||document.getElementById("debt-old-"+id).value.trim()=='') debtOld = 0;
          
          document.getElementById("debt-old-"+id).value = debt;
        }

        function postDebts(id){
        var amt = parseFloat(document.getElementById("debt-"+id).value);
        var name = document.getElementById("debt-name-"+id).innerHTML;
        
          $.post("post/post-debts.php",
          {
            date: document.getElementById("q-date").value,
            category_id: id,
            amount: amt,
            user_id: localStorage.getItem('1bcb607b3c39d0f2d566b162f408317a'),
            shop_id: localStorage.getItem('d93f14232df2dfe1d12c17faaa1ac647')
          },
          function(data,status){
            toastr.success(name + '\nSuccessfully Updated');
           // FilterByDate();
          });
        }
        
      </script>
</html>