<?php

require_once 'person.abstract.php';
require_once 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


class KrzysztofChru extends Person  {
    protected $firstName = "Krzysztof";
    protected $lastName = "Chrusciel";
    protected $count = 0;
    
    protected $addr;
    protected $pass;
    
    function __construct($a = null, $p = null){
        $this ->addr = $a;
        $this->pass = $p;
    }
    
    function sendEmail() {
        $mail = new PHPMailer(true);  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587; 
        $mail->CharSet = 'UTF-8';
	$mail->Username = $this->addr;  
	$mail->Password = $this->pass;            
	$mail->SetFrom("chrusciel.krzysztof@gmail.com", "Krzysztof");
	$mail->Subject = "tytuł";
	$mail->Body = "Hej! To mój skrypt. {$this->firstName} {$this->lastName}. Test polskich znaków: ąężźćńó";
	$mail->AddAddress("olek+bai@cichowicz.eu");
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo;
                echo $error;
                echo '</br>';
		return false;
	} else {
		$error = 'Message sent!';
                echo $error;
                echo '</br>';
		return true;
	}
}
    

}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

