<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\GymClassController;
use App\Http\Controllers\ClassBookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\WelcomeController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/plans', [PlanController::class, 'index']);
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [StripePaymentController::class, 'checkout']);

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Payment Routes
Route::get('/payment/success', [StripePaymentController::class, 'success']);
Route::get('/payment/cancel', [StripePaymentController::class, 'cancel']);

// Member Routes
Route::middleware('auth')->group(function () {
    Route::get('/welcome', [WelcomeController::class, 'index']);
    Route::get('/member/dashboard', [MemberDashboardController::class, 'index']);
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::resource('members', MemberController::class);
    Route::resource('memberships', MembershipController::class);
    Route::resource('plans', PlanController::class)->except(['index']);
    Route::resource('trainers', TrainerController::class);
    Route::resource('gym-classes', GymClassController::class);
    Route::resource('class-bookings', ClassBookingController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('equipment', EquipmentController::class);
    Route::resource('attendances', AttendanceController::class);
});
