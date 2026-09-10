<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Fee\FeeController;
use App\Http\Controllers\Library\LibraryController;
use App\Http\Controllers\OnlineClass\OnlineClassController;
use App\Http\Controllers\Section\SectionController;
use App\Http\Controllers\Parent\ParentController;
use App\Http\Controllers\Question\QuestionController;
use App\Http\Controllers\Quiz\QuizController;

use App\Http\Controllers\Student\FeeInvoiceController;
use App\Http\Controllers\Student\GraduatedController;
use App\Http\Controllers\Student\PromotionController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\ReceiptStudentController;
use App\Http\Controllers\Student\ProcessingFeeController;
use App\Http\Controllers\Student\PaymentRefundController;
use App\Http\Controllers\Student\AttendanceController;

use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Setting\SettingController;


Route::middleware('auth.role:admin')->group(function () {

    // ========================================
    // Dashboard
    // ========================================

    Route::get('admin/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');


    // ========================================
    // Grades
    // ========================================

    Route::resource('grades', GradeController::class);


    // ========================================
    // Classrooms
    // ========================================

    Route::delete(
        'classrooms/bulkDestroy',
        [ClassroomController::class, 'bulkDestroy']
    )->name('classrooms.bulkDestroy');

    Route::resource(
        'classrooms',
        ClassroomController::class
    );


    // ========================================
    // Sections
    // ========================================

    Route::get(
        'classes/{id}',
        [SectionController::class, 'getClasses']
    )->name('sections.getClasses');

    Route::resource(
        'sections',
        SectionController::class
    );


    // ========================================
    // Parents
    // ========================================

    Route::post(
        'parents/validate',
        [ParentController::class, 'validateField']
    )->name('parents.validate');

    Route::post(
        'parents/uploadParentAttachments/{id}',
        [ParentController::class, 'uploadParentAttachments']
    )->name('parents.uploadParentAttachments');

    Route::delete(
        'parents/deleteParentAttachments/{id}',
        [ParentController::class, 'deleteParentAttachments']
    )->name('parents.deleteParentAttachments');

    Route::get(
        'parents/downloadParentAttachment/{id}',
        [ParentController::class, 'downloadParentAttachment']
    )->name('parents.downloadParentAttachment');

    Route::get(
        'parents/previewParentAttachment/{id}',
        [ParentController::class, 'previewParentAttachment']
    )->name('parents.previewParentAttachment');

    Route::delete(
        'parents/bulkDestroy',
        [ParentController::class, 'bulkDestroy']
    )->name('parents.bulkDestroy');

    Route::resource(
        'parents',
        ParentController::class
    );


    // ========================================
    // Teachers
    // ========================================

    Route::delete(
        'teachers/bulkDestroy',
        [TeacherController::class, 'bulkDestroy']
    )->name('teachers.bulkDestroy');

    Route::resource(
        'teachers',
        TeacherController::class
    );


    // ========================================
    // Students
    // ========================================

    Route::delete(
        'students/deleteAllStudents',
        [StudentController::class, 'deleteAllStudents']
    )->name('students.deleteAllStudents');

    Route::post(
        'uploadStudentAttachments/{id}',
        [StudentController::class, 'uploadStudentAttachments']
    )->name('students.uploadStudentAttachments');

    Route::delete(
        'deleteStudentAttachments/{id}',
        [StudentController::class, 'deleteStudentAttachments']
    )->name('students.deleteStudentAttachments');

    Route::get(
        'students/downloadStudentAttachment/{id}',
        [StudentController::class, 'downloadStudentAttachment']
    )->name('students.downloadStudentAttachment');

    Route::get(
        'students/previewStudentAttachment/{id}',
        [StudentController::class, 'previewStudentAttachment']
    )->name('students.previewStudentAttachment');

    Route::resource(
        'students',
        StudentController::class
    );

    Route::get(
        'get_classrooms/{id}',
        [StudentController::class, 'getClassrooms']
    )->name('students.getClassrooms');

    Route::get(
        'get_sections/{id}',
        [StudentController::class, 'getSections']
    )->name('students.getSections');


    // ========================================
    // Promotions
    // ========================================

    Route::resource(
        'promotions',
        PromotionController::class
    );


    // ========================================
    // Graduations
    // ========================================

    Route::post(
        'graduations/restore/{id}',
        [GraduatedController::class, 'restore']
    )->name('graduations.restore');

    Route::post(
        'graduations/graduateStudent/{id}',
        [GraduatedController::class, 'graduateStudent']
    )->name('graduations.graduateStudent');

    Route::resource(
        'graduations',
        GraduatedController::class
    );


    // ========================================
    // Fees
    // ========================================

    Route::resource(
        'fees',
        FeeController::class
    );


    // ========================================
    // Fee Invoices
    // ========================================

    Route::resource(
        'fee_invoices',
        FeeInvoiceController::class
    );


    // ========================================
    // Receipts
    // ========================================

    Route::resource(
        'receipt_students',
        ReceiptStudentController::class
    );


    // ========================================
    // Processing Fees
    // ========================================

    Route::resource(
        'processing_fees',
        ProcessingFeeController::class
    );


    // ========================================
    // Payment Refunds
    // ========================================

    Route::resource(
        'payment_refunds',
        PaymentRefundController::class
    );


    // ========================================
    // Attendance
    // ========================================

    Route::resource(
        'attendances',
        AttendanceController::class
    );


    // ========================================
    // Subjects
    // ========================================

    Route::resource(
        'subjects',
        SubjectController::class
    );


    // ========================================
    // Quizzes
    // ========================================

    Route::resource(
        'quizzes',
        QuizController::class
    );


    // ========================================
    // Questions
    // ========================================

    Route::resource(
        'questions',
        QuestionController::class
    );


    // ========================================
    // Online Classes
    // ========================================

    Route::get(
        'createManual',
        [OnlineClassController::class, 'createManual']
    )->name('online_classes.createManual');

    Route::post(
        'storeManual',
        [OnlineClassController::class, 'storeManual']
    )->name('online_classes.storeManual');

    Route::resource(
        'online_classes',
        OnlineClassController::class
    );


    // ========================================
    // Libraries
    // ========================================

    Route::resource(
        'libraries',
        LibraryController::class
    );

    Route::get(
        'libraries/download/{id}',
        [LibraryController::class, 'download']
    )->name('libraries.download');


    // ========================================
    // Settings
    // ========================================

    Route::get(
        'settings',
        [SettingController::class, 'index']
    )->name('settings.index');

    Route::put(
        'settings',
        [SettingController::class, 'update']
    )->name('settings.update');

});