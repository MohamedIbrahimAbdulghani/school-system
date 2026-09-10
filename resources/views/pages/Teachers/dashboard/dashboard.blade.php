@section('title')
{{ trans('teacher.dashboard') }}
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-2">{{ trans('welcome.welcome') }} : {{ auth('teacher')->user()->name }} </h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                {{-- Student Widget --}}
                <div class="col-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.student_count') }}</p>
                                    <h4>{{ $count_students }}</h4>
                                </div>
                            </div>
                                <p class="pt-3 mt-2 mb-0 text-muted border-top">
                                    <i class="mr-1 fas fa-binoculars" aria-hidden="true"></i> <a href="{{ route('student.index') }}" target="_blank" style="color: red; ">{{ trans('dashboard.show_data') }}</a>
                                </p>
                        </div>
                    </div>
                </div>
                {{-- Section Widget --}}
                <div class="col-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.section_count') }}</p>
                                    <h4>{{ $count_sections }}</h4>
                                </div>
                            </div>
                                <p class="pt-3 mt-2 mb-0 text-muted border-top">
                                    <i class="mr-1 fas fa-binoculars" aria-hidden="true"></i> <a href="{{ route('sections.index') }}" target="_blank" style="color: red; ">{{ trans('dashboard.show_data') }}</a>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Calendar --}}
            <div class="mb-30">
                <livewire:calendar />
            </div>

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
