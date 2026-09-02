@section('title')
{{ trans('dashboard.Dashboard') }}
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
                        <h4 class="mb-0">{{ trans('dashboard.Dashboard') }}</h4>
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
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
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
                                    <h4>{{ App\Models\Student::count() }}</h4>
                                </div>
                            </div>
                                <p class="pt-3 mt-2 mb-0 text-muted border-top">
                                    <i class="mr-1 fas fa-binoculars" aria-hidden="true"></i> <a href="{{ route('students.index') }}" target="_blank" style="color: red; ">{{ trans('dashboard.show_data') }}</a>
                                </p>
                        </div>
                    </div>
                </div>
                {{-- Teacher Widget --}}
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.teacher_count') }}</p>
                                    <h4>{{ App\Models\Teacher::count() }}</h4>
                                </div>
                            </div>
                                <p class="pt-3 mt-2 mb-0 text-muted border-top">
                                    <i class="mr-1 fas fa-binoculars" aria-hidden="true"></i> <a href="{{ route('teachers.index') }}" target="_blank" style="color: red; ">{{ trans('dashboard.show_data') }}</a>
                                </p>
                        </div>
                    </div>
                </div>
                {{-- Parent Widget --}}
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.parent_count') }}</p>
                                    <h4>{{ App\Models\MyParent::count() }}</h4>
                                </div>
                            </div>
                                <p class="pt-3 mt-2 mb-0 text-muted border-top">
                                    <i class="mr-1 fas fa-binoculars" aria-hidden="true"></i> <a href="{{ route('parents.index') }}" target="_blank" style="color: red; ">{{ trans('dashboard.show_data') }}</a>
                                </p>
                        </div>
                    </div>
                </div>
                {{-- Classroom Widget --}}
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.classroom_count') }}</p>
                                    <h4>{{ App\Models\Classroom::count() }}</h4>
                                </div>
                            </div>
                                <p class="pt-3 mt-2 mb-0 text-muted border-top">
                                    <i class="mr-1 fas fa-binoculars" aria-hidden="true"></i> <a href="{{ route('classrooms.index') }}" target="_blank" style="color: red; ">{{ trans('dashboard.show_data') }}</a>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h4 class="card-title">{{ trans('dashboard.last_tracking') }}</h4>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                    href="#students" role="tab" aria-controls="students"
                                                    aria-selected="true"> {{ trans('dashboard.student') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                    role="tab" aria-controls="teachers" aria-selected="false">{{ trans('dashboard.teacher') }}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                    role="tab" aria-controls="parents" aria-selected="false">{{ trans('dashboard.parent') }}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                                    role="tab" aria-controls="fee_invoices" aria-selected="false">{{ trans('dashboard.fee_invoices') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    {{-- Students Tab Content --}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                        <div class="table-responsive">
                                            <table  class="table table-striped table-hover"  style="text-align: center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ trans('student.name') }}</th>
                                                        <th>{{ trans('student.email') }}</th>
                                                        <th>{{ trans('student.gender') }}</th>
                                                        <th>{{ trans('student.Grade') }}</th>
                                                        <th>{{ trans('student.classrooms') }}</th>
                                                        <th>{{ trans('student.section') }}</th>
                                                        <th>{{ trans('dashboard.date') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @forelse (App\Models\Student::latest()->take(5)->get() as $student)
                                                        <tr>
                                                            <?php $i++; ?>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{ $student->email }}</td>
                                                            <td>{{ $student->gender->name }}</td>
                                                            <td>{{ $student->grade->name }}</td>
                                                            <td>{{ $student->classroom->name_class }}</td>
                                                            <td>{{ $student->section->name }}</td>
                                                            <td class="text-success">{{ $student->created_at->format('Y-m-d') }}</td>
                                                        </tr>
                                                        @empty
                                                            <td colspan="6" class="alert-danger">{{ trans('dashboard.no_students') }}</td>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- Teachers Tab Content --}}
                                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" style="text-align: center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ trans('teacher.name_teacher') }}</th>
                                                        <th>{{ trans('teacher.gender') }}</th>
                                                        <th>{{ trans('teacher.joining_date') }}</th>
                                                        <th>{{ trans('teacher.specialization') }}</th>
                                                        <th>{{ trans('dashboard.date') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @forelse (App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                        <tr>
                                                            <?php $i++; ?>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $teacher->name }}</td>
                                                            <td>{{ $teacher->gender->name }}</td>
                                                            <td>{{ $teacher->join_date }}</td>
                                                            <td>{{ $teacher->specialization->name }}</td>
                                                            <td class="text-success">{{ $teacher->created_at->format('Y-m-d') }}</td>
                                                        </tr>
                                                        @empty
                                                            <td colspan="6" class="alert-danger">{{ trans('dashboard.no_teachers') }}</td>
                                                    @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    {{-- Parents Tab Content --}}
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                        <div class="table-responsive">
                                            <table  class="table table-striped table-hover"  style="text-align: center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ trans('parent.Name_Father') }}</th>
                                                        <th>{{ trans('parent.Email') }}</th>
                                                        <th>{{ trans('parent.National_ID_Father') }}</th>
                                                        <th>{{ trans('parent.Phone_Father') }}</th>
                                                        <th>{{ trans('dashboard.date') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @forelse (App\Models\MyParent::latest()->take(5)->get() as $my_parent)
                                                        <tr>
                                                            <?php $i++; ?>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $my_parent->father_name }}</td>
                                                            <td>{{ $my_parent->email }}</td>
                                                            <td>{{ $my_parent->father_national_id }}</td>
                                                            <td>{{ $my_parent->father_phone }}</td>
                                                            <td class="text-success">{{ $my_parent->created_at->format('Y-m-d') }}</td>
                                                        </tr>
                                                        @empty
                                                            <td colspan="6" class="alert-danger">{{ trans('dashboard.no_parents') }}</td>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- Fee Invoices Tab Content --}}
                                    <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                        <div class="table-responsive">
                                            <table  class="table table-striped table-hover"  style="text-align: center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ trans('fees.invoice_date') }}</th>
                                                        <th>{{ trans('student.name') }}</th>
                                                        <th>{{ trans('fees.grade_id_Processing') }}</th>
                                                        <th>{{ trans('fees.class_id_Processing') }}</th>
                                                        <th>{{ trans('fees.fee_id_payment_vouchers_Processing') }}</th>
                                                        <th>{{ trans('fees.amount') }}</th>
                                                        <th>{{ trans('dashboard.date') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @forelse (App\Models\FeeInvoice::latest()->take(5)->get() as $fee_invoice)
                                                        <tr>
                                                            <?php $i++; ?>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $fee_invoice->invoice_date }}</td>
                                                            <td>{{ $fee_invoice->student->name }}</td>
                                                            <td>{{ $fee_invoice->grade_id }}</td>
                                                            <td>{{ $fee_invoice->classroom->name_class }}</td>
                                                            <td>{{ $fee_invoice->fee->name }}</td>
                                                            <td>{{ $fee_invoice->amount }}</td>
                                                            <td class="text-success">{{ $fee_invoice->created_at->format('Y-m-d') }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8" class="alert-danger">{{ trans('dashboard.no_fee_invoices') }}</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
