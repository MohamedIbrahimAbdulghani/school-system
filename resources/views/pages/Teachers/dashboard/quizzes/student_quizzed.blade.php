@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('quizzes.show_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('quizzes.quizzes') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('quizze.index') }}" class="default-color">{{ trans('quizzes.quizzes') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('quizzes.quizzes_list') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    @if(session('success'))
        <div class="mb-2 alert alert-success" role="alert">
            <span>{{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right !important"></button>
        </div>
    @endif

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

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('quizzes.student_name') }}</th>
                                    <th>{{ trans('quizzes.last_question') }}</th>
                                    <th>{{ trans('quizzes.degree') }}</th>
                                    <th>{{ trans('quizzes.detection') }}</th>
                                    <th>{{ trans('quizzes.date_quizz') }}</th>
                                    <th>{{ trans('quizzes.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($degrees as $degree)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{$degree->student->name}}</td>
                                        <td>{{$degree->question_id}}</td>
                                        <td>{{$degree->score}}</td>
                                        @if($degree->abuse == 0)
                                            <td style="color: green">{{ trans('quizzes.no_found_detection') }}</td>
                                        @else
                                            <td style="color: red"> {{ trans('quizzes.found_detection') }} </td>
                                        @endif
                                        <td>{{$degree->date}}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#repeat_quizze{{ $degree->quizz_id }}" title="{{ trans('quizzes.reload') }}"> <i class="fas fa-repeat"></i></button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="repeat_quizze{{$degree->quizz_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('repeat.quizze')}}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('quizzes.requizze') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6>{{$degree->student->name}}</h6>
                                                        <input type="hidden" name="student_id" value="{{$degree->student_id}}">
                                                        <input type="hidden" name="quizz_id" value="{{$degree->quizz_id}}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('quizzes.close') }}</button>
                                                            <button type="submit"  class="btn btn-info">{{ trans ('quizzes.submit') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
