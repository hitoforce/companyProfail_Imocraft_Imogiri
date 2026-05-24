<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BelakangController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BgController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DswisataController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate']);
});
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/About', [AboutController::class, 'inde x']);
    Route::get('/About/create', [AboutController::class, 'create']);
    Route::post('/About/store', [AboutController::class, 'store']);
    Route::get('/About/edit/{id}', [AboutController::class, 'edit']);
    Route::post('/About/update/{id}', [AboutController::class, 'update']);
    Route::get('/About/destroy/{About}', [AboutController::class, 'destroy']);

    Route::get('/Blog', [BlogController::class, 'index']);
    Route::get('/Blog/create', [BlogController::class, 'create']);
    Route::post('/Blog/store', [BlogController::class, 'store']);
    Route::get('/Blog/edit/{id}', [BlogController::class, 'edit']);
    Route::post('/Blog/update/{id}', [BlogController::class, 'update']);
    Route::get('/Blog/destroy/{Blog}', [BlogController::class, 'destroy']);

    Route::get('/Bg', [BgController::class, 'index']);
    Route::get('/Bg/create', [BgController::class, 'create']);
    Route::post('/Bg/store', [BgController::class, 'store']);
    Route::get('/Bg/edit/{id}', [BgController::class, 'edit']);
    Route::post('/Bg/update/{id}', [BgController::class, 'update']);
    Route::get('/Bg/destroy/{Bg}', [BgController::class, 'destroy']);

    Route::get('/Beranda', [BerandaController::class, 'index']);
    Route::get('/Beranda/create', [BerandaController::class, 'create']);
    Route::post('/Beranda/store', [BerandaController::class, 'store']);
    Route::get('/Beranda/edit/{id}', [BerandaController::class, 'edit']);
    Route::post('/Beranda/update/{id}', [BerandaController::class, 'update']);
    Route::get('/Beranda/destroy/{Beranda}', [BerandaController::class, 'destroy']);


    Route::get('/Product', [ProductController::class, 'index']);
    Route::get('/Product/create', [ProductController::class, 'create']);
    Route::post('/Product/store', [ProductController::class, 'store']);
    Route::get('/Product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/Product/update/{id}', [ProductController::class, 'update']);
    Route::get('/Product/destroy/{Product}', [ProductController::class, 'destroy']);

    Route::get('/Galery', [GaleryController::class, 'index']);
    Route::get('/Galery/create', [GaleryController::class, 'create']);
    Route::post('/Galery/store', [GaleryController::class, 'store']);
    Route::get('/Galery/edit/{id}', [GaleryController::class, 'edit']);
    Route::post('/Galery/update/{id}', [GaleryController::class, 'update']);
    Route::get('/Galery/destroy/{Galery}', [GaleryController::class, 'destroy']);

    Route::get('/Dswisata', [DswisataController::class, 'index']);
    Route::get('/Dswisata/create', [DswisataController::class, 'create']);
    Route::post('/Dswisata/store', [DswisataController::class, 'store']);
    Route::get('/Dswisata/edit/{id}', [DswisataController::class, 'edit']);
    Route::post('/Dswisata/update/{id}', [DswisataController::class, 'update']);
    Route::get('/Dswisata/destroy/{Dswisata}', [DswisataController::class, 'destroy']);

    Route::get('/User', [UserController::class, 'index']);
    Route::get('/User/create', [UserController::class, 'create']);
    Route::post('/User/store', [UserController::class, 'store']);
    Route::get('/User/edit/{id}', [UserController::class, 'edit']);
    Route::post('/User/update/{id}', [UserController::class, 'update']);
    Route::get('/User/destroy/{User}', [UserController::class, 'destroy']);
});


Route::get('/', [BelakangController::class, 'index']);
Route::get('Detail', [BelakangController::class, 'detail']);
Route::get('Belanja', [BelakangController::class, 'belanja']);
Route::get('Wisata', [BelakangController::class, 'wisata']);
Route::get('Dtlwis', [BelakangController::class, 'dtwisata']);
