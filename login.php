<?php 
include 'includes/head.php';
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php 
    $errorMessage = '';
    if(isset($_POST['btnLogin'])){
        $uphone = trim($_POST['user_phone']);
        $upass  = trim($_POST['user_pass']);
        
        if ($uphone == '' OR $upass == '') {      
            $errorMessage = "Invalid Username and Password!";
            header("Location: login.php");                
        } else {
            $count = 0;
            $sql = <<<SQL
            SELECT u.`id`,u.`phone`,u.`email`,u.`name`,u.`shop_id`,u.`role_id`,
                s.`name`,s.`location`,s.`phone`,s.`email`,s.`kra_pin`,s.`db`,
                    DATEDIFF(DATE_ADD(l.`updated`, INTERVAL l.`days` DAY),NOW()) expires
            FROM `users` u
            JOIN `shops` s ON s.`id`=u.`shop_id`
                    JOIN `licences` l ON l.`shop_id`=s.`id`
            WHERE u.`phone`=? AND u.`pass`=SHA2(?,256) AND u.`status`=1;
SQL;

            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('ss',$uphone,$upass);
                $stmt->execute(); 
                $stmt->bind_result($user_id,$phone,$email,$name,$shop_id,$role_id,
                $shop_name,$location,$shop_phone,$shop_email,$shop_pin,$db,$expires);
                while ($stmt->fetch()) {
                    $count++;
                    $_SESSION['mSTOCK_UID']       = $user_id;
                    $_SESSION['mSTOCK_NAME']     = ucwords(strtolower($name));
                    $_SESSION['mSTOCK_EMAIL']    = strtolower($email);
                    $_SESSION['mSTOCK_PHONE']    = $uphone;
                    $_SESSION['mSTOCK_PASS']  = $upass;   
                    $_SESSION['mSTOCK_SHOPID']    = $shop_id;
                    $_SESSION['mSTOCK_ROLEID']  = $role_id;   
                    $_SESSION['mSTOCK_SHOPNAME']  = strtoupper($shop_name);   
                    $_SESSION['mSTOCK_LOCATION']  = strtoupper($location);   
                    $_SESSION['mSTOCK_SHOPPHONE']  = $shop_phone;   
                    $_SESSION['mSTOCK_SHOPEMAIL']  = $shop_email;   
                    $_SESSION['mSTOCK_SHOPPIN']  = $shop_pin;   
                    $_SESSION['mSTOCK_DBNAME'] = $db; //'stock'; // 
                    $_SESSION['mSTOCK_EXPIRES'] = $expires;
                    if($role_id==4){
                        $uri = 'reports';
                    }else{
                        $uri = 'home';
                    }
                }
                $stmt->close();
            }  
            if($count>0){ 
                if(isset($_GET['uri'])){
                    $uri = trim($_GET['uri']);
                }
				$sql = <<<SQL
            UPDATE `shops` SET `last_accessed`=NOW() WHERE `id`=?
SQL;
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('i',$shop_id);
                $stmt->execute(); 
                $login_id = $stmt->insert_id;
            }  
			
                header("Location: ".$uri); 
				
            }else{
                $errorMessage = 'Email and Password do not match or Account does not exist!<br /> Please Contact Administrator.';
            }
        }
    } 


    include 'get/login-form.php';
    include 'includes/scripts.php';
    ?>
</body>

</html>