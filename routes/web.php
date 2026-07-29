<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {

    return redirect('/login');

});
// ログイン画面
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
// ログイン処理
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

Route::middleware('auth')->group(function () {
    // ダッシュボード画面
    Route::get('/dashboard', function () {
        return view('login.dashboard');
    })->name('dashboard');
    // ログアウト処理
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});