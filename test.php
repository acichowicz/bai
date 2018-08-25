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

$myMailer = new MyMailerClass(ConfigClass::getConfig(), $mp);

$myMailer->sendEmail();

$mp->saveData();