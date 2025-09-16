<?php

use App\Http\Controllers\GradesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;


Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Route::get('/', function()
	{
		return view('welcome');
	});

    // Auth routes
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });


    // start route
    Route::resource('grades', GradesController::class);



    Route::post('/logout', [CustomAuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

});
