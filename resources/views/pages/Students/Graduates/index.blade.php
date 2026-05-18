@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('student.list_Graduates') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('student.list_Graduates') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="default-color">{{ trans('student.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.list_Graduates') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="alert-success">#</th>
                                    <th class="alert-success">{{ trans('student.name') }}</th>
                                    <th class="alert-success">{{ trans('student.email') }}</th>
                                    <th class="alert-success">{{ trans('student.gender') }}</th>
                                    <th class="alert-success">{{ trans('student.Grade') }}</th>
                                    <th class="alert-success">{{ trans('student.classrooms') }}</th>
                                    <th class="alert-success">{{ trans('student.section') }}</th>
                                    <th class="alert-success">{{ trans('student.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
