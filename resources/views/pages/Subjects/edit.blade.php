@extends('layouts.master')
@section('css')

@section('title')
    {{trans('subjects.edit_subject')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('subjects.edit_subject')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('subjects.index') }}" class="default-color">{{ trans('subjects.subjects') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('subjects.edit_subject') }}</li>
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
                <form action="{{route('subjects.update',$subject->id)}}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row setup-content">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('subjects.subject_name_ar')}}</label>
                                            <input type="text" name="subject_name_ar"  class="form-control"  value="{{ $subject->getTranslation('name','ar') }}">
                                            @error('subject_name_ar')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('subjects.subject_name_en')}}</label>
                                            <input type="text" name="subject_name_en"  class="form-control" value="{{ $subject->getTranslation('name','en') }}">
                                            @error('subject_name_en')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="inputCity">{{trans('student.Grade')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="grade_id">
                                                <option value="">{{trans('student.Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}" {{ $subject->grade_id == $grade->id ? 'selected' : '' }}>{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('grade_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label>{{trans('student.classrooms')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="classroom_id" >
                                                <option value="{{ $subject->classroom_id }}">
                                                        {{ $subject->classroom->name_class }}
                                                    </option>
                                            </select>
                                            @error('classroom_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label>{{trans('subjects.teacher_name')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="teacher_id" >
                                                <option value="">{{trans('student.Choose')}}...</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}" {{ $subject->teacher_id == $teacher->id ? 'selected' : '' }}>{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="mt-3 btn btn-success" type="submit">{{trans('student.Save')}}</button>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')



@endsection
