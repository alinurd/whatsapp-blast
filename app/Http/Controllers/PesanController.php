<?php

namespace App\Http\Controllers;

use App\DataTables\templatePesanDataTable;
use App\DataTables\targetNomorDataTable;
use App\DataTables\campaignNomorDataTable;
use App\Helpers\AuthHelper;
use App\Models\Kategori;
use App\Models\Target;
use App\Models\Campaign;
use App\Models\MappingNomor;
use App\Models\Template;
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
       
        $nomor= target::all();
        $t = Template::pluck('nama', 'id');

        return view('pesan.push.index', compact('nomor', 't'));
    }
    
    public function pushStore(Request $request)
    {
         
        
        // foreach($request['pushnomor'] as $q){
        //     $p=Target::where('id', $q)->first();
        //     $t=Template::where('id', $request['tenplate'])->first();
        //     $no = $p->nomor;  
        //     $msg=$t->pesan;
        //     $this->sendMassage1($no, $msg, $MuzakkiHeader->code);

        // }
        //  $msg = "Alhamdulillah, telah diterima penunaikan zis/fidyah dari Bapak/ibu: " . $dibayarkan->nama_lengkap . ".\n";
        // $msg .= "No. Invoice: #" . $MuzakkiHeader->code . "\n\n\n ";
        // $msg .= "Lihat detail: https://zis-alhasanah.com/showinvoice/" . $MuzakkiHeader->code;
        // $this->cetakinvoice($MuzakkiHeader->code);

        //  $this->sendMassage($no,$msg);
        //  $this->sendWa($no,$n);

        $key = 'b42be3006183b810feb31c0cc4162822-997e6839-9163-4293-b012-8e9834e6264f';
        return redirect()->route('push.index')->withErrors(__('Pesan tidak terkirim, kredit tidak tersedia. '));
       
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

    //campaign
   public function campaign(campaignNomorDataTable $dataTable)
   {
       $pageTitle = trans('global-message.list_form_title', ['form' => trans('Grouping Campaign')]);
       $auth_user = AuthHelper::authSession();
       $assets = ['data-table'];
       $headerAction = '<a href="' . route('campaign.create') . '" class="btn btn-sm btn-primary" role="button">Add grouping campaign</a>';
       return $dataTable->render('global.datatable', compact('pageTitle', 'auth_user', 'assets', 'headerAction'));
   }

   public function campaignCreate()
   {
       $k = Kategori::pluck('nama_kategori', 'id');
       return view('pesan.campaign.form', compact('k'));
   }

    public function campaignStore(Request $request)
    {
        $auth = Auth::user()->username;
        $tmp = new Campaign();
    
        $tmp->kode = $request->kode;
        $tmp->nama = $request->nama;
        $tmp->status = 0;
        $tmp->created_by  = $auth;
    
        $tmp->save();
        return redirect()->route('campaign.index')->withSuccess(__('Nomor campaign berhasil ditambahkan.'));
    }

    public function campaignEdit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('pesan.campaign.edit', compact('campaign'));
    }

    public function campaignUpdate(Request $request, $id)
    {
        $tm = Campaign::where('id', $id)
            ->update([
                'kode' => $request['kode'],
                'nama' => $request['nama'],
                'status' =>0, 
            ]);
        return redirect()->route('campaign.index')->withSuccess(__('Update Campaign successfully.'));
    }

    public function campaignDelete($id)
   {
       $campaign = Campaign::findOrFail($id);
       $status = 'errors';
       $message = __('global-message.delete_form', ['form' => "campaign"]);

       if ($campaign != '') {
           $campaign->delete();
           $status = 'success'; 
           $message = __('global-message.delete_form', ['form' => "campaign"]);
       }

       if (request()->ajax()) {
           return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
       }

       return redirect()->back()->with($status, $message);
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
        $mapping = MappingNomor::findOrFail($id);

        // Ambil data dari tabel targets berdasarkan nomor_id
        $target = Target::findOrFail($mapping->nomor_id);

        // Ambil daftar campaign
        $c = Campaign::pluck('nama', 'kode');

        // Tentukan campaign yang terpilih dari mapping
        $selectedCampaign = $mapping->campign_id;

        return view('pesan.target.edit', [
            'old' => $target, // ini data target
            'c' => $c,
            'selectedCampaign' => $selectedCampaign,
            'mappingId' => $mapping->id // untuk kebutuhan update
        ]);
    }

    public function targetUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomor' => 'required|digits_between:12,16|regex:/^62\d{10,14}$/|numeric',
            'nama' => 'required|string',
            'kode' => 'required|string|exists:campign,kode',
        ]);

        $mapping = MappingNomor::findOrFail($id);
        $nomorId = $mapping->nomor_id;

        // Ambil campaign_id dari kode
        $campaignId = Campaign::where('kode', $request->kode)->value('id');

        // Tambahan validasi jika kode tidak ditemukan di database
        if (!$campaignId) {
            return redirect()->back()
                ->withErrors(['kode' => 'Campaign tidak ditemukan.'])
                ->withInput();
        }

        // Cek apakah kombinasi sudah ada di data lain
        $exists = MappingNomor::where('nomor_id', $nomorId)
            ->where('campign_id', $campaignId)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->withErrors(['kode' => 'Kombinasi Nomor dan Campaign sudah digunakan di mapping lain.'])
                ->withInput();
        }

        // Simpan update mapping campaign
        $mapping->campign_id = $campaignId;
        $mapping->save();

        // Update target
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
