<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MuzakkiDataTable;
use App\Models\Muzakki;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use App\Models\Kategori;
use App\Models\MuzakkiHeader;
use App\Models\User;
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
        $agt = User::where("user_type", "pemberi")->where("status", "active")->get()->pluck('nama_lengkap', 'id');
        $ktg = Kategori::pluck('nama_kategori', 'id');
 
        return view('muzakki.form', compact('agt','ktg'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dibayarkan' => 'required',
            'user' => 'required|array',
            'user.*' => 'exists:users,id',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategori,id',
            'type' => 'required|array',
            'satuan' => 'required|array',
            'jumlah' => 'required|array',
          ]);
    
          $lastId = MuzakkiHeader::orderByDesc('id')->first();
          if(!$lastId){
              $x=0;
            }else{
              $x=$lastId->id;

          }
          $MuzakkiHeader = MuzakkiHeader::create([
            'user_id' => $validatedData['dibayarkan'],
            'code' => $this->generateCodeById("MZK", $x+1), 
        ]);
    
        foreach ($validatedData['user'] as $key => $user) { 
            Muzakki::create([
                'code' =>  $MuzakkiHeader->code, 
                'user_id' => $user,
                'jumlah_bayar' => $validatedData['jumlah'][$key],
                'kategori_id' => $validatedData['kategori'][$key],
                'type' => $validatedData['type'][$key],
                'satuan' => $validatedData['satuan'][$key],
            ]);
        }
        return redirect()->route('invoice', ['code' => $MuzakkiHeader->code]);
    }
    public function invoice($code){
        $data['detail'] = Muzakki::where('code', $code)->with('user','kategori' )->get();
        $data['header'] = MuzakkiHeader::where('code', $code)->with('user' )->get();
        return view('muzakki.print', compact('data'));
    }

    public function muzakkiCreate()
    {
        $view = view('muzakki.form-user')->render();
        return response()->json(['data' =>  $view, 'status'=> true]);
    }
    public function muzakkiUserStore(Request $request)
    {
        $request['user_type']="pemberi";
        
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nomor_telp' => 'nullable|string',
            'alamat' => 'required|string',
            'user_type' => 'required|in:admin,pemberi,penerima',
        ]);
    
        $user = User::create([
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'email' => uniqid().'@example.com', // Kolom email harus unik, kita buat random untuk sementara
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'nomor_telp' => $validatedData['nomor_telp'],
            'alamat' => $validatedData['alamat'],
            'user_type' => $validatedData['user_type'],
            'status' => 'active', // Mengisi status default
            'role' => null, // Kolom role bisa diisi dengan null sesuai permintaan
        ]);
        
        // $agt = User::where("user_type", "pemberi")->where("status", "active")->get()->pluck('nama_lengkap', 'id');
        // // $agt = Role::where('status',1)->get()->pluck('title', 'id');

        // return view('muzakki.form', compact('agt'));
            }
    
            public function destroy($id)
            {
                // dd($id);
                $kategori = Muzakki::findOrFail($id);
                $status = 'errors';
                $message = __('global-message.delete_form', ['form' => __('muzakki')]);
        
                if ($kategori != '') {
                    $kategori->delete();
                    $status = 'success';
                    $message = __('global-message.delete_form', ['form' => __('muzakki')]);
                }
        
                if (request()->ajax()) {
                    return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
                }
        
                return redirect()->back()->with($status, $message);
        
            }
}
