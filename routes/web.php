<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Grades\GradesController;
use App\Http\Controllers\Classrooms\ClassRoomsController;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Parents\AddParentController;
use App\Http\Controllers\Parents\ParentAttachments;
use App\Http\Controllers\Teachers\TeachersController;

// ======== المجموعة الرئيسية ========
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localeViewPath'],
], function () {

    // الصفحة الرئيسية
    Route::get('/', function () {
        return view('welcome');
    })->name('home');


    // روابط التسجيل
    Route::middleware('guest')->group(function () {
        Route::get('/login', [CustomAuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [CustomAuthenticatedSessionController::class, 'store']);
        Route::get('/register', [CustomAuthenticatedSessionController::class, 'register'])->name('register');
    });

    // الروابط بعد التسجيل
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

        // Dashboard
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');


        // Logout
        Route::post('logout', [CustomAuthenticatedSessionController::class, 'destroy'])->name('logout');

        // Grades
            Route::resource('grades', GradesController::class);

        // ClassRooms
            Route::delete('classrooms/bulkDestroy', [ClassRoomsController::class, 'bulkDestroy'])->name('classrooms.bulkDestroy');
            Route::resource('classrooms', ClassRoomsController::class);

        // Sections
            Route::get('classes/{id}', [SectionController::class, 'getClasses']);
            Route::resource('sections', SectionController::class);

        // Parents
            // Route::get('parent', [AddParentController::class, 'addParent']);
            Route::post('add_parent/validate', [AddParentController::class, 'validateField'])->name('parents.validate'); //this route to make realtime validation about add parent
            Route::resource('add_parent', AddParentController::class);

        // Teachers
            Route::resource('teachers', TeachersController::class);

        // Parents Attachments
            Route::resource('parent_attachments', ParentAttachments::class);
    });

});
