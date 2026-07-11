@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('fees.processing_fees') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('fees.processing_fees') }} : <span style="color: red">{{ $student->name }}</span></h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="default-color">{{ trans('student.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.processing_fees') }} : <span style="color: red"> {{ $student->name }} </span></li>
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
                <form action="{{ route('receipt_students.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label for="debit" class="mr-sm-2">{{ trans('fees.amount') }}</label>
                            <div class="box">
                                <input type="number" class="form-control" name="debit" >
                                <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
                            </div>
                            @error('debit')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="mr-sm-2">{{ trans('fees.Statement') }}</label>
                            <div class="box">
                                <textarea class="form-control" name="description" rows="4"></textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">{{ trans('classrooms.submit') }} </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
