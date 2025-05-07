<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\Mustahik;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {  
        $pageTitle = trans('global-message.list_form_title',['form' => trans('Product')] );
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
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);  

    // Create a new product instance
    $product = new Product();

    // Fill the product data from the request
    $product->kategori_id = $request->kategori;
    $product->nama_product = $request->nama_product;
    $product->desk_detail = $request->desk_detail;

    // Handle the image upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/products', $filename, 'public');
        $product->gambar = $path;
    } else {
        // Default value if no image uploaded
        $product->gambar = null; // atau bisa juga 'uploads/products/default.png'
    }

    // Save the product
    $product->save();

    // Redirect back to the index page of products with a success message
    return redirect()->route('product.index')->withSuccess(__('Product added successfully.'));
    }

    public function edit($id)
    {  
       // Find the category data by ID  
       $product = Product::findOrFail($id);
       $ktg = Kategori::pluck('nama_kategori', 'id');

       // Pass the category data to the form view
       return view('product.form_edit', compact('product','ktg'));
    }

    public function update(Request $request, $id)
    {
        // Temukan produk yang akan diperbarui
        $product = Product::findOrFail($id);

        // Validasi input produk jika diperlukan
        $request->validate([
            'kategori' => 'required',
            'nama_product' => 'required|string|max:255',
            'desk_detail' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]); 

        // Mengambil jenis produk yang dipilih dari input
        $jenisProduk = $request->jenis_product; 

        // Path penyimpanan berdasarkan jenis produk
        $storagePath = 'uploads/products/' . $jenisProduk;

        // Lakukan pemrosesan update produk
        $product->kategori_id = $request->kategori;
        $product->nama_product = $request->nama_product;
        $product->desk_detail = $request->desk_detail;

        // Periksa apakah user mencentang "hapus gambar"
        if ($request->filled('hapus_gambar') && $product->gambar) {
            Storage::disk('public')->delete($product->gambar);
            $product->gambar = null;
        }

        // Jika ada file baru, upload seperti biasa (akan menimpa yang lama jika belum dihapus di atas)
        if ($request->hasFile('gambar')) {
            // Jika gambar lama masih ada dan belum dihapus, hapus dulu
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs($storagePath, $filename, 'public');
            $product->gambar = $path;
        }

        // Simpan perubahan
        $product->save();

        // Redirect ke halaman yang sesuai setelah update
        return redirect()->route('product.index')->withSuccess(__('Produk berhasil diperbarui.'));
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
