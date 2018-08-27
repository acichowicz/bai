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
	protected $phpMailer;
	protected $activeString;
	
	// function __construct(Array $config, PersonAbstract $person = null)
	// {
	// 	$this->person = $person;
	// 	$this->config = $config;
	// }

	function __construct(array $config, PHPMailer $phpMailer)
	{
		$this->phpMailer = $phpMailer;
		$this->config = $config;
	}

	public function getActiveString(): string
	{
		return $this->activeString;
	}

	public function setActiveString(string $str)
	{
		$this->activeString = $str;
	}

	function sendEmail()
	{	
		$this->phpMailer->setLanguage("pl");
		//Tell PHPMailer to use SMTP
		$this->phpMailer->isSMTP();
		
		//Set the hostname of the mail server
		$this->phpMailer->Host = $this->config['host'];
		//Set the SMTP port number - likely to be 25, 465 or 587
		$this->phpMailer->Port = $this->config['port'];
		//Whether to use SMTP authentication
		$this->phpMailer->SMTPAuth = true;
		//Username to use for SMTP authentication
		$this->phpMailer->Username = $this->config['username'];
		//Password to use for SMTP authentication
		$this->phpMailer->Password = $this->config['password'];
		
		$this->phpMailer->CharSet = "UTF-8";
		//Set who the message is to be sent from
		$this->phpMailer->setFrom($this->config['username'], 'Michał Pałys');
		
		//Set who the message is to be sent to olek+bai@cichowicz.eu
		$this->phpMailer->addAddress('michael.palys@wp.pl');
		//Set the subject line
		$this->phpMailer->Subject = "Mail aktywacyjny";
		//Replace the plain text body with one created manually

		$this->phpMailer->MsgHTML("<p>Link aktywacyjny: <a href='http://192.168.56.10/oop/bai/activate.php?hash=$this->activeString'>http://192.168.56.10/oop/bai/activate.php?hash=$this->activeString</a></p>");
		// $mail->Body = "Hej! To mój skrypt. $firstName $lastName . Test polskich znaków: ąężźćńó";

		//send the message, check for errors
		if (!$this->phpMailer->send()) {
		    echo 'Mailer Error: ' . $this->phpMailer->ErrorInfo;
		    die();
		} else {
		    echo 'Message sent!';
		}
	}	
}