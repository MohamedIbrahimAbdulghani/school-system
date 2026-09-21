@section('title')
{{ trans('parent.dashboard') }}
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
                        <h3 class="mb-3">{{ trans('welcome.welcome') }} : {{ auth('parent')->user()->name }} </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>


            <style>
                .student-card {
                    background: #ffffff;
                    border-radius: 10px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                    transition: all 0.3s ease;
                    border: 1px solid #e3e6f0;
                    border-top: 4px solid #84ba3f; /* Theme primary color */
                }
                
                .student-card:hover {
                    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
                    transform: translateY(-5px);
                }

                .student-avatar {
                    width: 90px;
                    height: 90px;
                    border-radius: 50%;
                    border: 3px solid #f8f9fa;
                    margin-top: -45px;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                    background-color: #fff;
                    object-fit: cover;
                }

                .card-header-bg {
                    height: 60px;
                    background-color: #f4f6f9;
                    border-radius: 10px 10px 0 0;
                }

                .student-info {
                    padding: 0 20px 20px;
                    text-align: center;
                }

                .student-name {
                    font-family: 'Cairo', sans-serif;
                    font-weight: 700;
                    font-size: 1.3rem;
                    color: #333;
                    margin-top: 15px;
                    margin-bottom: 5px;
                }

                .student-badge {
                    background-color: #e9ecef;
                    color: #495057;
                    padding: 4px 12px;
                    border-radius: 15px;
                    font-size: 0.85rem;
                    font-weight: 600;
                    display: inline-block;
                    margin-bottom: 20px;
                }

                .stats-container {
                    background-color: #f8f9fa;
                    border-radius: 8px;
                    padding: 15px;
                    margin-top: 15px;
                }

                .stat-row {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 8px 0;
                    border-bottom: 1px solid #e9ecef;
                }

                .stat-row:last-child {
                    border-bottom: none;
                }

                .stat-label {
                    color: #6c757d;
                    font-size: 0.9rem;
                    font-weight: 600;
                }

                .stat-value {
                    color: #343a40;
                    font-size: 0.95rem;
                    font-weight: 700;
                }

                .section-title {
                    font-family: 'Cairo', sans-serif;
                    font-weight: 700;
                    color: #333;
                    margin-bottom: 40px;
                    text-align: center;
                    position: relative;
                    padding-bottom: 15px;
                }

                .section-title::after {
                    content: '';
                    position: absolute;
                    bottom: 0;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 60px;
                    height: 4px;
                    background-color: #84ba3f;
                    border-radius: 2px;
                }
            </style>

            <section class="py-4">
                <div class="container">
                    <h3 class="section-title">{{ trans('parent.sons_registred') }}</h3>
                    <div class="row">
                        @if($sons->count() > 0)
                            @foreach($sons as $son)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="student-card">
                                        <div class="card-header-bg"></div>
                                        <div class="student-info">
                                            <img src="{{ URL::asset('assets/images/teacher.png') }}" alt="Student Avatar" class="student-avatar">
                                            <h4 class="student-name">{{ $son->name }}</h4>
                                            <span class="student-badge">{{ $son->grade->name ?? trans('parent.grade_not_specified') }}</span>
                                            
                                            <div class="stats-container">
                                                <div class="stat-row">
                                                    <span class="stat-label">{{ trans('parent.classroom') }}</span>
                                                    <span class="stat-value text-primary">{{ $son->classroom->name_class ?? '-' }}</span>
                                                </div>
                                                <div class="stat-row">
                                                    <span class="stat-label">{{ trans('parent.section') }}</span>
                                                    <span class="stat-value text-info">{{ $son->section->name ?? '-' }}</span>
                                                </div>
                                                <div class="stat-row">
                                                    <span class="stat-label">{{ trans('parent.number_of_exams') }}</span>
                                                    @php
                                                        $examsCount = \App\Models\Degree::where('student_id', $son->id)->count();
                                                    @endphp
                                                    <span class="stat-value {{ $examsCount > 0 ? 'text-success' : 'text-danger' }}">
                                                        {{ $examsCount }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <div class="alert alert-warning p-4" style="border-radius: 10px; font-family: 'Cairo', sans-serif; display: inline-block;">
                                    <i class="fas fa-info-circle fa-2x mb-3 text-warning"></i>
                                    <h4>{{ trans('parent.no_sons_registered') }}</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>



            <!-- Calendar -->

            {{-- <div class="mb-30">
                <livewire:StudentCalendar />
            </div> --}}
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
