<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

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
        $code = $param . "-" . $ran . "-". date("dmy") ."-000".$id;
        return $code;
    }
}
