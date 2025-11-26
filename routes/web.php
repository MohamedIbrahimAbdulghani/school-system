<?php

use App\Http\Controllers\Grades\GradesController;
use App\Http\Controllers\Classrooms\ClassRoomsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;
use App\Http\Controllers\Sections\SectionController;

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // ==============================
    // Public Routes
    // ==============================طيب
    Route::get('/', function () {
        return view('welcome');
    });


    // 🟢 Login Routes (only for guests)
    Route::middleware('guest')->group(function () {
        // صفحة تسجيل الدخول
        Route::get('/login', [CustomAuthenticatedSessionController::class, 'create'])
            ->name('login');

        // معالجة تسجيل الدخول
        Route::post('/login', [CustomAuthenticatedSessionController::class, 'store']);


    });

    // ==============================
    // Authenticated Routes
    // ==============================
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // Grades Routes (require authentication)
        Route::resource('grades', GradesController::class);

        Route::delete('classrooms/bulkDestroy', [ClassRoomsController::class, 'bulkDestroy'])->name('classrooms.bulkDestroy');

        // ClassRoom Routes ( require authentication)
        Route::resource('classrooms', ClassRoomsController::class);

        // Logout Route
        Route::post('logout', [CustomAuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::resource('sections', SectionController::class);
        Route::get('classes/{id}', [SectionController::class, 'getClasses']);


    });

});
