<?php 
include 'includes/head.php';
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php 
    $errorMessage = '';
    if(isset($_POST['btnRegister'])){
        $uphone = trim($_POST['user_phone']);
        $uname  = strtoupper(trim($_POST['user_name']));
        $outlet_name = strtoupper(trim($_POST['outlet_name']));
        $upass = $uphone;
        $db_name = 'mstock_'.$uphone;

        $sql = <<<SQL
        INSERT INTO `shops`(`name`,`db`,`phone`) 
        VALUES(?,?,?)
SQL;

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('sss',$outlet_name,$db_name,$uphone);
            $stmt->execute(); 
            $shop_id = $stmt->insert_id;
           
        } 
        if($shop_id){
            $sql = <<<SQL
            UPDATE `users` SET `phone`=CONCAT(`phone`,'_',`id`)
            WHERE `phone`=?
SQL;
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('s',$uphone);
                $stmt->execute(); 
                $user_id = $stmt->insert_id;
            } 
             
            $sql = <<<SQL
            INSERT INTO `users`(`phone`,`name`,`pass`,`shop_id`,`privs_id`,`role_id`) 
            VALUES(?,?,SHA2(?,256),?,1,1)
SQL;
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('sssi',$uphone,$uname,$upass,$shop_id);
                $stmt->execute(); 
                $user_id = $stmt->insert_id;
            }  
            $sql = <<<SQL
            INSERT INTO `licences`(`shop_id`,`start`,`days`,`key`) 
            VALUES(?,NOW(),30,SHA2(NOW(),256))
SQL;
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('i',$shop_id);
                $stmt->execute(); 
                $licence_id = $stmt->insert_id;
            }  
        }
        if($user_id){
            $sql = <<<SQL
            CREATE DATABASE IF NOT EXISTS $db_name
SQL;
            if ($stmt = $mysqli->prepare($sql)) {
                //$stmt->bind_param('s',$db_name);
                $stmt->execute(); 
                $stmt->close();
            }  
            //import master database
            $mysqli->close();
            include 'import.php'; 

            $_SESSION['mSTOCK_UID']       = $user_id;
            $_SESSION['mSTOCK_NAME']     = ucwords(strtolower($uname));
            $_SESSION['mSTOCK_PHONE']    = strtolower($uphone);
            $_SESSION['mSTOCK_SHOPID']    = $shop_id;
            $_SESSION['mSTOCK_ROLEID']  = 1;   
            $_SESSION['mSTOCK_SHOPNAME']  = strtoupper($outlet_name);   
            $_SESSION['mSTOCK_DBNAME'] = $db_name; 
            $_SESSION['mSTOCK_PHONE']    = $uphone;
            $_SESSION['mSTOCK_PASS']  = $upass;   
            $_SESSION['mSTOCK_EXPIRES'] = 30;
			
			$sql = <<<SQL
            UPDATE `shops` SET `last_accessed`=NOW() WHERE `id`=?
SQL;
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('i',$shop_id);
                $stmt->execute(); 
                $login_id = $stmt->insert_id;
            }  
            
            header("Location: home.php"); 
        }
    } 
    include 'get/register-form.php';
    include 'includes/scripts.php';
    ?>
</body>

</html>
