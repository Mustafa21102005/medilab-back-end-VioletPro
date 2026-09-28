<?php

use App\Http\Controllers\{
    AboutFeatureController,
    AboutSectionController,
    AppointmentController,
    AppointmentSectionController,
    AuthController,
    DepartmentController,
    DepartmentsSectionController,
    DoctorController,
    HeroSectionController,
    ServiceController,
    ServicesSectionController,
    StatController,
    WhyChooseItemController
};
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/me', [AuthController::class, 'me']);

    Route::apiResource('/stats', StatController::class)->except('show', 'index');

    Route::put('/why-choose-items/{why_choose_item}', [WhyChooseItemController::class, 'update']);

    Route::put('/hero', [HeroSectionController::class, 'update']);

    Route::put('/about', [AboutSectionController::class, 'update']);

    Route::put('/service-section', [ServicesSectionController::class, 'update']);

    Route::put('/department-section', [DepartmentsSectionController::class, 'update']);

    Route::apiResource('/departments', DepartmentController::class)->except('index');

    Route::apiResource('/doctors', DoctorController::class)->except('index', 'show');

    Route::apiResource('/services', ServiceController::class)->except('show', 'index');

    Route::put('/about-features/{aboutFeature}', [AboutFeatureController::class, 'update']);

    Route::apiResource('/appointments', AppointmentController::class)->except('store');

    Route::put('/appointment-section', [AppointmentSectionController::class, 'update']);

    Route::patch('/appointments/{appointment}/read', [AppointmentController::class, 'markAsRead']);

    Route::patch('/appointments/{appointment}/unread', [AppointmentController::class, 'markAsUnread']);
});

Route::get('/hero', [HeroSectionController::class, 'index']);

Route::get('/stats', [StatController::class, 'index']);

Route::get('/about', [AboutSectionController::class, 'index']);

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/departments', [DepartmentController::class, 'index']);

Route::post('/appointments', [AppointmentController::class, 'store']);

Route::get('/appointment-section', [AppointmentSectionController::class, 'index']);

Route::get('/doctors', [DoctorController::class, 'index']);
