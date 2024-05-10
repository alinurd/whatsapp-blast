<?php

// Controllers

use App\Exports\ExportMuzakki;
use App\Exports\ExportMustahik;
use App\Exports\MuzakkiReport;
use App\Exports\MustahikReport;
use App\Exports\MuzakkiReportExport;
use App\Exports\Report;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\MustahikController; 
use App\Http\Controllers\MustahikuserController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Artisan;
// Packages
use Illuminate\Support\Facades\Route;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php'; 

Route::get('/storage', function () {
    Artisan::call('storage:link');
});


//Landing-Pages Routes
Route::group(['prefix' => 'landing-pages'], function() {
Route::get('index',[HomeController::class, 'landing_index'])->name('landing-pages.index');
Route::get('blog',[HomeController::class, 'landing_blog'])->name('landing-pages.blog');
Route::get('blog-detail',[HomeController::class, 'landing_blog_detail'])->name('landing-pages.blog-detail');
Route::get('about',[HomeController::class, 'landing_about'])->name('landing-pages.about');
Route::get('contact',[HomeController::class, 'landing_contact'])->name('landing-pages.contact');
Route::get('ecommerce',[HomeController::class, 'landing_ecommerce'])->name('landing-pages.ecommerce');
Route::get('faq',[HomeController::class, 'landing_faq'])->name('landing-pages.faq');
Route::get('feature',[HomeController::class, 'landing_feature'])->name('landing-pages.feature');
Route::get('pricing',[HomeController::class, 'landing_pricing'])->name('landing-pages.pricing');
Route::get('saas',[HomeController::class, 'landing_saas'])->name('landing-pages.saas');
Route::get('shop',[HomeController::class, 'landing_shop'])->name('landing-pages.shop');
Route::get('shop-detail',[HomeController::class, 'landing_shop_detail'])->name('landing-pages.shop-detail');
Route::get('software',[HomeController::class, 'landing_software'])->name('landing-pages.software');
Route::get('startup',[HomeController::class, 'landing_startup'])->name('landing-pages.startup');
});

//product
Route::resource('product', ProductController::class); 

//pesan
Route::resource('pesan', PesanController::class);
//template
Route::get('/template-pesan',[PesanController::class, 'template'])->name('template.index');
Route::get('/template-pesan-create',[PesanController::class, 'templateCreate'])->name('template.create');
Route::post('/template-pesan',[PesanController::class, 'templateStore'])->name('template.store');
Route::get('/template-pesan/{id}',[PesanController::class, 'templateEdit'])->name('template.edit');
Route::post('template-pesan/{id}', [PesanController::class, 'templateUpdate'])->name('template.update');
Route::delete('template-pesan/{id}', [PesanController::class, 'templateDelete'])->name('template.delete');

//target
Route::get('/target-pesan',[PesanController::class, 'target'])->name('target.index');
Route::get('/target-pesan-create',[PesanController::class, 'targetCreate'])->name('target.create');
Route::post('/target-pesan',[PesanController::class, 'targetStore'])->name('target.store');
Route::get('/target-pesan/{id}',[PesanController::class, 'targetEdit'])->name('target.edit');
Route::get('/target-pulih/{id}',[PesanController::class, 'targetPulih'])->name('target.open');
Route::post('target-pesan/{id}', [PesanController::class, 'targetUpdate'])->name('target.update');
Route::delete('target-pesan/{id}', [PesanController::class, 'targetDelete'])->name('target.delete');

//push
Route::get('/push',[PesanController::class, 'push'])->name('push.index');

//UI Pages Routs
// Route::get('/', [HomeController::class, 'uisheet'])->name('uisheet');
Route::get('/',[HomeController::class, 'landing_index'])->name('uisheet');
 
Route::get('showinvoice/{code}', [MustahikuserController::class, 'show'])->name('showinvoice');
 Route::get('history/showdataupdate/{code}', [MustahikuserController::class, 'showdataupdate'])->name('showdataupdate');

Route::get('mustahikuser/create', [MustahikuserController::class, 'create'])->name('mustahikuser.create');
Route::post('mustahikuser/store', [MustahikuserController::class, 'store'])->name('mustahikuser.store');

Route::get('create_formulir', [FormulirController::class, 'create_formulir'])->name('formulir.create_formulir'); 
Route::post('template_formulir', [FormulirController::class, 'template_formulir'])->name('formulir.template_formulir'); 
Route::post('store_formulir', [FormulirController::class, 'store_formulir'])->name('formulir.store_formulir'); 

