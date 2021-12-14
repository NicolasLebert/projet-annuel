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
    private $subject;
    private $body;
    private $recipent;


    private function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getBody()
    {
        return $this->body;
    }


    public static function sendActivationMail($user)
    {
        return (new self)->setBody('This is the body');
        return (new self)->setSubject('New user');
        return (new self)->sendMail($user->getMail(), $user->getId(), $user->getToken());
    }


    public function sendMail($mail, $id, $token)
    {

        $this->recipent = $mail;

        try {
            //Server settings
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mail->isSMTP();
            $this->mail->Host       = 'smtp.gmail.com';
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = 'flauz.dev@gmail.com';
            $this->mail->Password   = 'secret';
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $this->mail->Port       = 465;

            //Recipients
            $this->mail->setFrom('flauz.dev@gmail.com', 'Mailer');
            $this->mail->addAddress($this->recipent);

            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Here is the subject';
            $this->mail->Body    = 'http://localhost:8080/registerconfirm?id=' . $id . '&token=' . $token;

            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
