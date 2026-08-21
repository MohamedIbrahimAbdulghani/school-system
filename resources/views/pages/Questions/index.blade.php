@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('quizzes.quizzes') }}
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
                <li class="breadcrumb-item"><a href="{{ route('quizzes.index') }}" class="default-color">{{ trans('quizzes.quizzes') }}</a></li>
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
                    <a href="{{route('quizzes.create')}}"><button type="button" class="mb-2 button x-small">{{trans('quizzes.add_quizze')}}</button></a>

                    {{-- <button type="button" class="mb-2 button x-small" id="bulk-delete-btn"  style="background: #dc3545; border: 2px solid #dc3545;" data-toggle="modal" data-target="#delete_all_classes" >{{trans('classrooms.delete_checkbox')}}</button> --}}

                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('quizzes.quizze_name') }}</th>
                                    <th>{{ trans('quizzes.grade') }}</th>
                                    <th>{{ trans('quizzes.classroom') }}</th>
                                    <th>{{ trans('quizzes.section') }}</th>
                                    <th>{{ trans('quizzes.teacher_name') }}</th>
                                    <th>{{ trans('quizzes.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($questions as $quizze)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $quizze->name }}</td>
                                        <td>{{ $quizze->grade->name }}</td>
                                        <td>{{ $quizze->classroom->name_class }}</td>
                                        <td>{{ $quizze->section->name }}</td>
                                        <td>{{ $quizze->teacher->name }}</td>
                                        <td>
                                            <a href="{{route('quizzes.edit', $quizze->id)}}"><button title="{{ trans('exams.edit') }}" class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></button></a>

                                            <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$quizze->id}}"  title="{{trans('exams.delete')}}"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                        {{-- Start Modal To Delete students --}}
                                            <div class="modal fade" id="delete{{$quizze->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('subjects.delete')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form action="{{ route('quizzes.destroy', $quizze->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <input type="hidden" name="id" value={{$quizze->id}}>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name" class="mr-sm-2">{{trans('classrooms.Warning_class')}}</label>
                                                                <input type="text" readonly value="{{ $quizze->name }}" class="form-control">
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
