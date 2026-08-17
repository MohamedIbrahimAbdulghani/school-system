@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('teacher.teacher_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('teacher.teacher_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('teacher.teachers') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('teacher.teacher_list') }}</li>
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
                    <a href="{{route('subjects.create')}}"><button type="button" class="mb-2 button x-small">{{trans('subjects.add_subject')}}</button></a>

                    <button type="button" class="mb-2 button x-small" id="bulk-delete-btn"  style="background: #dc3545; border: 2px solid #dc3545;" data-toggle="modal" data-target="#delete_all_classes" >{{trans('classrooms.delete_checkbox')}}</button>

                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('teacher.name_teacher') }}</th>
                                    <th>{{ trans('teacher.gender') }}</th>
                                    <th>{{ trans('teacher.joining_date') }}</th>
                                    <th>{{ trans('teacher.specialization') }}</th>
                                    <th>{{ trans('teacher.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($subjects as $teacher)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->gender->name }}</td>
                                        <td>{{ $teacher->join_date }}</td>
                                        <td>{{ $teacher->specialization->name }}</td>
                                        <td>
                                            <a href="{{route('teachers.edit', $teacher->id)}}"><button title="{{ trans('teacher.edit') }}" class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></button></a>

                                            <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$teacher->id}}"  title="{{trans('teacher.Delete')}}"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>


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
