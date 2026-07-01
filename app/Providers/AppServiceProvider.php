<?php

namespace App\Providers;

use App\Repository\FeeInvoicesInterface;
use App\Repository\FeeInvoicesRepository;
use App\Repository\FeesRepository;
use App\Repository\FeesRepositoryInterface;
use App\Repository\GraduatedRepository;
use App\Repository\GraduatedRepositoryInterface;
use App\Repository\StudentRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\StudentPromotionsRepositoryInterface;
use App\Repository\StudentPromotionsRepository;
use App\Repository\ReceiptStudentsRepositoryInterface;
use App\Repository\ReceiptStudentsRepository;
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
        $this->app->bind(FeeInvoicesInterface::class, FeeInvoicesRepository::class);
        $this->app->bind(ReceiptStudentsRepositoryInterface::class, ReceiptStudentsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
