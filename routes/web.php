<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\ZoomMeetingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::middleware(['auth'])->group(function () {
    Route::post('/register-logged-in', [RegisteredUserController::class, 'storeForLoggedInUsers'])->name('register-logged-in');
});

// 総合トップ
Route::get('/', [TopController::class, 'top'])
    ->name('top');

// patient
Route::middleware('auth')->group(function () { //認証状態のチェック：ログインしてないと全てログイン画面に飛ばす
    Route::get('/patient/mypage', [PatientController::class, 'mydata'])->name('patient.mypage');
    Route::resource('patient', PatientController::class);
});

//user
Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class);
});

//zooom
Route::middleware('auth')->group(function () {
    Route::get('/create-meeting', function () {
        return view('create_meeting');
    });
    Route::post('/create-meeting', [ZoomMeetingController::class, 'createMeeting'])->name('create_meeting');
    Route::get('/my-meetings', [ZoomMeetingController::class, 'myMeetings'])->name('my_meetings');
    Route::delete('/delete_meeting/{id}', [ZoomMeetingController::class, 'destroy'])->name('delete_meeting');
    Route::get('/zoomindex', [ZoomMeetingController::class, 'index'])
    ->name('zoom.index');
});

// 利用者詳細ページのコメント（録画リンク共有）
Route::post('/patients/{patient}/comments', [CommentController::class, 'store'])->name('patients.comments.store');
Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('patients.show');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


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
