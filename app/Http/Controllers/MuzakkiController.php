<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MuzakkiDataTable;
use App\Models\Muzakki;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;

class MuzakkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MuzakkiDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('Muzakki')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('muzakki.create').'" class="btn btn-sm btn-primary" role="button">Add Muzakki</a>';
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

        return view('muzakki.form', compact('roles'));
    }
}