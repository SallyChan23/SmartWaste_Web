<?php

use App\Http\Controllers\MissionController;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RedeemController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\DropInController;
use App\Http\Controllers\AdminDropInController;
use App\Http\Controllers\DropInValidationController;

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
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.show');
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
    Route::get('/drop_in/create', [DropInController::class, 'create'])->name('drop_in.create');
    Route::post('/drop_in/create', [DropInController::class, 'store'])->name('drop_in.store');
    Route::get('/drop_in', [DropInController::class, 'index'])->name('drop_in.index');
    Route::get('/drop_in/status', [DropInController::class, 'dropinStatus'])->name('drop_in.status');
    Route::get('/drop_in/process', [DropInController::class, 'processPage'])->name('drop_in.process');
    Route::post('/drop_in/{id}/drop', [DropInController::class, 'confirmDrop'])->name('drop_in.drop');
    Route::post('/drop_in/drop_in/{id}/confirm', [DropInController::class, 'confirmDropIn'])->name('drop_in.confirm');
    Route::get('/redeem', [RedeemController::class, 'index'])->name('redeem');
    Route::post('/redeem/{voucherId}', [RedeemController::class, 'redeem'])->name('redeem.voucher');
    Route::get('/missions/search', [MissionController::class, 'searchMission'])->name('searchMission');
    Route::get('/profile/process', [DropInController::class, 'processPage'])->name('drop_in.process');
    Route::delete('/drop-in/{id}/delete', [DropInController::class, 'destroy'])->name('drop_in.delete');

    Route::get('/report', [DropInController::class, 'report'])->name('profile.report');
});

// Routes for admins
// Routes for admin validation and management under `/drop_in`
Route::middleware(['auth', 'CheckRole:admin'])->prefix('admin/drop_in')->group(function () {
    Route::get('/', [AdminDropInController::class, 'index'])->name('admin.dropin.index');
    Route::post('/{id}/accept', [AdminDropInController::class, 'accept'])->name('admin.dropin.accept');
    Route::get('/admin/drop_in/validate/{id}', [DropInValidationController::class, 'showValidationForm'])->name('admin.validateDropIn');
    Route::post('/admin/drop_in/verify/{id}', [DropInValidationController::class, 'verifyDropIn'])->name('admin.verifyDropIn');
    Route::post('/drop_in/{id}/decline', [AdminDropInController::class, 'decline'])->name('admin.dropin.decline');

});



Route::get('/set-locale/{locale}', function($locale) {
    if(in_array($locale, ['en', 'id'])){
        session(['locale' =>$locale]);
    }
    return redirect()->back();
})->name('set-locale');