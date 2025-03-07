<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::get('pesanan',[PesananController::class, 'pesanan']);

Route::group(['middleware' => 'auth'], function () {
	Route::get('supplier',[SupplierController::class, 'supplier']);
	Route::post('supplier/tambahsupplier', [SupplierController::class, 'tambah_supplier']);
	Route::get('supplier/delete/{id}', [SupplierController::class, 'delete_supplier']);
	Route::post('supplier/edit/{id}', [SupplierController::class, 'update_supplier']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('kategori',[KategoriController::class, 'kategori']);
	Route::post('kategori/tambahkategori', [KategoriController::class, 'tambah_kategori']);
	Route::get('kategori/delete/{id}', [KategoriController::class, 'delete_kategori']);
	Route::post('kategori/edit/{id}', [KategoriController::class, 'update_kategori']);
});



Route::get('produk',[ProdukController::class, 'produk']);
Route::post('produk/tambahproduk', [ProdukController::class, 'createproduk']);
Route::get('produk/deleteproduk/{kode}', [ProdukController::class, 'deleteproduk']);

Route::get('barcode', [ProdukController::class, 'generateBarCode']);