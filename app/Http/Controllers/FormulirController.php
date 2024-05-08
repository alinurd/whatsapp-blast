<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use App\DataTables\FormulirDataTable;
use App\Helpers\AuthHelper;
use App\Models\FormulirOption;
use App\Models\FormulirParent;
use App\Models\FormulirJawaban;
use Illuminate\Http\Request;

class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FormulirDataTable $dataTable)
    { 
        // $tes = FormulirParent::with('kategori')->get();
        // dd($tes);
        $pageTitle = trans('global-message.list_form_title',['form' => trans('Formulir')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('formulir.create').'" class="btn btn-sm btn-primary" role="button">Add Formulir</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $kategoris = Kategori::get()->keyBy('id');

        $kategoris = $kategoris->map(function($q) {
            return $q->nama_kategori;
        })->toArray();

        return view('formulir.form_tambah', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'kategori'      => 'required',
            'nama_formulir' => 'required',
            'nama_field.*'  => 'required',
            'required.*'    => 'required',
            'tipe.*'        => 'required',
        ]);

        $parent = new FormulirParent();
        $parent->kategori_id = $request->kategori; 
        $parent->nama = $request->nama_formulir; 
        $parent->deskripsi = $request->deskripsi; 
        $parent->save(); 

        $parentId = $parent->id;

        foreach ($request->nama_field as $key => $val) {
            $formulir = new Formulir();
            $formulir->formulir_parent = $parentId;
            $formulir->formulir_kategori = $request->kategori;
            $formulir->formulir_nama = $val;
            $formulir->formulir_required = $request->required[$key];
            $formulir->formulir_tipe = $request->tipe[$key];
            $formulir->save(); 

            if ($request->tipe[$key] == 'checkbox') {
                foreach ($request->checkbox_option[$key] as $option) {
                    $formOption = new FormulirOption();
                    $formOption->option_formulir_id = $formulir->id;
                    $formOption->option_parent_id = $parentId;
                    $formOption->option_soal = $option;
                    $formOption->save();
                }
            }
        }

        return redirect()->route('formulir.index')->withSuccess(__('Formulir added successfully.'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Formulir $formulir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the category data by ID
        $formulir = FormulirParent::with(['formulir' => function($q) {
            $q->with('option');
        }])
            ->findOrFail($id);
 
        
        $kategoris = Kategori::get()->keyBy('id');

        $kategoris = $kategoris->map(function($q) {
            return $q->nama_kategori;
        })->toArray();
        // Pass the category data to the form view
        return view('formulir.form_edit', compact('formulir', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formulir $formulir)
    {
        $request->validate([
            'kategori'      => 'required',
            'nama_formulir' => 'required',
            'nama_field.*'  => 'required',
            'required.*'    => 'required',
            'tipe.*'        => 'required',
        ]);

        $parent = FormulirParent::find($request->parentId);
        $parent->kategori_id = $request->kategori; 
        $parent->nama = $request->nama_formulir; 
        $parent->deskripsi = $request->deskripsi; 
        $parent->save(); 

        $parentId = $parent->id;

        if (!empty($request->nama_field)) {
            Formulir::whereIn('id', $request->old_form_id)->get()->each(function ($formulir) {
                $formulir->option()->delete(); // Delete related models
                $formulir->delete(); // Delete the Formulir model
            });
        }
        foreach ($request->nama_field as $key => $val) {
            $formulir = new Formulir();
            $formulir->formulir_parent = $parentId;
            $formulir->formulir_kategori = $request->kategori;
            $formulir->formulir_nama = $val;
            $formulir->formulir_required = $request->required[$key];
            $formulir->formulir_tipe = $request->tipe[$key];
            $formulir->save(); 

            if ($request->tipe[$key] == 'checkbox') {
                foreach ($request->checkbox_option[$key] as $option) {
                    $formOption = new FormulirOption();
                    $formOption->option_formulir_id = $formulir->id;
                    $formOption->option_parent_id = $parentId;
                    $formOption->option_soal = $option;
                    $formOption->save();
                }
            }
        }

        return redirect()->route('formulir.index')->withSuccess(__('Formulir edited successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formulir $formulir)
    {
        //
    }

    public function create_formulir()
    {
        $kategoris = Kategori::get()->keyBy('id');

        $kategoris = $kategoris->map(function($q) {
            return $q->nama_kategori;
        })->toArray();

        return view('formulir.jawaban.form_tambah', compact('kategoris'));
    }

    public function template_formulir(Request $request)
    {
        $formulir = FormulirParent::with(['formulir' => function($q) {
            $q->with('option');
        }])
            ->where('kategori_id', $request->kategori)
            ->whereHas('formulir')
            ->first();

        if (!$formulir) {
            $html = '<div class="text-center text-danger">Template formulir belum tersedia !!</div>';
            return response()->json($html);
        }
        $html = view('formulir.jawaban.template', compact('formulir'))->render();

        return response()->json($html);
    }
    
    public function store_formulir(Request $request)
    {
        $uniqueInteger = time() + random_int(1, 1000);
        
        foreach ($request->variabel as $key => $val) {
            if (is_array($request->$val)) {
                foreach ($request->$val as $key2 => $val2) {
                    $jawaban = new FormulirJawaban();
                    $jawaban->parent_id = $request->parentId;
                    $jawaban->formulir_id = $key;
                    $jawaban->variabel = $val;
                    $jawaban->jawaban = 1;
                    $jawaban->is_checkbox = 1;
                    $jawaban->checkbox_id = $key2;
                    $jawaban->uuid = $uniqueInteger;
                    $jawaban->save();
                }
            } else {
                $jawaban = new FormulirJawaban();
                $jawaban->parent_id = $request->parentId;
                $jawaban->formulir_id = $key;
                $jawaban->variabel = $val;
                $jawaban->jawaban = $request->val;
                $jawaban->uuid = $uniqueInteger;
                $jawaban->save();
            }
        }

        return redirect('/')->withSuccess(__('Formulir answered successfully.'));
    }
}
