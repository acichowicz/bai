<?php

require __DIR__ . '/vendor/autoload.php';

use App\Model\UserClass;
use App\Model\MysqliDbClass;
use App\Model\ConfigClass;

if (!isset($_POST['login']) && !isset($_POST['pass'])) {
	header("Location: login.php");
	exit();
}

session_start();

$user_array = $_REQUEST;

$login = $user_array['login'];
$pass = $user_array['pass'];

$_SESSION['regLogin'] = $login;

$db = new MysqliDbClass(ConfigClass::getDbConfig());

$user = new UserClass($db->mysqli, $login, $pass);

$isLoginValid = $user->isLogin();

$errors = $user->getErrors();

$_SESSION['e_incorret_login'] = $errors['incorret_login'];
$_SESSION['e_incorret_pass'] = $errors['incorret_pass'];
$_SESSION['e_unactive_account'] = $errors['unactive_account'];


if ($isLoginValid) {
	$_SESSION['cookieName'] = 'Token';
	$cookieValue = sha1(rand());
	setcookie($_SESSION['cookieName'], $cookieValue, time() + (900), "/");
	$_SESSION['user_data'] = $user->getUser();

	header("Location: main_cms.php");
} else {
	header("Location: login.php");
}