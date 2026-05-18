@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('student.add_Graduate') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('student.add_Graduate') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="default-color">{{ trans('student.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.Graduate_students') }}</li>
                <li class="breadcrumb-item active">{{ trans('student.add_Graduate') }}</li>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('graduations.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{trans('student.Grade')}}</label>
                            <select class="custom-select mr-sm-2" name="grade_id" required>
                                <option selected disabled>{{trans('student.Choose')}}...</option>
                                    @foreach($Grades as $grade)
                                        <option value="{{$grade->id}}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}>{{$grade->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">{{trans('student.classrooms')}} : <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="classroom_id"  >
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="section_id">{{trans('student.section')}} : </label>
                            <select class="custom-select mr-sm-2" name="section_id"  >
                            </select>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">{{trans('student.submit')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
