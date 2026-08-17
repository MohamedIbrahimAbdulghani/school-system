@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('attendances.attendance_for_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('attendances.attendance_for_students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item active"><a href="{{ route('attendances.index') }}" class="default-color">{{ trans('attendances.title_page') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('attendances.attendance_for_students') }}</li>
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
            <h5 style="color: red">{{ trans('attendances.date') }} : {{ date('Y-m-d') }}</h5>
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 ">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <form action="{{ route('attendances.store') }}" method="POST">
                                    @csrf
                                    <div class="table-responsive">
                                        <table id="datatable" class="table p-0 table-hover table-bordered" data-page-length="10" style="text-align: center">
                                            <thead>
                                                <tr class="alert-success">
                                                    <th>#</th>
                                                    <th>{{ trans('student.name') }}</th>
                                                    <th>{{ trans('student.email') }}</th>
                                                    <th>{{ trans('student.gender') }}</th>
                                                    <th>{{ trans('student.Grade') }}</th>
                                                    <th>{{ trans('student.classrooms') }}</th>
                                                    <th>{{ trans('student.section') }}</th>
                                                    <th>{{ trans('student.Processes') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->gender->name}}</td>
                                                <td>{{$student->grade->name}}</td>
                                                <td>{{$student->classroom->name_class}}</td>
                                                <td>{{$student->section->name}}</td>
                                                <td>
                                                    @if(isset($student->attendance()->where('attendance_date', date('Y-m-d'))->latest()->first()->student_id))
                                                        <label class="block font-semibold text-gray-500 sm:border-r sm:pr-4">
                                                            <input name="attendances[{{ $student->id }}]" disabled {{ $student->attendance()->latest()->first()->attendance_status    == 1 ? 'checked' : '' }}  class="leading-tight" type="radio" value="presence">
                                                            <span class="text-success">{{ trans('attendances.presence') }}</span>
                                                        </label>

                                                        <label class="block ml-4 font-semibold text-gray-500 ">
                                                            <input name="attendances[{{ $student->id }}]" disabled {{ $student->attendance()->latest()->first()->attendance_status    == 0 ? 'checked' : '' }}  class="leading-tight" type="radio" value="absence">
                                                            <span class="text-danger">{{ trans('attendances.absence') }}</span>
                                                        </label>
                                                    @else
                                                        <label class="block font-semibold text-gray-500 sm:border-r sm:pr-4">
                                                            <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio" value="presence">
                                                            <span class="text-success">{{ trans('attendances.presence') }}</span>
                                                        </label>

                                                        <label class="block ml-4 font-semibold text-gray-500 ">
                                                            <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio" value="absence">
                                                            <span class="text-danger">{{ trans('attendances.absence') }}</span>
                                                        </label>
                                                    @endif

                                                    <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                                    <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                                    <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                                                    <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                                </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <button type="submit"  class="btn btn-success">{{ trans('section.submit') }}</button>
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
