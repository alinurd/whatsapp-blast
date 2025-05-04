<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Responapi;
use Illuminate\Http\Request;

class RespondapiController extends Controller
{
    public function index()
    {
        return response()->json(Responapi::all());
    }

    public function store(Request $request)
    {
       

        dd($request);
    }

    public function show($id)
    {
        $Responapi = Responapi::find($id);
        if (!$Responapi) {
            return response()->json(['message' => 'Responapi tidak ditemukan'], 404);
        }
        return response()->json($Responapi);
    }

    public function update(Request $request, $id)
    {
        $Responapi = Responapi::find($id);
        if (!$Responapi) {
            return response()->json(['message' => 'Responapi tidak ditemukan'], 404);
        }

        $Responapi->update($request->all());

        return response()->json($Responapi);
    }

    public function destroy($id)
    {
        $Responapi = Responapi::find($id);
        if (!$Responapi) {
            return response()->json(['message' => 'Responapi tidak ditemukan'], 404);
        }

        $Responapi->delete();
        return response()->json(['message' => 'Responapi berhasil dihapus']);
    }
}
