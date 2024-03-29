<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MustahikuserDataTable;
use App\Models\Mustahik;
use App\Models\Kategori;
use App\Helpers\AuthHelper;
use App\Http\Requests\UserRequest;
 
class MustahikuserController extends Controller
{ 
    public function index(MustahikuserDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('Pengajuan Mustahiq')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets'));
    }

    public function create()
    { 
        $ktg = Kategori::pluck('nama_kategori', 'id');

        return view('mustahikuser.form_tambah', compact('ktg'));
    }
  
    public function store(Request $request)
    {  
        // Validate the request data 
        $validatedData = $request->validate([  
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'no_phone' => 'required|string|max:255',
            'status_kawin' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255', 
            'pekerjaan' => 'required|string|max:255', 
            'jml_pendapatan' => 'required|array', 
            'jml_bansos' => 'nullable|array',
            'jml_anak' => 'required|string|max:255',  
            'status_tinggal' => 'required|string|max:255',
            'pengeluaran_kontrakan' => 'nullable|array',
            'pengeluaran_listrik' => 'nullable|array', 
            'jml_hutang' => 'nullable|array',
            'keperluan_hutang' => 'nullable|string|max:255',
            'rt_rw' => 'nullable|string|max:255',   
            'nama_wilayah' => 'nullable|max:255', 
            'status' => 'string|max:255',  
        ]);   
         
        // Create a new mustahik instance
        $mustahik = new Mustahik();
  
        // Mengambil nilai jml_beras dari request
        $jml_pendapatan = $request->input('jml_pendapatan');
        $jml_bansos = $request->input('jml_bansos');
        $pengeluaran_kontrakan = $request->input('pengeluaran_kontrakan');
        $pengeluaran_listrik = $request->input('pengeluaran_listrik');
        $jml_hutang = $request->input('jml_hutang');

        // Mengonversi array jml_beras menjadi string
        $jumlah_pendapatan = implode(', ', $jml_pendapatan);
        $jumlah_bansos = implode(', ', $jml_bansos);
        $jumlah_pengeluaran_kontrakan = implode(', ', $pengeluaran_kontrakan);
        $jumlah_pengeluaran_listrik = implode(', ', $pengeluaran_listrik);
        $jumlah_hutang = implode(', ', $jml_hutang);

        // Fill the mustahik data from the request
        // $lastId = Mustahik::orderByDesc('id')->first();
        // if(!$lastId){ 
        //     $x=0;
        //   }else{ 
        //     $x=$lastId->id; 
        // } 
 
        // $mustahik->code = $this->generateCodeById("MSQ", $x+1);
        $mustahik->nama_lengkap = $request->nama_lengkap;
        $mustahik->jenis_kelamin = $request->jenis_kelamin;
        $mustahik->nomor_telp = $request->no_phone;
        $mustahik->status_perkawinan = $request->status_kawin;
        $mustahik->alamat = $request->alamat;  
        $mustahik->pekerjaan = $request->pekerjaan;
        $mustahik->jumlah_pendapatan = $jumlah_pendapatan;
        $mustahik->jumlah_bansos_diterima = $jumlah_bansos;
        $mustahik->jumlah_anak_dalam_tanggungan = $request->jml_anak;
        $mustahik->status_tempat_tinggal = $request->status_tinggal;
        // $status_tempat_tinggal = $request->status_tempat_tinggal;
        // if (strlen($status_tempat_tinggal) > 255) {
        //     $status_tempat_tinggal = substr($status_tempat_tinggal, 0, 255);   
        // }

        $mustahik->pengeluaran_kontrakan = $jumlah_pengeluaran_kontrakan;
        $mustahik->pengeluaran_listrik = $jumlah_pengeluaran_listrik;
        $mustahik->jumlah_hutang = $jumlah_hutang;
        $mustahik->keperluan_hutang = $request->keperluan_hutang;
        $mustahik->rw_id = $request->rt_rw;     
        $mustahik->wilayah_lain = $request->nama_wilayah;   
        $mustahik->status = $request->status;    
   
        // Save the mustahik
        $mustahik->save();
 
        // Redirect back to the index page of mustahik with a success message
        return redirect()->route('landing-pages.index')->withSuccess(__('Mustahiq Berhasil diajukan.'));
    }
    
    public function destroy($id)
    {
        $mustahik = Mustahik::findOrFail($id);
        $status = 'errors';
        $message = __('global-message.delete_form', ['form' => __('mustahikuser.title')]);
 
        if ($mustahik != '') {
            $mustahik->delete();
            $status = 'success';
            $message = __('global-message.delete_form', ['form' => __('mustahikuser.title')]);
        }

        if (request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status, $message);

    } 

    public function periksa($id)
    {  
       // Find the category data by ID  
       $mustahik = Mustahik::findOrFail($id);
       $ktg = Kategori::pluck('nama_kategori', 'id');

       // Pass the category data to the form view
       return view('mustahikuser.periksa', compact('mustahik','ktg'));
    }

