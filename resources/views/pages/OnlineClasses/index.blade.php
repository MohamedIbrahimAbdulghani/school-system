@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('online_classes.online_classes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('online_classes.online_classes') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('online_classes.index') }}" class="default-color">{{ trans('online_classes.online_classes') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('online_classes.direct_connection') }}</li>
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
                    <a href="{{route('online_classes.create')}}"><button type="button" class="mb-2 button x-small"> + {{trans('online_classes.add_automatic_meeting')}}</button></a>

                    <a href="{{route('online_classes.createManual')}}"><button type="button" style="background-color:#ffc107; border-color: #ffc107; color: black" class="mb-2 button x-small"> + {{trans('online_classes.add_manual_meeting')}}</button></a>

                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('online_classes.grade') }}</th>
                                    <th>{{ trans('online_classes.classroom') }}</th>
                                    <th>{{ trans('online_classes.section') }}</th>
                                    <th>{{ trans('online_classes.teacher') }}</th>
                                    <th>{{ trans('online_classes.topic') }}</th>
                                    <th>{{ trans('online_classes.start_at') }}</th>
                                    <th>{{ trans('online_classes.duration') }}</th>
                                    <th>{{ trans('online_classes.meeting_platform') }}</th>
                                    <th>{{ trans('online_classes.link') }}</th>
                                    <th>{{ trans('online_classes.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($online_classes as $online_class)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $online_class->grade->name }}</td>
                                        <td>{{ $online_class->classroom->name_class }}</td>
                                        <td>{{ $online_class->section->name }}</td>
                                        <td>{{ $online_class->user->name }}</td>
                                        <td>{{ $online_class->topic }}</td>
                                        <td>{{ $online_class->start_at }}</td>
                                        <td>{{ $online_class->duration }}</td>
                                        <td>{{ $online_class->meeting_platform }}</td>
                                        <td class="text-danger"><a href="{{ $online_class->join_url }}" target="_blank">{{trans('online_classes.link')}}</a></td>
                                        <td>
                                            <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$online_class->id}}"  title="{{trans('exams.delete')}}"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                        {{-- Start Modal To Delete students --}}
                                            <div class="modal fade" id="delete{{$online_class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('questions.Warning_question')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form action="{{ route('online_classes.destroy', $online_class->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <input type="hidden" name="id" value={{$online_class->id}}>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" readonly value="{{ $online_class->topic }}" class="form-control">
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
