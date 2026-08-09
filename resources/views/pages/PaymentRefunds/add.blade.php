@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('fees.Add_payment_vouchers_Processing') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('fees.Add_payment_vouchers_Processing') }} : <span style="color: red">{{ $student->name }}</span></h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="default-color">{{ trans('student.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.Add_payment_vouchers_Processing') }} : <span style="color: red"> {{ $student->name }} </span></li>
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
                <form action="{{ route('payment_refunds.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="amount" class="mr-sm-2">{{ trans('fees.amount_payment_vouchers_Processing') }}</label>
                            <div class="box">
                                <input type="number" class="form-control" name="amount" >
                                <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
                            </div>
                            @error('amount')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="balance_student" class="mr-sm-2">{{ trans('fees.balance_student') }}</label>
                            <div class="box">
                                <input  class="form-control" name="balance_student" value="{{ number_format($student->student_accounts->sum('debit') - $student->student_accounts->sum('credit'),2) }}" readonly>
                            </div>
                            @error('balance_student')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="description" class="mr-sm-2">{{ trans('fees.description_payment_vouchers_Processing') }}</label>
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
