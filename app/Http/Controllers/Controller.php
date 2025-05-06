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
use App\Models\LogMsg;
use Illuminate\Support\Facades\Log;

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

    public function sendMassage1($to, $msg, $code)
    {
        $BASE_URL = 'https://api.nusasms.com/nusasms_api/1.0/whatsapp/media';
        $BASE_TEST_URL = 'https://dev.nusasms.com/nusasms_api/1.0/whatsapp/media';

        $curl = curl_init();

        $media_path = public_path('images/icons/header.jpg');

        $curl = curl_init();

        $payload = json_encode([
            'caption' => $msg,
            'destination' => $to,
            'media_url' => 'https://zis-alhasanah.com/public/invoice/invoice_' . $code . '.pdf', 
            'include_unsubscribe' => false,
        ]);

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $BASE_URL,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "APIKey: 33DF7E9D96A13B5DB75FB01BAB6DE458",
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS => $payload,
        ]);

        $resp = curl_exec($curl);

        if (!$resp) {
            die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        } else {
            echo $resp;
        }
    }

    public function sendMassage2($to, $msg, $code = "")
    {
        $BASE_URL = 'https://api.nusasms.com/nusasms_api/1.0/whatsapp/message';

        $curl = curl_init();

        $payload = json_encode([
            'destination' => $to,
            'message' => $msg,
            'include_unsubscribe' => false,
        ]);

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $BASE_URL,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "APIKey: " . env('NUSASMS_API_KEY'),
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS => $payload,
        ]);

        $resp = curl_exec($curl);

        if (!$resp) {
            Log::error('Gagal kirim ke ' . $to . ': ' . curl_error($curl));
            curl_close($curl);
            return null;
        }

        curl_close($curl);

        $r = json_decode($resp);

        if (isset($r->data)) {
            $p = $r->data;

            // Simpan ke database
            $kategori = new LogMsg();
            $kategori->ref_no = $p->ref_no ?? null;
            $kategori->sender = $p->sender ?? null;
            $kategori->queue = $p->queue ?? null;
            $kategori->destination = $p->destination ?? null;
            $kategori->message = $p->message ?? null;
            $kategori->save();

            return $p;
        }

        return null;
    }
 
    public function getBalance()
    {
        $BASE_URL = env('NUSASMS_API').'/1.0/balance';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $BASE_URL,
            CURLOPT_HTTPHEADER => array(
                "APIKey: " . env('NUSASMS_API_KEY'),
                'Accept: application/json',
                'Content-Type: application/json'
            ),
            CURLOPT_RETURNTRANSFER => 1,
            // CURLOPT_SSL_VERIFYPEER => 0,    // Skip SSL Verification
        ));

        $resp = curl_exec($curl);
        return $resp;
    }


    public function getStsApi($ref)
{
    $BASE_URL = 'https://api.nusasms.com/nusasms_api/1.0/whatsapp/status';

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $BASE_URL . '/' . $ref,
        CURLOPT_HTTPHEADER => array(
            "APIKey: 33DF7E9D96A13B5DB75FB01BAB6DE458",
            'Content-Type:application/json'
        ),
        CURLOPT_RETURNTRANSFER => 1,
    ));

    $resp = curl_exec($curl);
    curl_close($curl);

    $r = json_decode($resp);

    if (isset($r->data)) {
        $p = $r->data;

         $log = LogMsg::where('ref_no', $p->ref_no)->first();

        if ($log) {
            $log->sender = $p->sender ?? null;
            $log->destination = $p->destination ?? null;
            $log->sent_date = $p->sent_date ?? null;
            $log->read_date = $p->read_date ?? null;
            $log->delivered_date = $p->delivered_date ?? null;
            $log->status = $p->status ?? null;
            $log->message = $p->message ?? null;
            $log->caption = $p->caption ?? null;
            $log->media_url = $p->media_url ?? null;
            $log->save(); // Gunakan save() bukan update()
        }

        return $p;
    }

    return null;
}



}
