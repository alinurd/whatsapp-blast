<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Infobip\Configuration;
use Infobip\Api\WhatsAppApi;
use Infobip\Model\WhatsAppTextContent;
use Infobip\Model\WhatsAppTextMessage;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateCode($param)
    {
        $ran = Str::random(6);
        $code = $param . "-" . $ran . "-" . date("Y");
        return $code;
    }
    public function generateCodeById($param, $id)
    {
        $ran = Str::random(6);
        $code = $param . "-" . $ran . "-" . date("dmy") . "-000" . $id;
        return $code;
    }

    protected function sendWa($no,$nama)
    { 
        $response = Http::withHeaders([
            'Authorization' => 'App b42be3006183b810feb31c0cc4162822-997e6839-9163-4293-b012-8e9834e6264f',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post('https://qymz4m.api.infobip.com/whatsapp/1/message/template', [
            'messages' => [
                [
                    'from' => '447860099299',
                    'to' => $no,
                    'messageId' => '9fefd9d6-781f-4de6-ab86-cb68502110b6',
                    'content' => [
                        'templateName' => 'order_confirmation',
                        'templateData' => [
                            'body' => [
                                'placeholders' => $nama
                            ]
                        ],
                        'language' => 'en'
                    ]
                ]
            ]
        ]);
    
        if ($response->successful()) {
            echo $response->body();
        } else {
            echo 'Unexpected HTTP status: ' . $response->status() . ' ' . $response->body();
        }
    }
    
    public function sendNotif()
    {
        $whatsAppApi = new WhatsAppApi(config: $configuration);

        $key = 'b42be3006183b810feb31c0cc4162822-997e6839-9163-4293-b012-8e9834e6264f';
        $base_url = 'qymz4m.api.infobip.com';
        $configuration = new Configuration(
            host: $base_url,
            apiKey: $key
        );

        $textMessage = new WhatsAppTextMessage(
            from: '447860099299',
            to: 625817069096,
            content: new WhatsAppTextContent(
                text: 'This is my first WhatsApp message sent using Infobip API client library'
            )
        );

        $whatsAppApi = new WhatsAppApi(config: $configuration);

        $messageInfo = $whatsAppApi->sendWhatsAppTextMessage($textMessage);
        dd($messageInfo);
    }
}
