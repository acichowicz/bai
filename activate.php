<?php
require __DIR__ . '/vendor/autoload.php';

use App\Model\MysqliDbClass;
use App\Model\ConfigClass;

if (isset($_GET['hash'])) {
	$db = new MysqliDbClass(ConfigClass::getDbConfig());

	$hash = $_GET['hash'];
	$result = $db->mysqli->query("SELECT active_string FROM users WHERE active_string='$hash'");

	$mail_count = $result->num_rows;

	if ($mail_count > 0) {
		$result->close();

		$update = "UPDATE users SET is_active = '1' WHERE active_string = '$hash'";	
		mysqli_query($db->mysqli, $update);
		mysqli_close($db->mysqli);

		header("Location: login.php?active=true");
		exit();
	}

	header("Location: login.php?active=false");
} else {
	header("Location: register.php");
}