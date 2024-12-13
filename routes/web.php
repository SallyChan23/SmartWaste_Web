<?php

use App\Http\Controllers\MissionController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutUsController;

Route::get('/', function () {
    return view('smartwaste.home');
})->name('home');

Route::get('/about-us', [AboutUsController::class, 'showAboutUs'])->name('aboutUs');
Route::post('/about-us/send-message', [AboutUsController::class, 'sendMessage'])->name('about-us.sendMessage');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('mission', MissionController::class);
Route::resource('voucher',VoucherController::class);

// Routes for users
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/drop_in/create', [DropInController::class, 'create'])->name('create-drop-in');
    Route::post('/drop_in', [DropInController::class, 'store'])->name('drop_in.store');
    Route::get('/drop_in', [DropInController::class, 'index'])->name('drop_in.index');
});

// Routes for admins
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/drop_in', [AdminController::class, 'index'])->name('admin.drop_in.index');
    Route::get('/admin/drop_in/{dropIn}/review', [AdminController::class, 'review'])->name('admin.drop_in.review');
    Route::post('/admin/drop_in/{dropIn}/update', [AdminController::class, 'update'])->name('admin.drop_in.update');
});