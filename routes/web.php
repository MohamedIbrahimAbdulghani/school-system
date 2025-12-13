<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Grades\GradesController;
use App\Http\Controllers\Classrooms\ClassRoomsController;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Parents\AddParentController;
use App\Http\Controllers\Parents\ParentAttachments;

// ======== المجموعة الرئيسية ========
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    // 'prefix' => '{locale}',
    // 'where' => ['locale' => 'ar|en'],
    // 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    
    // الصفحة الرئيسية
    Route::get('/', function () {
        return view('welcome');
    })->name('home');


    // روابط التسجيل
    Route::middleware('guest')->group(function () {
        Route::get('/login', [CustomAuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [CustomAuthenticatedSessionController::class, 'store']);
    });

    // الروابط بعد التسجيل
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        
        // Dashboard
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
        // 🔴 مهم: كل الـ resources لازم تبقى جوا middleware الـ auth
        Route::resource('grades', GradesController::class);
        Route::resource('classrooms', ClassRoomsController::class);
        Route::delete('classrooms/bulkDestroy', [ClassRoomsController::class, 'bulkDestroy'])->name('classrooms.bulkDestroy');
        Route::resource('sections', SectionController::class);
        Route::get('classes/{id}', [SectionController::class, 'getClasses']);
        
        // Logout
        Route::post('logout', [CustomAuthenticatedSessionController::class, 'destroy'])->name('logout');

        // Parents
        Route::resource('add_parent', AddParentController::class);
        Route::get('parent', [AddParentController::class, 'addParent']);
        Route::post('/add_parent/validate', [AddParentController::class, 'validateField'])->name('parents.validate'); //this route to make realtime validation about add parent
        
        Route::resource('parent_attachments', ParentAttachments::class);
    });
    
});