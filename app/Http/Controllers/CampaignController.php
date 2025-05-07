<?php

namespace App\Http\Controllers;

use App\DataTables\campaignNomorDataTable;
use App\Helpers\AuthHelper;
use App\Models\Kategori; 
use App\Models\Template; 
use App\Models\Campaign; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class CampaignController extends Controller
{
   
    
  
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

}

