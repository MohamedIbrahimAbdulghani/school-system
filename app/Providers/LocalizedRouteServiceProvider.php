<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

class LocalizedRouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::group([
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        ], function () {
            // web routes
            require base_path('routes/web.php');

            // Fortify views (GET routes only)
            Route::get('/login', fn () => view('auth.login'))->name('login');
            Route::get('/register', fn () => view('auth.register'))->name('register');
            Route::get('/forgot-password', fn () => view('auth.forgot-password'))->name('password.request');
            Route::get('/reset-password/{token}', fn ($token) => view('auth.reset-password', ['token' => $token]))
                ->name('password.reset');
            Route::get('/verify-email', fn () => view('auth.verify-email'))->name('verification.notice');
            Route::get('/two-factor-challenge', fn () => view('auth.two-factor-challenge'))->name('two-factor.login');

            // POST routes (Fortify Controllers)
            Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
            Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
            Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        });
    }
}
