<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PricelistController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\PricelistController as AdminPricelistController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/pricelist', [PricelistController::class, 'index'])->name('pricelist');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Login Route (redirect to admin login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Admin Routes
Route::prefix('admin')->group(function () {
    // Login routes (public)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Services CRUD
        Route::resource('services', AdminServiceController::class)->names([
            'index' => 'admin.services.index',
            'create' => 'admin.services.create',
            'store' => 'admin.services.store',
            'edit' => 'admin.services.edit',
            'update' => 'admin.services.update',
            'destroy' => 'admin.services.destroy',
        ]);
        Route::post('/services/{service}/toggle-active', [AdminServiceController::class, 'toggleActive'])->name('admin.services.toggle-active');
        
        // Pricelist CRUD
        Route::get('/pricelist', [AdminPricelistController::class, 'index'])->name('admin.pricelist.index');
        
        // Categories
        Route::post('/pricelist/categories', [AdminPricelistController::class, 'storeCategory'])->name('admin.pricelist.categories.store');
        Route::put('/pricelist/categories/{category}', [AdminPricelistController::class, 'updateCategory'])->name('admin.pricelist.categories.update');
        Route::delete('/pricelist/categories/{category}', [AdminPricelistController::class, 'destroyCategory'])->name('admin.pricelist.categories.destroy');
        
        // Vehicle Models
        Route::post('/pricelist/vehicle-models', [AdminPricelistController::class, 'storeVehicleModel'])->name('admin.pricelist.vehicle-models.store');
        Route::put('/pricelist/vehicle-models/{vehicleModel}', [AdminPricelistController::class, 'updateVehicleModel'])->name('admin.pricelist.vehicle-models.update');
        Route::delete('/pricelist/vehicle-models/{vehicleModel}', [AdminPricelistController::class, 'destroyVehicleModel'])->name('admin.pricelist.vehicle-models.destroy');
        
        // Parts
        Route::post('/pricelist/parts', [AdminPricelistController::class, 'storePart'])->name('admin.pricelist.parts.store');
        Route::put('/pricelist/parts/{part}', [AdminPricelistController::class, 'updatePart'])->name('admin.pricelist.parts.update');
        Route::delete('/pricelist/parts/{part}', [AdminPricelistController::class, 'destroyPart'])->name('admin.pricelist.parts.destroy');
    });
});
