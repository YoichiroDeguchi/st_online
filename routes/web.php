<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\StaffmanagementController;
use App\Http\Controllers\StafflistController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 総合トップ
Route::get('/', [TopController::class, 'top'])
    ->name('top');

// 管理画面
Route::get('/management', [ManagementController::class, 'management'])
    ->name('management');

// スタッフ管理
Route::get('/staffmanagement', [StaffmanagementController::class, 'staffmanagement'])
    ->name('staffmanagement');

// スタッフ一覧画面
Route::get('/stafflist', [StafflistController::class, 'stafflist'])
    ->name('stafflist');

// patient
Route::middleware('auth')->group(function () { //認証状態のチェック：ログインしてないと全てログイン画面に飛ばす
    Route::resource('patient', PatientController::class);
});

// オンライン同行申し込み画面
Route::get('/application', [ApplicationController::class, 'application'])
    ->name('application');

// 予約状況確認画面
Route::get('/reservation', [ReservationController::class, 'reservation'])
    ->name('reservation');

// 管理者用ルーティング
Route::group(['prefix' => 'admin'], function () {
    // 登録
    Route::get('register', [AdminRegisterController::class, 'create'])
        ->name('admin.register');

    Route::post('register', [AdminRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [AdminLoginController::class, 'showLoginPage'])
        ->name('admin.login');

    Route::post('login', [AdminLoginController::class, 'login']);

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:admin'])->group(function () {
        // ダッシュボード
        Route::get('dashboard', fn() => view('admin.dashboard'))
            ->name('admin.dashboard');
    });
});

require __DIR__.'/auth.php';
