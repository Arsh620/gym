<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\GymClassController;
use App\Http\Controllers\ClassBookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\AttendanceController;

Route::prefix('v1')->group(function () {
    Route::apiResource('members', MemberController::class);
    Route::apiResource('memberships', MembershipController::class);
    Route::apiResource('plans', PlanController::class);
    Route::apiResource('trainers', TrainerController::class);
    Route::apiResource('gym-classes', GymClassController::class);
    Route::apiResource('class-bookings', ClassBookingController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('equipment', EquipmentController::class);
    Route::apiResource('attendances', AttendanceController::class);
});
