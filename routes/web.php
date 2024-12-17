<?php

use App\Http\Controllers\MissionController;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\DropInController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RedeemController;
use App\Http\Controllers\FaqController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', [AboutUsController::class, 'showAboutUs'])->name('aboutUs');
Route::post('/about-us/send-message', [AboutUsController::class, 'sendMessage'])->name('about-us.sendMessage');
Route::get('/faq', [FaqController::class, 'faq'])->name('faq');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Routes for both
Route::middleware(['auth', 'CheckRole:user,admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-picture', [ProfileController::class, 'updatePicture'])->name('profile.updatePicture');
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/redeem', [RedeemController::class, 'index'])->name('redeem');
    Route::resource('mission', MissionController::class);
    Route::resource('voucher',VoucherController::class)->middleware(['auth','CheckRole:user,admin']);
});

// Routes for users
Route::middleware(['auth', 'CheckRole:user'])->group(function () {
    Route::post('/mission/start/{missionId}', [MissionController::class, 'startMission'])->name('mission.start');
    Route::put('/mission/update-progress/{missionTransactionId}', [MissionController::class, 'updateProgress'])->name('mission.updateProgress');
    Route::post('/voucher/redeem/{voucherId}', [VoucherController::class, 'redeem'])->name('voucher.redeem');
    Route::get('/drop_in/create', [DropInController::class, 'create'])->name('create-drop-in');
    Route::post('/drop_in/create', [DropInController::class, 'store'])->name('drop_in.store');
    Route::get('/drop_in', [DropInController::class, 'index'])->name('drop_in.index');
    Route::get('/drop_in/status', [DropInController::class, 'dropinStatus'])->name('drop_in.status');
    Route::get('/redeem', [RedeemController::class, 'index'])->name('redeem');
    Route::post('/redeem/{voucherId}', [RedeemController::class, 'redeem'])->name('redeem.voucher');
    Route::get('/missions/search', [MissionController::class, 'searchMission'])->name('searchMission');
});

// Routes for admins
Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
   
    // Route::get('/admin/drop_in', [AdminController::class, 'index'])->name('admin.drop_in.index');
    // Route::get('/admin/drop_in/{dropIn}/review', [AdminController::class, 'review'])->name('admin.drop_in.review');
    // Route::post('/admin/drop_in/{dropIn}/update', [AdminController::class, 'update'])->name('admin.drop_in.update');
});

Route::get('/set-locale/{locale}', function($locale) {
    if(in_array($locale, ['en', 'id'])){
        session(['locale' =>$locale]);
    }
    return redirect()->back();
})->name('set-locale');