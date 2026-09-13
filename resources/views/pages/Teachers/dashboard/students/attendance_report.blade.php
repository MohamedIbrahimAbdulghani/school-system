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
                    <div class="col-xl-12 ">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <form action="{{ route('attendance.search') }}" method="POST">
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
                                                    <input type="text" name="start_date" class="form-control range-from date-picker-default" required placeholder="{{ trans('student.start_date') }}" >
                                                    <span class="input-group-addon">{{ trans('student.to_date') }}</span>
                                                    <input type="text" name="end_date" class="form-control range-to date-picker-default" required placeholder="{{ trans('student.end_date') }}" >
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('student.submit') }}</button>
                                </form>
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
