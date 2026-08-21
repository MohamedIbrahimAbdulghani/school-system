@extends('layouts.master')
@section('css')

@section('title')
    {{trans('quizzes.edit_quizze')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('quizzes.edit_quizze')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('quizzes.index') }}" class="default-color">{{ trans('quizzes.quizzes') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('quizzes.edit_quizze') }}</li>
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
                <form action="{{route('quizzes.update', $quizz->id)}}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row setup-content">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="quiz_name_ar">{{trans('quizzes.quiz_name_ar')}}</label>
                                            <input type="hidden" name="id" id="id" value="{{ $quizz->id }}">
                                            <input type="text" name="quiz_name_ar"  class="form-control" value="{{ $quizz->getTranslation('name', 'ar') }}">
                                            @error('quiz_name_ar')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="quiz_name_en">{{trans('quizzes.quiz_name_en')}}</label>
                                            <input type="text" name="quiz_name_en"  class="form-control" value="{{ $quizz->getTranslation('name', 'en') }}">
                                            @error('quiz_name_en')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row form-group ">
                                        <div class="col">
                                            <label for="subject_id">{{trans('quizzes.subject')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="subject_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($subjects as $subject)
                                                    <option value="{{$subject->id}}" {{ $quizz->subject_id == $subject->id ? 'selected' : '' }}>{{$subject->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('subject_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="teacher_id">{{trans('quizzes.teacher_name')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="teacher_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}" {{ $quizz->teacher_id == $teacher->id ? 'selected' : '' }}>{{$teacher->name}}</option>
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

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="grade_id">{{trans('quizzes.grade')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="grade_id">
                                                <option value="">{{trans('student.Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}" {{ $quizz->grade_id == $grade->id ? 'selected' : '' }}>{{$grade->name}}</option>
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
                                            <label for="classroom_id">{{trans('student.classrooms')}}</label>
                                            <input type="hidden" name="classroom_id" value="{{ $quizz->classroom_id }}">
                                            <select class="my-1 custom-select mr-sm-2" name="classroom_id" disabled>
                                                <option value="">{{ $quizz->classroom->name_class }}</option>
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
                                            <label for="section_id">{{trans('student.section')}}</label>
                                                <input type="hidden" name="section_id" value="{{ $quizz->section_id }}">
                                            <select class="my-1 custom-select mr-sm-2" name="section_id" disabled>
                                                <option value="">{{ $quizz->section->name }}</option>
                                            </select>
                                            @error('section_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="mt-3 btn btn-success" type="submit">{{trans('quizzes.submit')}}</button>
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
