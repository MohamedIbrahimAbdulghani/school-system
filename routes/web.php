<?php

use App\Http\Controllers\GradesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;


// Route::group(['middleware' => ['guest']], function() {
//     Route::get('/', function() {
//         return view('auth.login');
//     });
// });

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // ==============================
    // Public Routes
    // ==============================
    Route::get('/', function () {
        return view('welcome');
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

        // Logout Route
        Route::post('logout', [CustomAuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
