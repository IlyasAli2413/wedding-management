<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WeddingMenuItemController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\StaffMemberController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;

// Laravel Breeze routes (auth)
require __DIR__.'/auth.php';

// Welcome page
Route::get('/', fn () => view('welcome'))->name('welcome');

// Portal selection and redirection
Route::get('/portal', [PortalController::class, 'select'])->name('portal.select');
Route::get('/portal/redirect', [PortalController::class, 'redirect'])->name('portal.redirect');

// Admin Authentication
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// User Authentication
Route::middleware('guest')->group(function () {
    Route::get('/user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/user/login', [UserAuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});

// ==============================
// User Portal Routes
// ==============================
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('orders', OrderController::class)->except(['index'])->names([
        'create' => 'orders.create',
        'store' => 'orders.store',
        'show' => 'orders.show',
        'edit' => 'orders.edit',
        'update' => 'orders.update',
        'destroy' => 'orders.destroy',
    ]);
    Route::get('/orders', [OrderController::class, 'userIndex'])->name('orders.index');

    Route::resource('payments', PaymentController::class)->except(['index'])->names([
        'create' => 'payments.create',
        'store' => 'payments.store',
        'show' => 'payments.show',
        'edit' => 'payments.edit',
        'update' => 'payments.update',
        'destroy' => 'payments.destroy',
    ]);
    Route::get('/payments', [PaymentController::class, 'userIndex'])->name('payments.index');

    Route::get('/venues', [VenueController::class, 'userIndex'])->name('venues.index');
    Route::get('/venues/{venue}', [VenueController::class, 'userShow'])->name('venues.show');

    Route::get('/menu-items', [WeddingMenuItemController::class, 'userIndex'])->name('menu-items.index');
    Route::get('/menu-items/{menuItem}', [WeddingMenuItemController::class, 'userShow'])->name('menu-items.show');
});

// ==============================
// Admin Portal Routes
// ==============================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('orders', OrderController::class)->names('orders');
    Route::resource('payments', PaymentController::class)->names('payments');
    Route::resource('venues', VenueController::class)->names('venues');
    Route::resource('menu-items', WeddingMenuItemController::class)
        ->parameters(['menu-items' => 'menuItem'])
        ->names('menu-items');
    Route::resource('staffmembers', StaffMemberController::class)->names('staffmembers');
    Route::resource('clients', ClientController::class)->names('clients');
});


// ==============================
// Profile
// ==============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Optional fallback
// Route::fallback(fn () => view('errors.404'));
