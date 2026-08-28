@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('libraries.edit_book') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('libraries.edit_book') }} : <span style="color: red;">{{ $library->title }}</span></h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('libraries.index') }}" class="default-color">{{ trans('libraries.library') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('libraries.edit_book') }}</li>
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
                <form action="{{route('libraries.update', $library->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row setup-content">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>
                                    <input type="hidden" name="id" id="id" value="{{ $library->id }}">
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="title">{{trans('libraries.book_name')}}</label>
                                            <input type="text" name="title"  class="form-control" value="{{ $library->title }}">
                                            @error('title')
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
                                            <label for="grade_id">{{trans('libraries.grade')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="grade_id">
                                                <option value="">{{trans('student.Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option value="{{$grade->id}}" {{ $library->grade_id == $grade->id ? 'selected' : '' }}>{{$grade->name}}</option>
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
                                            <label for="classroom_id">{{trans('libraries.classroom')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="classroom_id" disabled>
                                                <option value="{{ $library->classroom_id }}">{{ $library->classroom->name_class }}</option>
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
                                            <label for="section_id">{{trans('libraries.section')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="section_id" disabled>
                                                <option value="{{ $library->section_id }}">{{ $library->section->name }}</option>
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

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="file_name">{{trans('libraries.file')}}</label>
                                            <input type="file" name="file_name"  class="form-control" accept="application/pdf" >
                                                <small class="text-muted"> {{ $library->file_name }} </small>
                                            @error('file_name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <button class="mt-3 btn btn-success" type="submit">{{trans('libraries.submit')}}</button>
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
