<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Middleware\CheckGuard;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localeViewPath',
    ],
], function () {

    // الصفحة الرئيسية
    Route::get('/', function () {
        return view('welcome');
    })->name('home');


    // Dashboard الرئيسي
    Route::get('dashboard', function () {

        $guard = CheckGuard::guard();

        if (!$guard) {
            return redirect()->route('login');
        }

        return redirect()->route($guard . '.dashboard');

    })->middleware('auth.any')->name('dashboard');


    // Authentication
    require __DIR__.'/auth.php';


    // Admin Routes
    require __DIR__.'/admin.php';


    // Teacher Routes
    require __DIR__.'/teacher.php';


    // Student Routes
    require __DIR__.'/student.php';


    // Parent Routes
    require __DIR__.'/parent.php';

});
