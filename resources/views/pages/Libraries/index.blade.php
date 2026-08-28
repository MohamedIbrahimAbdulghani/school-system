@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('libraries.books_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('libraries.books_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('libraries.index') }}" class="default-color">{{ trans('libraries.library') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('libraries.books_list') }}</li>
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
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{route('libraries.create')}}"><button type="button" class="mb-2 button x-small"> + {{trans('libraries.add_book')}}</button></a>

                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('libraries.book_name') }}</th>
                                    <th>{{ trans('libraries.teacher_name') }}</th>
                                    <th>{{ trans('libraries.grade') }}</th>
                                    <th>{{ trans('libraries.classroom') }}</th>
                                    <th>{{ trans('libraries.section') }}</th>
                                    <th>{{ trans('libraries.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($libraries as $library)
                                    <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>{{ $library->title }}</td>
                                    <td>{{ $library->teacher->name }}</td>
                                    <td>{{ $library->grade->name }}</td>
                                    <td>{{ $library->classroom->name_class }}</td>
                                    <td>{{ $library->section->name }}</td>
                                    <td>
                                        <a href="{{ route('libraries.download', $library->id)}}" class="mb-1 btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-download"></i></a>
                                        <a href="{{route('libraries.edit', $library->id)}}"><button title="{{ trans('libraries.Edit') }}" class="mb-1 btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <button class='mb-1 btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$library->id}}"  title="{{trans('libraries.Delete')}}"><i class="fa fa-trash"></i></button>
                                        </td>
                                </tr>
                                        {{-- Start Modal To Delete Library --}}
                                            <div class="modal fade" id="delete{{$library->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('libraries.Warning_book')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form action="{{ route('libraries.destroy', $library->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <input type="hidden" name="id" value={{$library->id}}>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" readonly value="{{ $library->title }}" class="form-control">
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
