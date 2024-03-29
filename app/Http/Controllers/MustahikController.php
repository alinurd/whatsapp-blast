<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MustahikDataTable;
use App\Models\Mustahik;
use App\Models\Kategori;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
  
class MustahikController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MustahikDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('Mustahiq')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('mustahik.create').'" class="btn btn-sm btn-primary" role="button">Add Mustahiq</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('status',1)->get()->pluck('title', 'id');
        $ktg = Kategori::pluck('nama_kategori', 'id');

        return view('mustahik.form_tambah', compact('roles','ktg'));
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
            'perkerjaan' => 'required|string|max:255', 
            'jml_pendapatan' => 'required|array',  
            'jml_bansos' => 'required|array',
            'jml_anak' => 'required|string|max:255',
            'status_tinggal' => 'required|string|max:255',
            'pengeluaran_kontrakan' => 'nullable|array',
            'pengeluaran_listrik' => 'nullable|array', 
            'jml_hutang' => 'required|array', 
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
        
        // Create a new mustahik instance
        $mustahik = new Mustahik();
  
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
        $jumlah_beras = implode(', ', $jml_beras);
        $jumlah_uang = implode(', ', $jml_uang);
        $jumlah_pendapatan = implode(', ', $jml_pendapatan);
        $jumlah_bansos = implode(', ', $jml_bansos);
        $jumlah_pengeluaran_kontrakan = implode(', ', $pengeluaran_kontrakan);
        $jumlah_pengeluaran_listrik = implode(', ', $pengeluaran_listrik);
        $jumlah_hutang = implode(', ', $jml_hutang);

        // Fill the mustahik data from the request
        $lastId = Mustahik::orderByDesc('id')->first();
        if(!$lastId){ 
            $x=0;
          }else{ 
            $x=$lastId->id; 
        }
 
        $mustahik->code = $this->generateCodeById("MSQ", $x+1);
        $mustahik->nama_lengkap = $request->nama_lengkap;
        $mustahik->jenis_kelamin = $request->jenis_kelamin;
        $mustahik->nomor_telp = $request->no_phone;
        $mustahik->status_perkawinan = $request->status_kawin;
        $mustahik->alamat = $request->alamat;  
        $mustahik->pekerjaan = $request->perkerjaan;
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
        $mustahik->kategori_mustahik = $request->kategori_mustahik;
        $mustahik->tanggal = $request->tgl_terima_zakat; 
        $mustahik->kategori_id = $kategoriId;
        $mustahik->jumlah_uang_diterima = $jumlah_uang;   
        $mustahik->jumlah_beras_diterima = $jumlah_beras;
        $mustahik->satuan_beras = $request->satuan_beras;
        $mustahik->keterangan = $request->keterangan;    
        $mustahik->rw_id = $request->rt_rw;    
        $mustahik->wilayah_lain = $request->nama_wilayah;    
        $mustahik->status = $request->status;    

         // If "Apakah masuk ke RW 04?" is "Tidak", assign "Nama Wilayah"
        // if ($request->rt_rw === 'Tidak') {   
        //     $mustahik->rt_rw = $request->nama_wilayah;   
        // } else {
        //     $mustahik->rt_rw = $request->rt_rw_select; 
        // }  

        // $mustahik->rt_rw = $request->pilihan_rw === 'Tidak' ? $request->nama_wilayah : $request->rt_rw_select;
   
        // Save the mustahik
        $mustahik->save();

        // Redirect back to the index page of mustahik with a success message
        return redirect()->route('mustahik.index')->withSuccess(__('Mustahik added successfully.'));
    }

    public function destroy($id)
    {
        $mustahik = Mustahik::findOrFail($id);
        $status = 'errors';
        $message = __('global-message.delete_form', ['form' => __('mustahik.title')]);
 
        if ($mustahik != '') {
            $mustahik->delete();
            $status = 'success';
            $message = __('global-message.delete_form', ['form' => __('mustahik.title')]);
        }

        if (request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status, $message);

    }

    public function show($id)
    {  
       // Find the category data by ID  
       $mustahik = Mustahik::findOrFail($id);
       $ktg = Kategori::pluck('nama_kategori', 'id');

       // Pass the category data to the form view
       return view('mustahik.detail', compact('mustahik','ktg'));
    }

    

}
  