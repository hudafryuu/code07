<?php

use App\Models\Barang;
use App\Models\Pembeli;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller1;
use App\Http\Controllers\Controller2;
use App\Http\Controllers\Controller3;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $jumlahbarang = Barang::count();
    $jumlahpesanan = Pesanan::count();
    $jumlahpembeli = Pembeli::count();

    return view('welcome',compact('jumlahbarang','jumlahpesanan','jumlahpembeli'));
})->middleware('auth');



Route::get('/createbr', [Controller2::class, 'create'])->name('createbr')->middleware('auth');
Route::post('/savebr', [Controller2::class, 'save']);
Route::get('/readbr', [Controller2::class, 'read'])->name('readbr')->middleware('auth');
Route::get('/updatebr/{id_barang}', [Controller2::class, 'update'])->name('updatebr')->middleware('auth');
Route::post('/editbr/', [Controller2::class, 'edit']);
Route::get('/deletebr/{id_barang}', [Controller2::class, 'delete']);
Route::get('/viewbr',[Controller2::class,'view']);


Route::get('/createpm', [Controller3::class, 'create'])->name('createpm')->middleware('auth');
Route::post('/savepm', [Controller3::class, 'save']);
Route::get('/readpm', [Controller3::class, 'read'])->name('readpm')->middleware('auth');
Route::get('/updatepm/{id_minuman}', [Controller3::class, 'update'])->name('updatepm')->middleware('auth');
Route::post('/editpm/', [Controller3::class, 'edit']);
Route::get('/deletepm/{id_minuman}', [Controller3::class, 'delete']);
Route::get('/viewpm',[Controller3::class,'view']);


Route::get('/createps', [Controller1::class, 'create'])->name('createps')->middleware('auth');
Route::post('/saveps', [Controller1::class, 'save']);
Route::get('/readps', [Controller1::class, 'read'])->name('raedps')->middleware('auth');
Route::get('/updateps/{id_minuman}', [Controller1::class, 'update'])->name('updateps')->middleware('auth');
Route::post('/editps/', [Controller1::class, 'edit']);
Route::get('/deleteps/{id_minuman}', [Controller3::class, 'delete']);
Route::get('/viewps',[Controller1::class,'view']);


Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/loginproses',[LoginController::class,'loginproses'])->name('loginproses');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/registeruser',[LoginController::class,'registeruser'])->name('registeruser');

Route::get('/gantipassword',[LoginController::class,'gantiPassword']);
Route::post('/gantipassword',[LoginController::class,'gantiPwproses']);

Route::get('/logout',[LoginController::class,'logout'])->name('logout');