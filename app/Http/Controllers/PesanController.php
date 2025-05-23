<?php

namespace App\Http\Controllers;

use App\DataTables\templatePesanDataTable;
use App\DataTables\targetNomorDataTable;
use App\DataTables\campaignNomorDataTable;
use App\Helpers\AuthHelper;
use App\Models\Kategori;
use App\Models\Target;
use App\Models\MappingNomor;
use App\Models\Template;
use App\Models\Campaign;
use App\Models\MapNomorCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PesanController extends Controller
{

    public function push(templatePesanDataTable $dataTable)
    {

        $nomor = target::where('status', 0)->get();
        $template = Template::pluck('nama', 'id');$campaign = \DB::table('campign as c')
        ->leftJoin('mapping_nomor as m', 'c.kode', '=', 'm.campign_id')
        ->leftJoin('targets as t', 'm.nomor_id', '=', 't.id')
        ->where('t.status', 0)
        ->select('c.id', 'c.nama', \DB::raw('COUNT(m.id) as total'))
        ->groupBy('c.id', 'c.nama')
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item->id => "{$item->nama} - {$item->total} Nomor"];
        });
    
    
    
        return view('pesan.push.index', compact('nomor', 'template', 'campaign'));
    }
    public function pushStore(Request $request)
    {
        $berhasil = [];
        $t = Template::where('id', $request['template'])->first();
        $c = Campaign::with('nomor')->where('id', $request['campaign'])->first();
         
        $targets = $request['pushnomor'];
 
        if($request['campaign']){
        foreach ($c['nomor'] as $n) {
            $tc = Target::where('id', $n->nomor_id)->first();
            if($tc->status ==0){
                    $targets[]=$tc->nomor;
                } 
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
        $c = Campaign::pluck('nama', 'kode'); // ['kode' => 'nama']
        return view('pesan.target.form', compact('c'));
   }

   public function targetStore(Request $request)
    {
        $auth = Auth::user()->username;

        // Validasi data input
        $validatedData = $request->validate([
            'nomor' => [
                'required',
                'digits_between:12,16',
                'regex:/^62\d{10,14}$/',
                'numeric'
            ],
            'nama' => 'required|string',
            'kode' => 'required|string', // campaign
        ], [
            'nomor.required' => 'Nomor target harus diisi.',
            'nomor.digits_between' => 'Panjang nomor target harus antara 12 dan 16 digit.',
            'nomor.regex' => 'Format nomor harus diawali dengan 62 dan berisi 12–16 digit.',
            'nomor.numeric' => 'Nomor target harus berupa angka.',
            'nama.required' => 'Nama target wajib diisi.',
            'kode.required' => 'Campaign wajib dipilih.',
        ]);

        // Cek apakah nomor dan campaign sudah dipasangkan sebelumnya
        $duplicateMapping = Target::join('mapping_nomor', 'targets.id', '=', 'mapping_nomor.nomor_id')
            ->where('targets.nomor', $request->nomor)
            ->where('mapping_nomor.campign_id', $request->kode)
            ->exists();

        if ($duplicateMapping) {
            return redirect()->back()
                ->withErrors(['nomor' => 'Nomor ini sudah terdaftar dalam campaign yang sama.'])
                ->withInput();
        }

        // Simpan target baru (meskipun nomornya sama)
        $target = new Target();
        $target->nama = $request->nama;
        $target->nomor = $request->nomor;
        $target->ket = $request->ket;
        $target->push = 0;
        $target->status = 0;
        $target->created_by = $auth;
        $target->save();

        // Simpan mapping dengan ID target terbaru
        MappingNomor::create([
            'nomor_id'   => $target->id,
            'campign_id' => $request->kode,
            'created_by' => $auth
        ]);

        return redirect()->route('target.index')->withSuccess(__('Nomor Target berhasil ditambahkan.'));
    }
    
    public function targetEdit($id)
    { 
        
        $target = MapNomorCampaign::where('target_id', $id)->first();
        $c = Campaign::pluck('nama', 'kode');

        $selectedCampaign = $this->getListCampaign($target, 1);

        return view('pesan.target.edit', [
            'old' => $target,  
            'c' => $c,
            'selectedCampaign' => $selectedCampaign,
         ]);
    }

    public function targetUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomor' => [
                'required',
                'digits_between:12,16',
                'regex:/^62\d{10,14}$/',
                'numeric',
                Rule::unique('targets', 'nomor')->ignore($id),
            ],
            'nama' => 'required|string',
        ]);
        
        $target = MapNomorCampaign::where('target_id', $id)->first();

        // $mapping = MappingNomor::findOrFail($id);
        $nomorId = $target->target_id;
 
        // Ambil campaign_id dari kode
        foreach ($request->kode as $kode) { 
            $exists = MappingNomor::where('nomor_id', $nomorId)
                ->where('campign_id', $kode)
                ->exists();
        
            if (!$exists) {
                 $mapping = new MappingNomor();
                $mapping->nomor_id = $nomorId;
                $mapping->campign_id = $kode;
                $mapping->save();
            }
        }
        
        Target::where('id', $nomorId)->update([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'ket' => $request->ket,
            'status' => 0,
        ]);

        return redirect()->route('target.index')->withSuccess(__('Update Nomor Target berhasil.'));
    }

   public function targetDelete($id)
    {
        // Ambil data mapping berdasarkan ID
        $mapping = MappingNomor::findOrFail($id);

        // Ambil nomor_id dari mapping
        $nomorId = $mapping->nomor_id;

        // Hapus mapping terlebih dahulu
        $mapping->delete();

        // Cek apakah nomor_id tersebut masih digunakan di mapping lain
        $stillMapped = MappingNomor::where('nomor_id', $nomorId)->exists();

        // Jika tidak digunakan lagi, hapus data targetnya juga
        if (!$stillMapped) {
            $target = Target::find($nomorId);
            if ($target) {
                $target->delete();
            }
        }

        $status = 'success';
        $message = __('global-message.delete_form', ['form' => "Nomor Target"]);

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