    public function update(Request $request, $id) {
    // Validate the request data 
    $validatedData = $request->validate([  
        'nama_lengkap' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'no_phone' => 'required|string|max:255',
        'status_kawin' => 'required|string|max:255',
        'alamat' => 'nullable|string|max:255', 
        'pekerjaan' => 'required|string|max:255', 
        'jml_pendapatan' => 'required|array',  
        'jml_bansos' => 'nullable|array',
        'jml_anak' => 'required|string|max:255',
        'status_tinggal' => 'required|string|max:255',
        'pengeluaran_kontrakan' => 'nullable|array',
        'pengeluaran_listrik' => 'nullable|array', 
        'jml_hutang' => 'nullable|array', 
        'keperluan_hutang' => 'nullable|string|max:255',
        'kategori_mustahik' => 'required|string|max:255',
        'tgl_terima_zakat' => 'required|date',
        'kategori' => 'required|array', // Tambahkan validasi untuk input 'kategori'
        'kategori.*' => 'exists:kategori,id', // Tambahkan validasi untuk setiap elemen array 'kategori'
        'jml_uang' => 'nullable|array',
        'jml_beras' => 'nullable|array', 
        'satuan_beras' => 'nullable|string|max:255', 
        'rt_rw' => 'nullable|string|max:255',  
        'nama_wilayah' => 'nullable|max:255', 
        'keterangan' => 'nullable|max:255', 
        'status' => 'string|max:255',  
    ]);  

    // Find the mustahik instance by id 
    $mustahik = Mustahik::findOrFail($id);

    $kategoriId = $request->input('kategori')[0]; // Menggunakan [0] karena name "kategori" di set sebagai array
    // Mengambil nilai jml_beras dari request
    $jml_beras = $request->input('jml_beras');
    $jml_uang = $request->input('jml_uang');
    $jml_pendapatan = $request->input('jml_pendapatan');
    $jml_bansos = $request->input('jml_bansos');
    $pengeluaran_kontrakan = $request->input('pengeluaran_kontrakan');
    $pengeluaran_listrik = $request->input('pengeluaran_listrik');
    $jml_hutang = $request->input('jml_hutang');

    // Mengonversi array jml_beras menjadi string
    $jumlah_beras = is_array($jml_beras) ? implode(', ', $jml_beras) : $jml_beras;
    $jumlah_uang = is_array($jml_uang) ? implode(', ', $jml_uang) : $jml_uang;
    $jumlah_pendapatan = is_array($jml_pendapatan) ? implode(', ', $jml_pendapatan) : $jml_pendapatan;
    $jumlah_bansos = is_array($jml_bansos) ? implode(', ', $jml_bansos) : $jml_bansos;
    $jumlah_pengeluaran_kontrakan = is_array($pengeluaran_kontrakan) ? implode(', ', $pengeluaran_kontrakan) : $pengeluaran_kontrakan;
    $jumlah_pengeluaran_listrik = is_array($pengeluaran_listrik) ? implode(', ', $pengeluaran_listrik) : $pengeluaran_listrik;
    $jumlah_hutang = is_array($jml_hutang) ? implode(', ', $jml_hutang) : $jml_hutang;

    // Fill the mustahik data from the request
    $lastId = Mustahik::orderByDesc('id')->first();
    if(!$lastId){ 
        $x=0;
      }else{  
        $x=$lastId->id; 
    } 

    // Update mustahik data from the request
    $mustahik->code = $this->generateCodeById("MSQ", $x+1);
    $mustahik->nama_lengkap = $request->nama_lengkap;
    $mustahik->jenis_kelamin = $request->jenis_kelamin;
    $mustahik->nomor_telp = $request->no_phone;
    $mustahik->status_perkawinan = $request->status_kawin;
    $mustahik->alamat = $request->alamat;
    $mustahik->pekerjaan = $request->pekerjaan;
    $mustahik->jumlah_pendapatan = $jumlah_pendapatan;
    $mustahik->jumlah_bansos_diterima = $jumlah_bansos;
    $mustahik->jumlah_anak_dalam_tanggungan = $request->jml_anak;
    $mustahik->status_tempat_tinggal = $request->status_tinggal;
    $mustahik->pengeluaran_kontrakan = $jumlah_pengeluaran_kontrakan;
    $mustahik->pengeluaran_listrik = $jumlah_pengeluaran_listrik;
    $mustahik->jumlah_hutang = $jumlah_hutang;
    $mustahik->keperluan_hutang = $request->keperluan_hutang;
    $mustahik->kategori_mustahik = $request->kategori_mustahik;
    $mustahik->tanggal = $request->tgl_terima_zakat;
    $mustahik->kategori_id = $kategoriId;
    $mustahik->jumlah_uang_diterima =  $jumlah_uang;
    $mustahik->jumlah_beras_diterima = $jumlah_beras;
    $mustahik->satuan_beras = $request->satuan_beras;
    $mustahik->keterangan = $request->keterangan;
    $mustahik->rw_id = $request->rt_rw;
    $mustahik->wilayah_lain = $request->nama_wilayah;
    $mustahik->status = $request->status;
    
    // Save the updated mustahik 
    $mustahik->save();

    // Redirect ke halaman yang sesuai setelah update
    return redirect()->route('mustahikuser.index')->withSuccess(__('Mustahik successfully updated.'));
    }

}
 