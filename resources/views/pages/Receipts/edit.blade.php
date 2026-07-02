@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('fees.receipt_student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('fees.receipt_student') }} : <span style="color: red;">{{ $receipt_student->student->name }}</span></h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="default-color">{{ trans('student.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.receipt_student') }} : <span style="color: red;">{{ $receipt_student->student->name }}</span></li>
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
                <form action="{{ route('receipt_students.update', $receipt_student->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="debit" class="mr-sm-2">{{ trans('fees.amount') }}</label>
                            <div class="box">
                                <input type="number" class="form-control" name="debit" value="{{ $receipt_student->debit }}">
                                <input type="hidden" name="receipt_student_id" id="receipt_student_id" value="{{ $receipt_student->id }}">
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
                                <textarea class="form-control" name="description" rows="4">{{ $receipt_student->description }}</textarea>
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
                    <button type="submit" class="btn btn-primary mt-3">{{ trans('student.submit') }} </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
