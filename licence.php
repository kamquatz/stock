<?php 
include 'includes/head.php';
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php 
    $errorMessage = '';
    if(isset($_POST['btnLicence'])){
        $licence = trim($_POST['licence']);
        
        if ($licence == '') {      
            $errorMessage = "Invalid Licence Key!";
            header("Location: login.php");                
        } else {
            //INSERT INTO `licences` VALUES (NULL,UPPER(MD5(NOW())),NOW()+90,1,NOW(),NULL,NULL);
            $count = 0;
            $sql = <<<SQL
            SELECT l.`id`,l.`key`,l.`expiry`
            FROM `licences` l
            WHERE l.`key`=?;
SQL;

            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('s',$licence);
                $stmt->execute(); 
                $stmt->bind_result($id,$key,$expiry);
                while ($stmt->fetch()) {
                    $count++;
                }
                $stmt->close();
            }  
            if($count>0){
                header("Location: register.php?l_id=".$id);                 
            }else{
                $errorMessage = 'Invalid Licence Key!<br /> Please Contact Administrator.';
            }
        }
    } 


    include 'get/licence-form.php';
    include 'includes/scripts.php';
    ?>
</body>

</html>