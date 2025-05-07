<?php

namespace App\Http\Controllers;

use App\DataTables\templatePesanDataTable;
use App\Helpers\AuthHelper;
use App\Models\Kategori; 
use App\Models\Template; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class TemplatePesanController extends Controller
{
    
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

    public function template(templatePesanDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title', ['form' => trans('Template Pesan')]);
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="' . route('template.create') . '" class="btn btn-sm btn-primary" role="button">Add template pesan</a>';
        return $dataTable->render('global.datatable', compact('pageTitle', 'auth_user', 'assets', 'headerAction'));
    }
}
