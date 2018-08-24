<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once 'person.abstract.php';
require_once 'config.php'; 


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

define('className', "KonradMaslowiec");

class KonradMaslowiec extends Person {

    protected $firstName = 'Konrad';
    protected $lastName = 'Maslowiec';
    protected $counter = 0;
    
    
    
}

function SendEmail(){

        $m = new PHPMailer;
        $p = new Config;
        $me = new KonradMaslowiec;


        $subject = 'Konrad Maslowiec PHPMailer';
        $text = "Hey! To mój skrypt. {$me->getFirstName()} {$me->getLastName()} Test polskich znaków ąężźćńó";
        $sendTo = 'olek+bai@cichowicz.eu';
        $sendToName = 'Aleksander Cichowicz';    
    
try{
$m->isSMTP();
$m->SMTPAuth = true;
$m->SMTPDebug = 2;

$m->Host = 'smtp.gmail.com';
$m->Username = 'kmaslowiec@gmail.com';
$m->Password = $p->getPass();
$m->SMTPSecure = 'ssl';
$m->Port = 465; 

$m->setFrom('kmaslowiec@gmail.com');
$m->fromName = 'Konrad';
// $m->addReplyTo('maslowiec@onet.pl', 'Reply address' ); 
//$m->addAddress('konradarvato@hotmail.com', 'Joe Dupa');
$m->addAddress($sendTo, $sendToName);


$m->Subject = $subject;
$m->Body = $text;
$m->AltBody = $text;

    $m->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
    
}

SendEmail();








/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

