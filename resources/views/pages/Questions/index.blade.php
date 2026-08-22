@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('questions.questions_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('questions.questions_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('questions.index') }}" class="default-color">{{ trans('questions.question') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('questions.questions_list') }}</li>
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
                    <a href="{{route('questions.create')}}"><button type="button" class="mb-2 button x-small">{{trans('questions.add_question')}}</button></a>

                    {{-- <button type="button" class="mb-2 button x-small" id="bulk-delete-btn"  style="background: #dc3545; border: 2px solid #dc3545;" data-toggle="modal" data-target="#delete_all_classes" >{{trans('classrooms.delete_checkbox')}}</button> --}}

                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('questions.question') }}</th>
                                    <th>{{ trans('questions.answers') }}</th>
                                    <th>{{ trans('questions.right_answer') }}</th>
                                    <th>{{ trans('questions.score') }}</th>
                                    <th>{{ trans('questions.quizz_name') }}</th>
                                    <th>{{ trans('questions.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($questions as $question)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $question->title }}</td>
                                        <td>{{ $question->answers }}</td>
                                        <td>{{ $question->right_answer }}</td>
                                        <td>{{ $question->score }}</td>
                                        <td>{{ $question->quizz->name }}</td>
                                        <td>
                                            <a href="{{route('questions.edit', $question->id)}}"><button title="{{ trans('exams.edit') }}" class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></button></a>

                                            <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$question->id}}"  title="{{trans('exams.delete')}}"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                        {{-- Start Modal To Delete students --}}
                                            <div class="modal fade" id="delete{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('questions.Warning_question')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form action="{{ route('questions.destroy', $question->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <input type="hidden" name="id" value={{$question->id}}>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" readonly value="{{ $question->title }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">{{trans('grades.delete')}}</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades.close')}}</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        {{-- End Modal To Delete students --}}
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
