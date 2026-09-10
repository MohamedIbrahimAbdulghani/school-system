<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;

Route::middleware('guest:admin,teacher,student,parent')->group(function () {

    // اختيار نوع تسجيل الدخول
    Route::get('/login', [
        CustomAuthenticatedSessionController::class,
        'create'
    ])->name('login');


    // Login Form حسب نوع المستخدم
    Route::get('/login/{type}', [
        CustomAuthenticatedSessionController::class,
        'showLoginForm'
    ])->name('login.show');


    // تنفيذ تسجيل الدخول حسب نوع المستخدم
    Route::post('/login/{type}', [
        CustomAuthenticatedSessionController::class,
        'store'
    ])->name('login-type.store');


    // Register
    Route::get('/register', [
        CustomAuthenticatedSessionController::class,
        'register'
    ])->name('register');


    Route::post('/register', [
        CustomAuthenticatedSessionController::class,
        'storeRegister'
    ])->name('register.store');

});


// Logout
Route::post('/logout', [
    CustomAuthenticatedSessionController::class,
    'destroy'
])->name('logout');