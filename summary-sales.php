<div class="row">
            <div class="col-12"> 
              SALES
                <table class="table table-bordered" style="font-size:10px; color:whitesmoke;">
                  <thead>
                    <tr>
                      <th>CATEGORY</th>
                      <th>STOCK</th>
                      <th>SALES</th>
                      <th>BUYING PRICE</th>
                      <th>PROFIT</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
          $sql = <<<SQL
          SELECT `id`,`name`
          FROM `item_categories`;
SQL;
$gross_stock = $gross_bp = $gross_sales = $gross_profit = 0;
    if ($stmt = $mysqli->prepare($sql)) {
      $stmt->execute();
      $stmt->bind_result($category_id,$name);
      while ($stmt->fetch()) { 
          $date = date("Y-m-d",strtotime("-1 days"));
          include 'get/category-sales.php';
      }
      $stmt->close();
    }
    ?>
                      <tr>
                      <th><u>TOTALS</u></th>
                      <th><u><?php echo number_format($gross_stock); ?></u></th>
                      <th><u><?php echo number_format($gross_sales); ?></u></th>
                      <th><u><?php echo number_format($gross_bp); ?></u></th>
                      <th><u><?php echo number_format($gross_profit); ?></u></th>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
<?php include 'get/summary-breakdown.php'; ?>

<?php include 'get/chart.php'; ?>