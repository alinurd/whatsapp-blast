<?php

namespace App\Http\Controllers;
 use Maatwebsite\Excel\Facades\Excel;
 
use App\DataTables\targetNomorDataTable;
 use App\Helpers\AuthHelper;
 use App\Models\Target;
use App\Models\MappingNomor;
 use App\Models\Campaign;
use App\Models\MapNomorCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Imports\NomorTargetImport as GlobalNomorTargetImport;

class TargetController extends Controller
{
 
   //target 
   public function target(targetNomorDataTable $dataTable)
   {
       $pageTitle = trans('global-message.list_form_title', ['form' => trans('Nomor Target')]);
       $auth_user = AuthHelper::authSession();
       $assets = ['data-table'];
       $headerAction = '<a href="' . route('target.create') . '" class="btn btn-sm btn-primary" role="button">Add target pesan</a> | <a href="' . route('import.target') . '" class="btn btn-sm btn-danger" role="button">Import Nomor Target</a>';
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
   
        $validatedData = $request->validate([
           'nomor' => [
               'required',
               'digits_between:12,16',
               'regex:/^62\d{10,14}$/',
               'numeric',
               'unique:targets,nomor', 
           ],
           'nama' => 'required|string',
           'kode' => 'required|array',  
       ]);
   
        $target = new Target();
       $target->nama = $request->nama;
       $target->nomor = $request->nomor;
       $target->ket = $request->ket;
       $target->push = 0;
       $target->status = 0;
       $target->created_by = $auth;
       $target->save(); 

       foreach ($request->kode as $kode) {
           $exists = MappingNomor::where('nomor_id', $target->id)
               ->where('campign_id', $kode)
               ->exists();
   
           if (!$exists) {
               $mapping = new MappingNomor();
               $mapping->nomor_id = $target->id;
               $mapping->campign_id = $kode;
               $mapping->save();
           }
       }
   
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
         $mapping = MappingNomor::findOrFail($id);

         $nomorId = $mapping->nomor_id;

         $mapping->delete();

         $stillMapped = MappingNomor::where('nomor_id', $nomorId)->exists();

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

    
public function import()
{
    $assets = ['data-table'];

    return view('pesan.target.import', compact('assets'));
}
    
public function importProsess(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:xlsx,xls,csv',
    ]);

    Excel::import(new GlobalNomorTargetImport, $request->file('file'));

    return redirect()->back()->with('success', 'Import berhasil!');
}


}
