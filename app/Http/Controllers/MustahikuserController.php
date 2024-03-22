<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mustahik;
use App\Models\Kategori;
use App\Helpers\AuthHelper;
use App\Http\Requests\UserRequest;
 
class MustahikuserController extends Controller
{ 
    public function create()
    { 
        $ktg = Kategori::pluck('nama_kategori', 'id');

        return view('mustahikuser.form_tambah', compact('ktg'));
    }
}
