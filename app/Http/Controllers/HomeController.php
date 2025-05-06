<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muzakki;
use App\Models\Mustahik;
use App\Models\Kategori;
use App\Models\LogMsg;
use App\Models\Product;
use App\Models\Rw;
use App\Models\MuzakkiHeader;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
    {

        
        $view="dashboard";
        if(auth()->user()->role == 1){
            $view="dashboard-admin";
        }
        $Callback = LogMsg::with('callBackStatus')->get();


         $sts = [
            'D' => 0, // Delivered
            'S' => 0, // Sent
            'A' => 0, // Aborted
            'F' => 0, // Failed
            'R' => 0, // Read
        ];
   

        // Loop untuk menghitung jumlah per status
        foreach ($Callback as $lp) {
         foreach ($lp->callBackStatus as $log) {
            if (isset($sts[$log->status])) {
                $sts[$log->status]++;
            }
            }
        }
    
        // Menampilkan jumlah per status
         $b=$this->getBalance();
        $k=json_decode($b); 
        $ttl=10;
        $data['ttlPengajuan']=100;
        $data['ttlNomor']=1000;
        $data['ttlCampaign']=10;
        $data['lainnya']=100;
        $server['start'] = "2025-05-04";
        $server['exp'] = "2025-06-04";
        $kredit['total']=$ttl;
        $kredit['exp']=$k->data->wa_expired_date; 
        $kredit['terpakai']=$ttl-$k->data->wa_balance;
        $assets = ['chart', 'animation']; 
        return view('dashboards.'.$view, compact('assets', 'data','kredit','server', 'Callback','sts'));
    }
    
    public function getSts()
{
    $log = LogMsg::all();
    $berhasil = [];
    $detail_berhasil = [];

    foreach ($log as $l) {
        $send = $this->getStsApi($l->ref_no);

        if ($send && isset($send->ref_no) && $send->status === 'D') {
            // Simpan hanya data yang status-nya berhasil (D)
            $berhasil[] = $send->destination;
            $detail_berhasil[] = $send; // Simpan seluruh object response
        }
    }

    $jumlah = count($berhasil);

    dd([
        'total_berhasil' => $jumlah,
        'nomor_berhasil' => $berhasil,
        'data_berhasil' => $detail_berhasil, // semua detail response
    ]);
}


    /* 
     * Menu Style Routs
     */
    public function horizontal(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.horizontal',compact('assets'));
    }
    public function dualhorizontal(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.dual-horizontal',compact('assets'));
    }
    public function dualcompact(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.dual-compact',compact('assets'));
    }
    public function boxed(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.boxed',compact('assets'));
    }
    public function boxedfancy(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('menu-style.boxed-fancy',compact('assets'));
    }

    /*
     * Pages Routs
     */
    public function billing(Request $request)
    {
        return view('special-pages.billing');
    }

    public function calender(Request $request)
    {
        $assets = ['calender'];
        return view('special-pages.calender',compact('assets'));
    }

    public function kanban(Request $request)
    {
        return view('special-pages.kanban');
    }

    public function pricing(Request $request)
    {
        return view('special-pages.pricing');
    }

    public function rtlsupport(Request $request)
    {
        return view('special-pages.rtl-support');
    }

    public function timeline(Request $request)
    {
        return view('special-pages.timeline');
    }


    /*
     * Widget Routs
     */
    public function widgetbasic(Request $request)
    {
        return view('widget.widget-basic');
    }
    public function widgetchart(Request $request)
    {
        $assets = ['chart'];
        return view('widget.widget-chart', compact('assets'));
    }
    public function widgetcard(Request $request)
    {
        return view('widget.widget-card');
    }

    /*
     * Maps Routs
     */
    public function google(Request $request)
    {
        return view('maps.google');
    }
    public function vector(Request $request)
    {
        return view('maps.vector');
    }

    /*
     * Auth Routs
     */
    public function signin(Request $request)
    {
        return view('auth.login');
    }
    public function signup(Request $request)
    {
        return view('auth.register');
    }
    public function confirmmail(Request $request)
    {
        return view('auth.confirm-mail');
    }
    public function lockscreen(Request $request)
    {
        return view('auth.lockscreen');
    }
    public function recoverpw(Request $request)
    {
        return view('auth.recoverpw');
    }
    public function userprivacysetting(Request $request)
    {
        return view('auth.user-privacy-setting');
    }

    /*
     * Error Page Routs
     */

    public function error404(Request $request)
    {
        return view('errors.error404');
    }

    public function error500(Request $request)
    {
        return view('errors.error500');
    }
    public function maintenance(Request $request)
    {
        return view('errors.maintenance');
    }

    /*
     * uisheet Page Routs
     */
    public function uisheet(Request $request)
    {
        return view('uisheet');
    }

    /*
     * Form Page Routs
     */
    public function element(Request $request)
    {
        return view('forms.element');
    }

    public function wizard(Request $request)
    {
        return view('forms.wizard');
    }

    public function validation(Request $request)
    {
        return view('forms.validation');
    }

     /*
     * Table Page Routs
     */
    public function bootstraptable(Request $request)
    {
        return view('table.bootstraptable');
    }

    public function datatable(Request $request)
    {
        return view('table.datatable');
    }

    /*
     * Icons Page Routs
     */

    public function solid(Request $request)
    {
        return view('icons.solid');
    }

    public function outline(Request $request)
    {
        return view('icons.outline');
    }

    public function dualtone(Request $request)
    {
        return view('icons.dualtone');
    }

    public function colored(Request $request)
    {
        return view('icons.colored');
    }

    /*
     * Extra Page Routs
     */
    public function privacypolicy(Request $request)
    {
        return view('privacy-policy');
    }
    public function termsofuse(Request $request)
    {
        return view('terms-of-use');
    }

    /*
    * Landing Page Routs 
    */
    public function landing_index(Request $request) 
    {
        $categories = Kategori::all();
        $products = Product::all()->map(function($product) {
            $product->gambar_url = $product->gambar ? asset('storage/' . $product->gambar) : asset('images/no-image.jpg');
            return $product;
        });
    
        // Kirim data ke view
        return view('landing-pages.pages.index', compact('categories', 'products'));
    }    
    
    public function landing_blog(Request $request)
    {
        return view('landing-pages.pages.blog');
    }
    public function landing_about(Request $request)
    {
        return view('landing-pages.pages.about');
    }
    public function landing_blog_detail(Request $request)
    {
        return view('landing-pages.pages.blog-detail');
    }
    public function landing_contact(Request $request)
    {
        return view('landing-pages.pages.contact-us');
    }
    public function landing_ecommerce(Request $request)
    {
        return view('landing-pages.pages.ecommerce-landing-page');
    }
    public function landing_faq(Request $request)
    {
        return view('landing-pages.pages.faq');
    }
    public function landing_feature(Request $request)
    {
        return view('landing-pages.pages.feature');
    }
    public function landing_pricing(Request $request)
    {
        return view('landing-pages.pages.pricing');
    }
    public function landing_saas(Request $request)
    {
        return view('landing-pages.pages.saas-marketing-landing-page');
    }
    public function landing_shop(Request $request)
    {
        return view('landing-pages.pages.shop');
    }
    public function landing_shop_detail(Request $request)
    {
        return view('landing-pages.pages.shop_detail');
    }
    public function landing_software(Request $request)
    {
        return view('landing-pages.pages.software-landing-page');
    }
    public function landing_startup(Request $request)
    {
        return view('landing-pages.pages.startup-landing-page');
    }
}
