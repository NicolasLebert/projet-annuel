<?php

namespace App\Core;

use App\Core\Mailer;
use App\Core\SmsNotification;


interface Notification
{
    public function send(): void;
}


class Message implements Notification
{
    public function send(): void
    {
        echo "Envoyer une notification";
    }
}




class NotifDecorator implements Notification
{
    protected $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function send(): void
    {
        $this->notification->send();
    }
}




class Email extends NotifDecorator 
{
    public function send(): void
    {
        $mailer = new Mailer(true);
        $mailer->sendMail();
        echo "Une notification à été envoyer par email";
        parent::send();
    }
}




class SMS extends NotifDecorator
{
    public function send(): void
    {
        echo "Une notification à été envoyer par sms";
        $sendSms = new SmsNotification();
        $sendSms->sendSms();
        parent::send();
    }
}



$message = new Message();

$email = new Email($message);
$sms = new SMS($email);

$sms->send();