<?php
session_start();

setcookie($_SESSION['cookieName'], "", time() - (900), "/");

session_unset();
session_destroy();

header('Location: login.php');