Route::group(['middleware' => 'auth'], function () {
    // Permission Module
    Route::get('/role-permission',[RolePermission::class, 'index'])->name('role.permission.list');
    Route::resource('permission',PermissionController::class);
    Route::resource('role', RoleController::class);
    
    // Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    // Users Module 
    Route::resource('users', UserController::class);   
    Route::resource('kategori', KategoriController::class); 
    Route::resource('formulir', FormulirController::class)->except('update'); 
    Route::put('formulir/{id}/update', [FormulirController::class, 'update'])->name('formulir.update');
    Route::get('formulir_report', [FormulirController::class, 'report'])->name('formulir.report');
    Route::get('formulir_report_excel', [FormulirController::class, 'reportExcel'])->name('formulir.reportExcel');
    
    Route::get('invoice/{code}', [MuzakkiController::class, 'invoice'])->name('invoice');
    Route::post('muzakkiUserStore', [MuzakkiController::class, 'muzakkiUserStore'])->name('muzakkiUserStore');
    Route::get('cetakinvoice/{code}', [MuzakkiController::class, 'cetakinvoice'])->name('cetakinvoice');
    Route::get('editmuzzaki/{code}', [MuzakkiController::class, 'editmuzzaki'])->name('editmuzzaki');
    Route::get('muzakkiCreate', [MuzakkiController::class, 'muzakkiCreate'])->name('muzakkiCreate');
    Route::post('muzakki/{muzakki}', [MuzakkiController::class, 'update'])->name('muzakki.update');
    Route::resource('muzakki', MuzakkiController::class);  
        
    // Route::get('report/muzakkireport', [MuzakkiReport::class, 'muzakkireport'])->name('muzakkireport');
    Route::get('export-muzakki-report', [MuzakkiReport::class, 'exportMuzakkiReport'])->name('muzakkireport');
    Route::get('report/muzakki', [MuzakkiReport::class, 'index'])->name('muzakkireport.index');
    Route::resource('muzakki', MuzakkiController::class);  
    // Route::get('/export-muzakki-report', [MuzakkiReport::class, 'exportMuzakkiReport']);
    Route::delete('muzakki/destroy/{code}', [MuzakkiController::class, 'destroy'])->name('muzakki.destroy');

    Route::get('report/muzakkireportexport', [MuzakkiReportExport::class, 'MuzakkiReportExport'])->name('MuzakkiReportExport');
 
    Route::get('report/mustahikreport', [MustahikReport::class, 'mustahikreport'])->name('mustahikreport');
    Route::get('report/mustahik', [MustahikReport::class, 'index'])->name('mustahikreport.index');

    Route::get('mustahikuser/index', [MustahikuserController::class, 'index'])->name('mustahikuser.index');
    Route::delete('mustahikuser/destroy/{id}', [MustahikuserController::class, 'destroy'])->name('mustahikuser.destroy');
    Route::get('mustahikuser/periksa/{id}', [MustahikuserController::class, 'periksa'])->name('mustahikuser.periksa');
    Route::put('mustahikuser/update/{id}', [MustahikuserController::class, 'update'])->name('mustahikuser.update');

    Route::resource('mustahik', MustahikController::class);   
});
   
//App Details Page => 'Dashboard'], function() { 
Route::group(['prefix' => 'menu-style'], function() {
    //MenuStyle Page Routs
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualhorizontal'])->name('menu-style.dualhorizontal');
    Route::get('dual-compact', [HomeController::class, 'dualcompact'])->name('menu-style.dualcompact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedfancy'])->name('menu-style.boxedfancy');
});

//App Details Page => 'special-pages'], function() {
Route::group(['prefix' => 'special-pages'], function() {
    //Example Page Routs
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('calender', [HomeController::class, 'calender'])->name('special-pages.calender');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

//Widget Routs
Route::group(['prefix' => 'widget'], function() {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});

//Maps Routs
Route::group(['prefix' => 'maps'], function() {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});

//Auth pages Routs
Route::group(['prefix' => 'auth'], function() {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});

//Error Page Route
Route::group(['prefix' => 'errors'], function() {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});


//Forms Pages Routs
Route::group(['prefix' => 'forms'], function() {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});


//Table Page Routs
Route::group(['prefix' => 'table'], function() {
    Route::get('bootstraptable', [HomeController::class, 'bootstraptable'])->name('table.bootstraptable');
    Route::get('datatable', [HomeController::class, 'datatable'])->name('table.datatable');
});

//Icons Page Routs
Route::group(['prefix' => 'icons'], function() {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});
//Extra Page Routs
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');
