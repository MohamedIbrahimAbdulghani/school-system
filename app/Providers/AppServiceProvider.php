<?php

namespace App\Providers;

use App\Repository\AttendanceRepositoryInterface;
use App\Repository\AttendanceRepository;
use App\Repository\FeeInvoiceRepositoryInterface;
use App\Repository\FeeInvoiceRepository;
use App\Repository\FeeRepository;
use App\Repository\FeeRepositoryInterface;
use App\Repository\GraduatedRepository;
use App\Repository\GraduatedRepositoryInterface;
use App\Repository\LibraryRepository;
use App\Repository\LibraryRepositoryInterface;
use App\Repository\OnlineClassRepository;
use App\Repository\OnlineClassRepositoryInterface;
use App\Repository\PaymentRefundRepositoryInterface;
use App\Repository\PaymentRefundRepository;
use App\Repository\StudentRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\StudentPromotionRepositoryInterface;
use App\Repository\StudentPromotionRepository;
use App\Repository\ReceiptStudentRepositoryInterface;
use App\Repository\ReceiptStudentRepository;
use App\Repository\ProcessingFeeRepositoryInterface;
use App\Repository\ProcessingFeeRepository;
use App\Repository\QuestionRepository;
use App\Repository\QuestionRepositoryInterface;
use App\Repository\QuizzRepository;
use App\Repository\QuizzRepositoryInterface;
use App\Repository\SettingRepository;
use App\Repository\SettingRepositoryInterface;
use App\Repository\SubjectRepository;
use App\Repository\SubjectRepositoryInterface;
use App\Repository\TeacherRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\ClassRoomRepository;
use App\Repository\ClassRoomRepositoryInterface;
use App\Repository\GradeRepository;
use App\Repository\GradeRepositoryInterface;
use App\Repository\ParentRepository;
use App\Repository\ParentRepositoryInterface;
use App\Repository\SectionRepository;
use App\Repository\SectionRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClassRoomRepositoryInterface::class,ClassRoomRepository::class);
        $this->app->bind(GradeRepositoryInterface::class,GradeRepository::class);
        $this->app->bind(SectionRepositoryInterface::class,SectionRepository::class);
        $this->app->bind(ParentRepositoryInterface::class,ParentRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(StudentPromotionRepositoryInterface::class, StudentPromotionRepository::class);
        $this->app->bind(GraduatedRepositoryInterface::class, GraduatedRepository::class);
        $this->app->bind(FeeRepositoryInterface::class, FeeRepository::class);
        $this->app->bind(FeeInvoiceRepositoryInterface::class, FeeInvoiceRepository::class);
        $this->app->bind(ReceiptStudentRepositoryInterface::class, ReceiptStudentRepository::class);
        $this->app->bind(ProcessingFeeRepositoryInterface::class, ProcessingFeeRepository::class);
        $this->app->bind(PaymentRefundRepositoryInterface::class, PaymentRefundRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(QuizzRepositoryInterface::class, QuizzRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(OnlineClassRepositoryInterface::class, OnlineClassRepository::class);
        $this->app->bind(LibraryRepositoryInterface::class, LibraryRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}