<?php

namespace App\Http\Controllers;

use App\DataTables\templatePesanDataTable;
use App\DataTables\targetNomorDataTable;
use App\Helpers\AuthHelper;
use App\Models\Kategori;
use App\Models\Target;
use App\Models\Template;
use App\Models\campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function push(templatePesanDataTable $dataTable)
    {

        $nomor = target::where('status', 0)->get();
        $template = Template::pluck('nama', 'id');
        $campaign = Campaign::pluck('data', 'id');

        return view('pesan.push.index', compact('nomor', 'template', 'campaign'));
    }
    public function pushStore(Request $request)
    {
        $berhasil = [];
        $t = Template::where('id', $request['template'])->first();
        $c = Campaign::with('nomor')->where('id', $request['campaign'])->first();
         
        $targets = $request['pushnomor'];
 
        foreach ($c['nomor'] as $n) {
            $tc = Target::where('id', $n->nomor_id)->first();
            if($tc->status ==0){
                    $targets[]=$tc->nomor;
                } 
        }

        if (!$t) {
            $sts = "error";
            $msg = "Silahkan pilih templet pesan terlebih dahulu";
        } else if (!$targets) {
            $sts = "error";
            $msg = "Nomor target tidak ditemukan, silahkan pilih nomor tager atau pilih campain";
        } else {
            foreach ($targets as $q) {
                $p = Target::where('id', $q)->first();
                $no = $p->nomor;
                $send = $this->sendMassage2($no, $t->pesan);
                if ($send && isset($send->ref_no)) {
                    $p->update([
                        'push' => $p->push + 1,
                        'status' => 1,
                        'updated_at' => $request->sent_date
                    ]);
                    $berhasil[] = $no;
                }
            }
            $jumlah = count($berhasil);
            
            $sts = "success";
            $msg = "Berhasil mengirim ke {$jumlah} nomor.";
        }

        return redirect()->route('push.index')
            ->with($sts, $msg)
            ->with('nomor_terkirim', $berhasil);
    }


    //template
    public function template(templatePesanDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title', ['form' => trans('Template Pesan')]);
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="' . route('template.create') . '" class="btn btn-sm btn-primary" role="button">Add template pesan</a>';
        return $dataTable->render('global.datatable', compact('pageTitle', 'auth_user', 'assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function templateCreate()
    {
        $k = Kategori::pluck('nama_kategori', 'id');
        return view('pesan.template.form', compact('k'));
    }

    public function templateStore(Request $request)
    {
        $auth = Auth::user()->username;
        $tmp = new Template();

        $tmp->nama = $request->nama;
        $tmp->kategori = $request->Kategori;
        $tmp->pesan = $request->pesan;
        $tmp->created_by  = $auth;

        $tmp->save();

        // Redirect back to the index page of categories with a success message
        return redirect()->route('template.index')->withSuccess(__('template added successfully.'));
    }

    public function templateEdit($id)
    {
        $old = template::where("id", $id)->get();
        $k = Kategori::pluck('nama_kategori', 'id');
        return view('pesan.template.edit', compact('k', 'old'));
    }

    public function templateUpdate(Request $request, $id)
    {
        $tm = template::where('id', $id)
            ->update([
                'nama' => $request['nama'],
                'Kategori' => $request['Kategori'],
                'pesan' => $request['pesan'],
            ]);
        return redirect()->route('template.index')->withSuccess(__('Update template successfully.'));
    }

    public function templateDelete($id)
    {
        $kategori = template::findOrFail($id);
        $status = 'errors';
        $message = __('global-message.delete_form', ['form' => "template"]);

        if ($kategori != '') {
            $kategori->delete();
            $status = 'success';
            $message = __('global-message.delete_form', ['form' => "template"]);
        }

        if (request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status, $message);
    }
    //end template


    //target
    public function target(targetNomorDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title', ['form' => trans('Nomor Target')]);
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="' . route('target.create') . '" class="btn btn-sm btn-primary" role="button">Add target pesan</a>';
        return $dataTable->render('global.datatable', compact('pageTitle', 'auth_user', 'assets', 'headerAction'));
    }

    public function targetCreate()
    {
        $k = Kategori::pluck('nama_kategori', 'id');
        return view('pesan.target.form', compact('k'));
    }

    public function targetStore(Request $request)
    {
        $auth = Auth::user()->username;
        $tmp = new Target();

        $validatedData = $request->validate([
            'nomor' => 'required|digits_between:12,16|regex:/^62\d{10,14}$/|numeric',
        ], [
            'nomor.required' => 'Nomor target harus diisi.',
            'nomor.digits_between' => 'Panjang nomor target harus antara 12 dan 16 digit.',
            'nomor.regex' => 'Format nomor target tidak valid. Harus dimulai dengan 62 dan berisi 12 hingga 16 digit angka.',
            'nomor.numeric' => 'Nomor target harus berupa angka.'
        ]);

        $tmp->nomor = $request->nomor;
        $tmp->push = 0;
        $tmp->status = 0;
        $tmp->created_by  = $auth;

        $tmp->save();
        return redirect()->route('target.index')->withSuccess(__('Nomor Target berhasil ditambahkan.'));
    }


    public function targetEdit($id)
    {
        $old = target::where("id", $id)->get();
        return view('pesan.target.edit', compact('old'));
    }

    public function targetUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomor' => 'required|digits_between:12,16|regex:/^62\d{10,14}$/|numeric',
        ], [
            'nomor.required' => 'Nomor target harus diisi.',
            'nomor.digits_between' => 'Panjang nomor target harus antara 12 dan 16 digit.',
            'nomor.regex' => 'Format nomor target tidak valid. Harus dimulai dengan 62 dan berisi 12 hingga 16 digit angka.',
            'nomor.numeric' => 'Nomor target harus berupa angka.'
        ]);

        $tm = target::where('id', $id)
            ->update([
                'nomor' => $request['nomor'],
                'status' => 0,
            ]);
        return redirect()->route('target.index')->withSuccess(__('Update Nomor Target successfully.'));
    }

    public function targetDelete($id)
    {
        $kategori = target::findOrFail($id);
        $status = 'errors';
        $message = __('global-message.delete_form', ['form' => "Nomor Target"]);

        if ($kategori != '') {
            $kategori->delete();
            $status = 'success';
            $message = __('global-message.delete_form', ['form' => "Nomor Target"]);
        }

        if (request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status, $message);
    }

    public function targetPulih($id)
    {

        $tm = target::where('id', $id)
            ->update([
                'status' => 0,
            ]);

        $status = 'errors';
        $message = __('global-message.pulihkan', ['form' => "Nomor Target"]);

        if ($tm != '') {
            $status = 'success';
            $message = __('global-message.pulihkan', ['form' => "Nomor Target"]);
        }

        if (request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status, $message);
    }
    //end target
}
