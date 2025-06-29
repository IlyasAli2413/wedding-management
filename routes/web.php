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

// Include Laravel Breeze auth routes (for registration, etc.) - but exclude login routes
require __DIR__.'/auth.php';

// Public welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Portal routes
Route::get('/portal', [PortalController::class, 'select'])->name('portal.select');
Route::get('/portal/redirect', [PortalController::class, 'redirect'])->name('portal.redirect');

// Admin Authentication Routes (must come before auth.php routes)
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
});

Route::middleware('auth')->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// User Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/user/login', [UserAuthController::class, 'login'])->name('user.login');
});

Route::middleware('auth')->group(function () {
    Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});

// User Portal Routes (Simple - only what users need)
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Orders
    Route::get('/orders', [OrderController::class, 'userIndex'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    
    // Payments
    Route::get('/payments', [PaymentController::class, 'userIndex'])->name('payments.index');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
    
    // Venues (view only)
    Route::get('/venues', [VenueController::class, 'userIndex'])->name('venues.index');
    Route::get('/venues/{venue}', [VenueController::class, 'userShow'])->name('venues.show');
    
    // Menu Items (view only)
    Route::get('/menu-items', [WeddingMenuItemController::class, 'userIndex'])->name('menu-items.index');
    Route::get('/menu-items/{menuItem}', [WeddingMenuItemController::class, 'userShow'])->name('menu-items.show');
});

// Admin Portal Routes (Full access)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Full CRUD for all resources
    Route::resource('orders', OrderController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('venues', VenueController::class);
    Route::resource('menu-items', WeddingMenuItemController::class);
    Route::resource('staffmembers', StaffMemberController::class);
    Route::resource('clients', ClientController::class);
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Optional: fallback 404 page
// Route::fallback(fn () => view('errors.404'));
