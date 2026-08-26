<?php

namespace App\Providers;

use App\Repository\AttendancesRepositoryInterface;
use App\Repository\AttendancesRepository;
use App\Repository\FeeInvoicesRepositoryInterface;
use App\Repository\FeeInvoicesRepository;
use App\Repository\FeesRepository;
use App\Repository\FeesRepositoryInterface;
use App\Repository\GraduatedRepository;
use App\Repository\GraduatedRepositoryInterface;
use App\Repository\LibrariesRepository;
use App\Repository\LibrariesRepositoryInterface;
use App\Repository\OnlineClassesRepository;
use App\Repository\OnlineClassesRepositoryInterface;
use App\Repository\PaymentRefundsRepositoryInterface;
use App\Repository\PaymentRefundsRepository;
use App\Repository\StudentRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\StudentPromotionsRepositoryInterface;
use App\Repository\StudentPromotionsRepository;
use App\Repository\ReceiptStudentsRepositoryInterface;
use App\Repository\ReceiptStudentsRepository;
use App\Repository\ProcessingFeesRepositoryInterface;
use App\Repository\ProcessingFeesRepository;
use App\Repository\QuestionsRepository;
use App\Repository\QuestionsRepositoryInterface;
use App\Repository\QuizzesRepository;
use App\Repository\QuizzesRepositoryInterface;
use App\Repository\SubjectRepository;
use App\Repository\SubjectRepositoryInterface;
use App\Repository\TeacherRepository;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(StudentPromotionsRepositoryInterface::class, StudentPromotionsRepository::class);
        $this->app->bind(GraduatedRepositoryInterface::class, GraduatedRepository::class);
        $this->app->bind(FeesRepositoryInterface::class, FeesRepository::class);
        $this->app->bind(FeeInvoicesRepositoryInterface::class, FeeInvoicesRepository::class);
        $this->app->bind(ReceiptStudentsRepositoryInterface::class, ReceiptStudentsRepository::class);
        $this->app->bind(ProcessingFeesRepositoryInterface::class, ProcessingFeesRepository::class);
        $this->app->bind(PaymentRefundsRepositoryInterface::class, PaymentRefundsRepository::class);
        $this->app->bind(AttendancesRepositoryInterface::class, AttendancesRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(QuizzesRepositoryInterface::class, QuizzesRepository::class);
        $this->app->bind(QuestionsRepositoryInterface::class, QuestionsRepository::class);
        $this->app->bind(OnlineClassesRepositoryInterface::class, OnlineClassesRepository::class);
        $this->app->bind(LibrariesRepositoryInterface::class, LibrariesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}