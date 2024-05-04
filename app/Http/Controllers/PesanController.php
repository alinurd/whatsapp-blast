<?php

namespace App\Http\Controllers;

use App\DataTables\templatePesanDataTable;
use App\DataTables\targetNomorDataTable;
use App\Helpers\AuthHelper;
use App\Models\Kategori;
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
        $pageTitle = trans('global-message.list_form_title',['form' => trans('kategori')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('kategori.create').'" class="btn btn-sm btn-primary" role="button">Add Kategori</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }
    
    public function target(targetNomorDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('kategori')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('kategori.create').'" class="btn btn-sm btn-primary" role="button">Add Kategori</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    public function template(templatePesanDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('kategori')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('template.create').'" class="btn btn-sm btn-primary" role="button">Add template pesan</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function templateCreate()
    {
        $k = Kategori::pluck('nama_kategori', 'id');
        return view('pesan.template.form', compact('k'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function templateStore(Request $request)
    {
        $auth= Auth::user()->username;
        // dd($request);
 
  
        $tmp = new Template();
  
        $tmp->nama = $request->nama;
        $tmp->kategori = $request->Kategori;
        $tmp->pesan = $request->pesan;
        $tmp->created_by  = $auth;
 
        $tmp->save();

        // Redirect back to the index page of categories with a success message
        return redirect()->route('kategori.index')->withSuccess(__('Kategori added successfully.'));
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
