<?php
require __DIR__ . '/vendor/autoload.php';

if (isset($_GET['hash'])) {
	$msql = new \mysqli('localhost', 'dev', 'dev', 'bai');

	$hash = $_GET['hash'];
	$result = $msql->query("SELECT active_string FROM users WHERE active_string='$hash'");

	$mail_count = $result->num_rows;

	if ($mail_count > 0) {
		$result->close();

		$update = "UPDATE users SET is_active = '1' WHERE active_string = '$hash'";	
		mysqli_query($msql, $update);
		mysqli_close($msql);

		header("Location: register.php?active=true");
		exit();
	}

	header("Location: register.php?active=false");
} else {
	header("Location: register.php");
}