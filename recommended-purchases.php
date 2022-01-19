<?php  
  include 'includes/head.php';
  $purchases = 'active';
  $title = 'Purchases';
?>
  <body>  
    <div class="site-wrap">

<?php  
  include 'includes/mobile-menu.php'; 
  include 'includes/sidebar.php'; 
  
  if(isset($_POST['reset'])){
        $sql = <<<SQL
        UPDATE `optimal_stock` os
		LEFT JOIN `stock` s ON s.`item_id`=os.`item_id` AND s.`date`=CURDATE()
		SET os.`optimal`=(s.`opening`+s.`purchases`)
SQL;

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();            
        } 
  }
		
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
        <div id="my-container" class="container">
        <div class="row">
            <div class="col-12"> 
                <table class="table table-bordered" style="font-size:10px; color:whitesmoke;">
                    <thead>
                    <tr style="height: 60px">
                        <th colspan="3" class="verticalTableHeader">ITEM</th>
                        <th class="verticalTableHeader" style="padding-left:0;">OPTIMAL<br/>STOCK</th>
                        <th class="verticalTableHeader" style="padding-left:0;">CURRENT<br/>STOCK</th>
                        <th class="verticalTableHeader">TO<br/>PURCHASE</th>
                    </tr>
                    </thead>
                        <tbody>
<?php
    $sql = <<<SQL
        SELECT i.`name`,os.`optimal`,(s.`opening`+s.`purchases`) current,os.`optimal`-(s.`opening`+s.`purchases`) recommended,i.`buying_price`
        FROM `optimal_stock` os
        JOIN `items` i ON os.`item_id`=i.`id`
        LEFT JOIN `stock` s ON s.`item_id`=os.`item_id` AND s.`date`=CURDATE()
        ORDER BY recommended DESC,i.`name` ASC
SQL;

        $total = 0;
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->execute();
        //# item_id, name, optimal, (s.`opening`+s.`purchases`)
        $stmt->bind_result($item_name,$optimal,$current,$recommended,$buying_price);
        while ($stmt->fetch()) { 
            if($recommended>0){
                $total += ($buying_price*$recommended);
        ?>
                        <tr>
                            <td colspan="3" class="text-left"><?php echo strtoupper($item_name); ?></td>
                            <td><?php echo number_format($optimal);?></td>
                            <td><?php echo number_format($current); ?></td>
                            <td><b><?php echo number_format($recommended); ?></b></td>
                        </tr>
      <?php }
        }
      $stmt->close();
    }
?>
                    </tbody>
                    <tr>
                        <td colspan="4" class="text-left">TOTAL SUPPLIER COST OF RECOMMENDED PURCHASES</td>
                        <td colspan="2"><?php echo number_format($total); ?></td>
                    </tr>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
			<div class="col-12">
				<form action="" method="POST">			  
				   <input class="btn btn-danger btn-block" type="submit" name="reset" value="Reset All" />
				</form>    
			</div>
            </div>        
        </div>
    </div>
    
<?php  include 'includes/footer.php'; ?>
  </div>

  </body>
<?php  include 'includes/scripts.php'; ?>

</html>
