<?php
if(!isset($_SESSION['mSTOCK_ISBACKUP'])){
	$today_backup = 'stock_backup_'.date("Ymd").'_'.$_SESSION['mSTOCK_UID'];
	$mysqli000 = new mysqli($db->host, $db->user, $db->pass, $db->name);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	$sql = <<<SQL
			CREATE TABLE IF NOT EXISTS $today_backup SELECT * FROM `stock`
SQL;
	if ($stmt = $mysqli000->prepare($sql)) {
	  $stmt->execute();
	  $stmt->close();
	}
	$mysqli000->close();
	$_SESSION['mSTOCK_ISBACKUP'] = true;
}
?>