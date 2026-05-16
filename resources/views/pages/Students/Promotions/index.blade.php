@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('student.title') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main-side.Promotion_students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('student.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main-side.Promotion_students') }}</li>
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
                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        <h6 style="color: red;font-family: Cairo">{{trans('student.old_grade')}}</h6>

                    <form method="post" action="#">
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
                                <select class="custom-select mr-sm-2" name="classroom_id" required disabled>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('student.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required disabled>

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputState">{{trans('student.academic_year')}}</label>
                                <select class="my-1 custom-select mr-sm-2" name="academic_year">
                                    <option value="">{{trans('parent.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('academic_year')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <h6 style="color: red;font-family: Cairo">{{trans('student.new_grade')}}</h6>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('student.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id_new" >
                                    <option selected disabled>{{trans('student.Choose')}}...</option>
                                        @foreach($Grades as $grade)
                                            <option value="{{$grade->id}}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}>{{$grade->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('student.classrooms')}}: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id_new" required disabled>

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">:{{trans('student.section')}} </label>
                                <select class="custom-select mr-sm-2" name="section_id_new" required disabled>

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputState">{{trans('student.new_academic_year')}}</label>
                                <select class="my-1 custom-select mr-sm-2" name="new_academic_year">
                                    <option value="">{{trans('parent.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('new_academic_year')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
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
