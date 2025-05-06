<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LogMsg;
use App\Models\Responapi;
use Illuminate\Http\Request;

class RespondapiController extends Controller
{

    public function store(Request $request)
    {
        $p = new Responapi(); 
        $p->ref_no = $request->ref_no;
        $p->status = $request->status;
        $p->sent_date = $request->sent_date;
        $p->err_code = $request->err_code;
        $LogMsg = LogMsg::where('ref_no', $request->ref_no)->first();
        if ($LogMsg) {
            $LogMsg->update([
                'status' => $p->status,
                'updated_at' => $request->sent_date
            ]);
        }

        if ($p->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => $request->ref_no.'-'.$request->err_code
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data'
            ], 500); 
        }
    }
    

  
}
