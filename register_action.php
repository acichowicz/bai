<?php

require __DIR__ . '/vendor/autoload.php';

use App\Model\ValidationModel;
use App\Model\UserClass;
use App\Model\MysqliDbClass;
use App\Model\ConfigClass;

session_start();

$user_array = $_REQUEST;

$name = $user_array['name'];
$surname = $user_array['surname'];
$email = $user_array['email'];
$pass = $user_array['pass'];
$pass2 = $user_array['pass2'];

$_SESSION['regName'] = $name;
$_SESSION['regSurname'] = $surname;
$_SESSION['regEmail'] = $email;

$db = new MysqliDbClass(ConfigClass::getDbConfig());

$user = new UserClass($db->mysqli, $email, $pass, $pass2, $name, $surname);

$isValid = $user->register();

$errors = $user->getErrors();

$_SESSION['e_imie'] = $errors['empty_imie'];
$_SESSION['e_nazwisko'] = $errors['empty_nazwisko'];
$_SESSION['e_hasSpaces_imie'] = $errors['hasSpaces_imie'];
$_SESSION['e_hasSpaces_nazwisko'] = $errors['hasSpaces_nazwisko'];
$_SESSION['e_email'] = $errors['invalid_email'];
$_SESSION['e_invalid_pass'] = $errors['invalid_pass'];
$_SESSION['e_diffrent_pass'] = $errors['diffrent_pass'];
$_SESSION['e_user_exist'] = $errors['user_exist'];

if ($isValid) {
	session_destroy();
	header("Location: register.php?register=true");
} else {
	header("Location: register.php");
}