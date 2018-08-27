<?php

require __DIR__ . '/vendor/autoload.php';

use App\Model\ValidationModel;
use App\Model\UserClass;

session_start();

$user_array = $_REQUEST;

$name = $user_array['name'];
$surname = $user_array['surname'];
$email = $user_array['email'];
$MD5_email = md5($email);
$pass = $user_array['pass'];
$pass2 = $user_array['pass2'];
$dir = 'data';

$_SESSION['regName'] = $name;
$_SESSION['regSurname'] = $surname;
$_SESSION['regEmail'] = $email;

$user = new UserClass($name, $surname, $email, $pass, $pass2);

$isValid = $user->register();

$errors = $user->getErrors();

$_SESSION['e_imie'] = $errors['empty_imie'];
$_SESSION['e_nazwisko'] = $errors['empty_nazwisko'];
$_SESSION['e_email'] = $errors['invalid_email'];
$_SESSION['e_invalid_pass'] = $errors['invalid_pass'];
$_SESSION['e_diffrent_pass'] = $errors['diffrent_pass'];
$_SESSION['e_user_exist'] = $errors['user_exist'];

if ($isValid) {
	header("Location: register.php?register=true");
} else {
	header("Location: register.php");
}

// $nameHasSpaces = ValidationModel::hasSpaces($name);
// $surnameHasSpaces = ValidationModel::hasSpaces($surname);

// if ($nameHasSpaces || $surnameHasSpaces) {
// 	header("Location: register.php?spaces=true");
// 	exit();
// }

// if ($pass != '' && $pass == $pass2) {
// 	$SHA1_pass = sha1($pass);
// 	$array_data = explode(" ", "$name $surname $email $SHA1_pass");

// 	if (!is_dir($dir)) {
//     	mkdir($dir);
// 	}

// 	if (!file_exists($dir . DIRECTORY_SEPARATOR . $MD5_email)) {
// 		file_put_contents($dir . DIRECTORY_SEPARATOR . $MD5_email, serialize($array_data));
// 		session_destroy();
// 		header("Location: register.php?user=false");
// 		exit();
// 	} else {
// 		/* echo "Użytkownik istnieje. Dane zostały zaktualizowane.</br>"; */
// 		file_put_contents($dir . DIRECTORY_SEPARATOR . $MD5_email, serialize($array_data));
// 		$data = file_get_contents($dir . DIRECTORY_SEPARATOR . $MD5_email);
// 		session_destroy();
// 		header("Location: register.php?user=true");
// 		exit();
// 	}

// 	var_dump($_SESSION);
// } else {
// 	header("Location: register.php?pass2=false");
// }