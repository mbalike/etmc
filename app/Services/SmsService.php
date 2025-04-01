<?php
namespace App\Services;

use AfricaStalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Log;

class SmsService
{
    protected $sms;

    public function __construct()
    {
        $AT = new AfricasTalking(env('AFRICASTALKING_USERNAME'), env('AFRICASTALKING_API_KEY'));
        $this->sms = $AT->sms();
    }

    public function sendSms($recipients, $message)
    {
        return $this->sms->send([
            'to' => $recipients,
            'message' => $message,
        ]);
    }
}

