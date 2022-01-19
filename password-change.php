<?php 
include 'includes/head.php';
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php     
    $errorMessage = '';
    if(isset($_POST['btnChangePwd'])){
        $npass = trim($_POST['new_pass']);
        $upass  = trim($_POST['old_pass']);
        
        if ($upass == '' OR $npass == '') {      
            $errorMessage = "Invalid Old and New Password!";
            header("Location: login.php");                
        } else {
            $count = 0;
            $sql = <<<SQL
            UPDATE `users` 
            SET `pass`=SHA2(?,256)
            WHERE `id`=? AND `pass`=SHA2(?,256);
SQL;

            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param('sss',$npass,$_SESSION['mSTOCK_UID'],$upass);
                $stmt->execute(); 
                $stmt->close();
            }  
            ?>
            <script> 
                alert('Your Password has been change successfully\nPlease Login using your Phone No. and New password!');       
                window.location.href = "logout.php";
            </script>
        <?php
        }
    } 


    include 'get/password-change-form.php';
    include 'includes/scripts.php';
    ?>
</body>

</html>