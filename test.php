<?php

require __DIR__ . '/vendor/autoload.php';

use App\Model\ConfigClass;
use App\Model\PersonAbstract;
use App\Model\MichalPalys;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';


function sendEmail(array $config, string $firstName, string $lastName)
{
	$mail = new PHPMailer;
	$mail->setLanguage("pl");
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	
	//Set the hostname of the mail server
	$mail->Host = $config['host'];
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = $config['port'];
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = $config['username'];
	//Password to use for SMTP authentication
	$mail->Password = $config['password'];
	
	$mail->CharSet = "UTF-8";
	//Set who the message is to be sent from
	$mail->setFrom($config['username'], 'Michał Pałys');
	
	//Set who the message is to be sent to
	$mail->addAddress('olek+bai@cichowicz.eu');
	//Set the subject line
	$mail->Subject = "smtp sendMail test";
	//Replace the plain text body with one created manually
	$mail->MsgHTML("<p>Hej! To mój skrypt. $firstName $lastName . Test polskich znaków: ąężźćńó</p>");
	// $mail->Body = "Hej! To mój skrypt. $firstName $lastName . Test polskich znaków: ąężźćńó";

	//send the message, check for errors
	if (!$mail->send()) {
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message sent!';
	}
}

echo var_dump(ConfigClass::getConfig());

$mp = new MichalPalys();

var_dump($mp->getFirstName());
var_dump($mp->getLastName());

$mp->getCounter();
$mp->getCounter();
$mp->getCounter();
$mp->getCounter();


$mp->saveData();

sendEmail(ConfigClass::getConfig(), $mp->getFirstName(), $mp->getLastName());

// echo $host . $port . $username . $password;