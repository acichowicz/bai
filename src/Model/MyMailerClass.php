<?php

namespace App\Model;

use App\Model\PersonAbstract;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class MyMailerClass
{
	public $person;
	public $config;
	
	function __construct(Array $config, PersonAbstract $person = null)
	{
		$this->person = $person;
		$this->config = $config;
	}

// array $config, string $firstName, string $lastName
	function sendEmail()
	{	
		$mail = new PHPMailer;
		$mail->setLanguage("pl");
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		
		//Set the hostname of the mail server
		$mail->Host = $this->config['host'];
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = $this->config['port'];
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication
		$mail->Username = $this->config['username'];
		//Password to use for SMTP authentication
		$mail->Password = $this->config['password'];
		
		$mail->CharSet = "UTF-8";
		//Set who the message is to be sent from
		$mail->setFrom($this->config['username'], 'Michał Pałys');
		
		//Set who the message is to be sent to olek+bai@cichowicz.eu
		$mail->addAddress('michael.palys@wp.pl');
		//Set the subject line
		$mail->Subject = "smtp sendMail test";
		//Replace the plain text body with one created manually
		$mail->MsgHTML("<p>Hej! To mój skrypt." . $this->person->getFirstName() . $this->person->getLastName() . "Test polskich znaków: ąężźćńó</p>");
		// $mail->Body = "Hej! To mój skrypt. $firstName $lastName . Test polskich znaków: ąężźćńó";

		//send the message, check for errors
		if (!$mail->send()) {
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message sent!';
		}
	}	
}