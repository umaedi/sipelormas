<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('test', fn () => phpinfo());
Route::get('/redirect', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'user') {
            return redirect('/user/dashboard');
        } elseif (Auth::user()->role == 'admin') {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/super_admin/dashboard');
        }
    } else {
        return redirect('/');
    }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/cek_no_skt/{id}', CeknomorController::class);

//route for users
Route::middleware('auth')->prefix('user')->group(function () {

    Route::get('/profile', ProfileController::class);
    Route::get('/dashboard', DashboardController::class);

    Route::get('/permohonan_skt/create', [PermohonansktController::class, 'create']);
    Route::post('/permohonan_skt/store', [PermohonansktController::class, 'store']);
    Route::get('/permohonan_skt/show/{id}', [PermohonansktController::class, 'show']);
    Route::get('/permohonan_skt/edit/{id}', [PermohonansktController::class, 'edit']);
    Route::put('/permohonan_skt/update/{id}', [PermohonansktController::class, 'update']);
    Route::delete('/permohonan_skt/destroy/{id}', [PermohonansktController::class, 'destroy']);

    Route::get('/download/{id}', DownloadController::class);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', Admin\DashboardController::class);

    //route for permohonan
    Route::get('/permohonan', [Admin\PermohonanController::class, 'index']);
    Route::get('/permohonan/diproses', [Admin\PermohonanController::class, 'diproses']);
    Route::get('/permohonan/diterima', [Admin\PermohonanController::class, 'diterima']);
    Route::get('/permohonan/ditolak', [Admin\PermohonanController::class, 'ditolak']);
    Route::get('/permohonan/show/{id}', [Admin\PermohonanController::class, 'show']);
    Route::put('/permohonan/update/{id}', [Admin\PermohonanController::class, 'update']);

    //route for user
    Route::get('/users', [Admin\UserController::class, 'index']);
    Route::get('/user/show/{id}', [Admin\UserController::class, 'show']);
});

Route::middleware(['auth', 'super_admin'])->prefix('super_admin')->group(function () {
    Route::get('/dashboard', Superadmin\DashboardController::class);

    Route::get('/permohonan', [Superadmin\PermohonanController::class, 'index']);
    Route::get('/permohonan/show/{id}', [Superadmin\PermohonanController::class, 'show']);
    Route::get('/permohonan/waiting_sign', [Superadmin\PermohonanController::class, 'waiting_sign']);
    Route::get('/permohonan/signed', [Superadmin\PermohonanController::class, 'signed']);
    Route::get('/permohonan/rejected', [Superadmin\PermohonanController::class, 'rejected']);

    Route::post('/sign/{id}', [Superadmin\TTEController::class, 'sign']);
    Route::post('/sign/reject/{id}', [Superadmin\TTEController::class, 'reject']);
    Route::get('/tte/show/{id}', [Superadmin\TTEController::class, 'show']);

    //users
    Route::get('/user/show/{id}', [Superadmin\UserController::class, 'show']);

    //notif
    Route::get('/notification', Superadmin\NotifController::class);

    //profile
    Route::get('/profile', [Superadmin\ProfileController::class, 'index']);
});
