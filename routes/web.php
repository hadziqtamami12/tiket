<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    LoginController,
    RoleController,
    UserController,
    GoogleController,
    KategoribiayaController,
};

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


Route::group(['middleware' => 'auth'], function () {

    // Route::group(['middleware'=>['auth','role:admin,pegawai,su']],function(){

    // });

    // Route::get('/', [HomeController::class, 'index']);
    // Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    // Route::post('pembayaranadd', [PembayaranController::class, 'store'])->name('pembayaranadd');
    // Route::get('pembayaranedit', [PembayaranController::class, 'edit'])->name('pembayaranedit');
    // Route::POST('pembayaranupdate', [PembayaranController::class, 'update'])->name('pembayaranupdate');
    // Route::get('pembayarandelete/{id}', [PembayaranController::class, 'destroy'])->name('pembayarandelete');
    // Route::POST('pembayaranupload', [PembayaranController::class, 'uploadbukti'])->name('pembayaranupload');
    // Route::get('pembayaranvalidasi/{id}', [PembayaranController::class, 'validasi'])->name('pembayaranvalidasi');

    // Route::get('dashboard', function () {
    // 	return view('dashboard');
    // })->name('dashboard');



    // Route::get('/logout', [SessionsController::class, 'destroy']);
    // Route::get('/user-profile', [InfoUserController::class, 'create']);
    // Route::post('/user-profile', [InfoUserController::class, 'store']);
    // Route::get('/login', function () {
    // 	return view('dashboard');
    // })->name('Login-up');
});



Route::group(['middleware' => 'auth', 'role_id:1'], function () {
    Route::get('role', [RoleController::class, 'index'])->name('role');
    Route::post('roleadd', [RoleController::class, 'store'])->name('roleadd');
    Route::get('roleedit', [RoleController::class, 'edit'])->name('roleedit');
    Route::POST('roleupdate', [RoleController::class, 'update'])->name('roleupdate');
    Route::get('roledelete/{id}', [RoleController::class, 'destroy'])->name('roledelete');

    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::post('useradd', [UserController::class, 'store'])->name('useradd');
    Route::get('useredit', [UserController::class, 'edit'])->name('useredit');
    Route::POST('userupdate', [UserController::class, 'update'])->name('userupdate');
    Route::get('userdelete/{id}', [UserController::class, 'destroy'])->name('userdelete');
});

Route::group(['middleware' => 'auth', 'role_id:2'], function () {
    Route::get('kategoribiaya', [KategoribiayaController::class, 'index'])->name('kategoribiaya');
    Route::post('kategoribiayaadd', [KategoribiayaController::class, 'store'])->name('kategoribiayaadd');
    Route::get('kategoribiayaedit', [KategoribiayaController::class, 'edit'])->name('kategoribiayaedit');
    Route::POST('kategoribiayaupdate', [KategoribiayaController::class, 'update'])->name('kategoribiayaupdate');
    Route::get('kategoribiayadelete/{id}', [KategoribiayaController::class, 'destroy'])->name('kategoribiayadelete');
});

Route::get('/', [LoginController::class, 'index']);

Route::get('dashboard', [LoginController::class, 'dashboard']);
Route::get('admin', [LoginController::class, 'admin'])->name('admin');
Route::post('proseslogin', [LoginController::class, 'proseslogin'])->name('proseslogin');
Route::get('registration', [LoginController::class, 'registration'])->name('registration');
Route::post('prosesregister', [LoginController::class, 'prosesregister'])->name('prosesregister');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');



//google user handle
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
