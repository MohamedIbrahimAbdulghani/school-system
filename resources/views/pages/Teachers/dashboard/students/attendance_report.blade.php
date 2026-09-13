@extends('layouts.master')
@section('css')

@section('title')
    {{trans('teacher.report_attendances')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('teacher.report_attendances')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item active"><a href="{{ route('attendance.report') }}" class="default-color">{{ trans('teacher.reports') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('teacher.report_attendances') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
        <div class="col-md-12">
            <div class="card card-statistics">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xl-12 ">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <form action="{{ route('attendance.search') }}" method="POST" autocomplete="off">
                                    @csrf
                                    <h6 style="font-family: 'Cairo', sans-serif; color:blue; font-size: 20px">{{ trans('teacher.search_information') }}</h6>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="student">{{ trans('student.students') }}</label>
                                                <select name="student_id" class="custom-select mr-sm-2 " >
                                                    {{-- <option value="0">{{ trans('student.Choose') }}...</option> --}}
                                                    <option value="0">{{ trans('student.all_students') }}</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="card-body datepicker-form">
                                                <div class="input-group" data-date-format="yyyy-mm-dd">
                                                    <input type="text" name="start_date" class="form-control range-from date-picker-default"  placeholder="{{ trans('student.start_date') }}" >
                                                    <span class="input-group-addon">{{ trans('student.to_date') }}</span>
                                                    <input type="text" name="end_date" class="form-control range-to date-picker-default" placeholder="{{ trans('student.end_date') }}" >
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('student.submit') }}</button>
                                </form>

                                {{-- Table For Show Search Result --}}
                                @isset($Students)
                                     <div class="table-responsive">
                                        <table id="datatable" class="table p-0 table-hover table-bordered" data-page-length="10" style="text-align: center">
                                            <thead>
                                                <tr class="alert-success">
                                                    <th>#</th>
                                                    <th>{{ trans('student.name') }}</th>
                                                    <th>{{ trans('student.Grade') }}</th>
                                                    <th>{{ trans('student.section') }}</th>
                                                    <th>{{ trans('attendances.attendance_date') }}</th>
                                                    <th>{{ trans('attendances.attendance_status') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Students as $Student)
                                                <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$Student->student->name}}</td>
                                                <td>{{$Student->grade->name}}</td>
                                                <td>{{$Student->section->name}}</td>
                                                <td>{{$Student->attendance_date}}</td>
                                                <td>
                                                    @if ( $Student->attendance_status == 0 )
                                                    <span class="btn-danger">{{ trans('attendances.absence') }}</span>
                                                    @else
                                                        <span class="btn-success">{{ trans('attendances.presence') }}</span>
                                                    @endif
                                                </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
