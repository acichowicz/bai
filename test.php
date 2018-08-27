<?php

require __DIR__ . '/vendor/autoload.php';

use App\Model\ConfigClass;
use App\Model\PersonAbstract;
use App\Model\MichalPalys;
use App\Model\MyMailerClass;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$mp = new MichalPalys();

$mp->getCounter();
$mp->getCounter();
$mp->getCounter();
$mp->getCounter();

$mp->getCounter();


$myMailer = new MyMailerClass(ConfigClass::getConfig(), $mp);

$myMailer->sendEmail();

$mp->saveData('data');

if (file_exists('data/MichalPalys.counter.txt')) {
	$fileContentArray = file('data/MichalPalys.counter.txt');
	foreach ($fileContentArray as $line) {
		echo $line;
	}
} else {
	echo "<p> error </p>";
}

$dns = 'mysql:dbname=bai;host=localhost';
$pdo = new PDO($dns, 'dev', 'dev');

var_dump($pdo);

$msql = new mysqli('localhost', 'dev', 'dev', 'bai');

var_dump($msql);