<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Models\Kategori;
use App\Models\Product;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {  
        $pageTitle = trans('global-message.list_form_title',['form' => trans('product')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('product.create').'" class="btn btn-sm btn-primary" role="button">Add Product</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::pluck('nama_kategori', 'id'); 

        return view('product.form_tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Validate the request data 
        $validatedData = $request->validate([  
            'kategori' => 'required|string|max:255',
            'nama_product' => 'required|string|max:255',
            'desk_detail' => 'required|string|max:255',
        ]);  

        // Create a new product instance
        $product = new Product();

        // Fill the product data from the request
        $product->kategori_id = $request->kategori; // ubah menjadi $request->kategori_id
        $product->nama_product = $request->nama_product;
        $product->desk_detail = $request->desk_detail;

        // Save the product
        $product->save();

        // Redirect back to the index page of products with a success message
        return redirect()->route('product.index')->withSuccess(__('product added successfully.'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = 'errors';
        $message = __('global-message.delete_form', ['form' => __('product')]);

        if ($product != '') {
            $product->delete();
            $status = 'success';
            $message = __('global-message.delete_form', ['form' => __('product')]);
        }

        if (request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status, $message);

    } 
}
