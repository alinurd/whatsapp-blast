<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MustahikDataTable;
use App\Models\Mustahik;
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
        $pageTitle = trans('global-message.list_form_title',['form' => trans('Mustahik')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('mustahik.create').'" class="btn btn-sm btn-primary" role="button">Add Mustahik</a>';
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

        return view('mustahik.form_tambah', compact('roles'));
    }

    public function store(Request $request)
    { 
        // Validate the request data
        $request->validate([ 
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'no_phone' => 'required|string|max:255',
            'status_kawin' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'perkerjaan' => 'required|string|max:255',
            'jml_pendapatan' => 'required|string|max:255',
            'jml_bansos' => 'required|string|max:255',
            'jml_anak' => 'required|string|max:255',
            'status_tinggal' => 'required|string|max:255',
            'pengeluaran_kontrakan' => 'required|string|max:255',
            'jml_hutang' => 'required|string|max:255',
            'keperluan_hutang' => 'required|string|max:255',
            'kategori_mustahik' => 'required|string|max:255',
            'tgl_terima_zakat' => 'required|date',
            'kategori_zakat' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        // Create a new mustahik instance
        $mustahik = new Mustahik();

        // Fill the mustahik data from the request
        $mustahik->nama_lengkap = $request->nama_lengkap;
        $mustahik->jenis_kelamin = $request->jenis_kelamin;
        $mustahik->nomor_telp = $request->no_phone;
        $mustahik->status_perkawinan = $request->status_kawin;
        $mustahik->alamat = $request->alamat; 
        $mustahik->pekerjaan = $request->perkerjaan;
        $mustahik->jumlah_pendapatan = $request->jml_pendapatan;
        $mustahik->jumlah_bansos_diterima = $request->jml_bansos;
        $mustahik->jumlah_anak_dalam_tanggungan = $request->jml_anak;
        $mustahik->status_tempat_tinggal = $request->status_tinggal;
        $mustahik->pengeluaran_kontrakan = $request->pengeluaran_kontrakan;
        $mustahik->jumlah_hutang = $request->jml_hutang;
        $mustahik->keperluan_hutang = $request->keperluan_hutang;
        $mustahik->kategori_mustahik = $request->kategori_mustahik;
        $mustahik->tanggal = $request->tgl_terima_zakat;
        $mustahik->kategori_menerima_zakat = $request->kategori_zakat;
        $mustahik->keterangan = $request->keterangan;

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

}
  