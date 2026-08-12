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
            <h4 class="mb-0"> {{ trans('fees.edit_payment_vouchers_Processing') }} : <span style="color: red">{{ $paymentrefund->student->name }}</span></h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="default-color">{{ trans('student.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.edit_payment_vouchers_Processing') }} : <span style="color: red"> {{ $paymentrefund->student->name }} </span></li>
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
                <form action="{{ route('payment_refunds.update', $paymentrefund->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="amount" class="mr-sm-2">{{ trans('fees.amount_payment_vouchers_Processing') }}</label>
                            <div class="box">
                                <input type="number" class="form-control" name="amount" value="{{ $paymentrefund->amount }}" required>
                                <input type="hidden" name="paymentrefund_id" id="paymentrefund_id" value="{{ $paymentrefund->id }}">
                            </div>
                            @error('amount')
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
                                <textarea class="form-control" name="description" rows="4">{{ $paymentrefund->description }}</textarea>
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
                    <button type="submit" class="mt-3 btn btn-success">{{ trans('classrooms.submit') }} </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
