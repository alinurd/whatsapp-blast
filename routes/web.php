<?php

// Controllers

use App\Exports\ExportMuzakki;
use App\Exports\ExportMustahik;
use App\Exports\MuzakkiReport;
use App\Exports\MustahikReport;
use App\Exports\Report;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\MustahikController; 
use App\Http\Controllers\MustahikuserController; 
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

//UI Pages Routs
// Route::get('/', [HomeController::class, 'uisheet'])->name('uisheet');
Route::get('/',[HomeController::class, 'landing_index'])->name('uisheet');
 
Route::get('mustahikuser/create', [MustahikuserController::class, 'create'])->name('mustahikuser.create');
Route::post('mustahikuser/store', [MustahikuserController::class, 'store'])->name('mustahikuser.store');

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
    
    Route::get('invoice/{code}', [MuzakkiController::class, 'invoice'])->name('invoice');
    Route::post('muzakkiUserStore', [MuzakkiController::class, 'muzakkiUserStore'])->name('muzakkiUserStore');
    Route::get('cetakinvoice/{code}', [MuzakkiController::class, 'cetakinvoice'])->name('cetakinvoice');
    Route::get('muzakkiCreate', [MuzakkiController::class, 'muzakkiCreate'])->name('muzakkiCreate');
    Route::resource('muzakki', MuzakkiController::class);  
        
    Route::get('report/muzakkireport', [MuzakkiReport::class, 'muzakkireport'])->name('muzakkireport');
    Route::get('report/muzakki', [MuzakkiReport::class, 'index'])->name('muzakkireport.index');

    Route::get('report/mustahikreport', [MustahikReport::class, 'mustahikreport'])->name('mustahikreport');
    Route::get('report/mustahik', [MustahikReport::class, 'index'])->name('mustahikreport.index');

    Route::resource('mustahik', MustahikController::class);   
});
        