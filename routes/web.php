<?php

use App\Http\Controllers\MissionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\VoucherController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', [AboutUsController::class, 'showAboutUs'])->name('aboutUs');
Route::post('/about-us/send-message', [AboutUsController::class, 'sendMessage'])->name('about-us.sendMessage');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

<<<<<<< Updated upstream
Route::resource('mission', MissionController::class);
Route::resource('voucher',VoucherController::class);

=======
>>>>>>> Stashed changes
// Routes for users
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/drop_in/create', [DropInController::class, 'create'])->name('create-drop-in');
    Route::post('/drop_in', [DropInController::class, 'store'])->name('drop_in.store');
    Route::get('/drop_in', [DropInController::class, 'index'])->name('drop_in.index');
});

// Routes for admins
<<<<<<< Updated upstream
Route::middleware(['auth', 'role:admin'])->group(function () {
=======
Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::resource('mission', MissionController::class);
    Route::resource('voucher',VoucherController::class)->middleware(['auth','CheckRole:user,admin']);
>>>>>>> Stashed changes
    Route::get('/admin/drop_in', [AdminController::class, 'index'])->name('admin.drop_in.index');
    Route::get('/admin/drop_in/{dropIn}/review', [AdminController::class, 'review'])->name('admin.drop_in.review');
    Route::post('/admin/drop_in/{dropIn}/update', [AdminController::class, 'update'])->name('admin.drop_in.update');
});

Route::get('/set-locale/{locale}', function($locale) {
    if(in_array($locale, ['en', 'id'])){
        session(['locale' =>$locale]);
    }
    return redirect()->back();
})->name('set-locale');
