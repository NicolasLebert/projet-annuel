<?php

namespace App\Core;



class SmsNotification{
  

    public function sendSms(): void{

        $basic  = new \Vonage\Client\Credentials\Basic("2293e178", "49LsKI975EEfHLmp");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("33687401489", BRAND_NAME, 'A text message sent using the Nexmo SMS API');
        $message = $this->response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

    
}