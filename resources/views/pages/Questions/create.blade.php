@extends('layouts.master')
@section('css')

@section('title')
    {{trans('questions.add_question')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('questions.add_question')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('questions.index') }}" class="default-color">{{ trans('questions.questions_list') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('questions.add_question') }}</li>
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
                <form action="{{route('questions.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row setup-content">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="question_name">{{trans('questions.question_name')}}</label>
                                            <input type="text" name="question_name"  class="form-control" value="{{ old('question_name') }}">
                                            @error('question_name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="answers">{{trans('questions.answers')}}</label>
                                            <textarea name="answers" id="answers" cols="30" rows="3"  class="form-control" >{{ old('answers') }}</textarea>
                                            @error('answers')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="right_answer">{{trans('questions.right_answer')}}</label>
                                            <input type="text" name="right_answer"  class="form-control" value="{{ old('right_answer') }}">
                                            @error('right_answer')
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
                                            <label for="quizz_id">{{trans('questions.quizz_name')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="quizz_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($quizzes as $quizze)
                                                    <option value="{{$quizze->id}}" {{ old('quizz_id') == $quizze->id ? 'selected' : '' }}>{{$quizze->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('quizz_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="score">{{trans('questions.score')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="score">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                    <option value="5" >5</option>
                                                    <option value="10" >10</option>
                                                    <option value="15" >15</option>
                                                    <option value="20" >20</option>
                                            </select>
                                            @error('score')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="mt-3 btn btn-success" type="submit">{{trans('questions.submit')}}</button>
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
