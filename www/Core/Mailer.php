<?php

namespace App\Core;


require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';



class Mailer
{


    private $mail;


    private function __construct()
    {
        //Instantiation and passing `true` enables exceptions
        $this->mail = new PHPMailer(true);
    }


    public function sendMail()
    {


        try {
            //Server settings
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mail->isSMTP();
            $this->mail->Host       = 'smtp.example.com';
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = 'user@example.com';
            $this->mail->Password   = 'secret';
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $this->mail->Port       = 465;

            //Recipients
            $this->mail->setFrom('from@example.com', 'Mailer');
            $this->mail->addAddress('joe@example.net', 'Joe User');
            $this->mail->addAddress('ellen@example.com');

            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Here is the subject';
            $this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';

            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}