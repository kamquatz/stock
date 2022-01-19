<?php 
session_start();

// 1. unset the session
unset( $_SESSION['mSTOCK_UID'] );
unset( $_SESSION['mSTOCK_NAME'] );
unset( $_SESSION['mSTOCK_EMAIL'] );
unset( $_SESSION['mSTOCK_SHOPID'] );
unset( $_SESSION['mSTOCK_PRIVID'] );
unset( $_SESSION['mSTOCK_ROLEID'] );
unset( $_SESSION['mSTOCK_SHOPNAME'] );
unset( $_SESSION['mSTOCK_LOCATION'] );
unset( $_SESSION['mSTOCK_SHOPPHONE'] );
unset( $_SESSION['mSTOCK_SHOPEMAIL'] );
unset( $_SESSION['mSTOCK_SHOPPIN'] );
unset( $_SESSION['mSTOCK_DBNAME'] );

// session_destroy();
header("Location: login.php"); 
exit();

?>