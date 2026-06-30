@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('fees.add_fee_invoice') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('fees.edit_invoice') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('fee_invoices.index') }}" class="default-color">{{ trans('fees.fee_invoices') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.edit_invoice') }}</li>
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
                <form class=" row mb-30" action="{{ route('fee_invoices.update', $fee_invoice->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="repeater">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col">
                                            <label for="student_id" class="mr-sm-2">{{ trans('student.name') }}</label>
                                            <input type="text" class="form-control"  value="{{ $fee_invoice->student->name }}" readonly>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('fees.fees_amount') }}</label>
                                            <input type="text" name="amount" value="{{ $fee_invoice->amount }}" class="form-control">
                                        </div>

                                        <div class="col">
                                            <label for="type_fees" class="mr-sm-2">{{ trans('fees.type_fees') }} </label>
                                            <div class="box">
                                                <select class="fancyselect" name="fee_id" required>
                                                    @foreach($fees as $fee)
                                                        <option value="{{ $fee->id }}"{{ $fee->id == $fee_invoice->fee_id ? 'selected' : '' }}>{{ $fee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="description" class="mr-sm-2">{{ trans('fees.Statement') }}</label>
                                            <div class="box">
                                                <input type="text" class="form-control" name="description" value="{{ $fee_invoice->description }}">
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    {{-- <input type="hidden" name="grade_id" value="{{$fee_invoice->grade_id}}">
                                    <input type="hidden" name="classroom_id" value="{{$fee_invoice->classroom_id}}"> --}}
                                    <input type="hidden" name="id" id="" value="{{ $fee_invoice->id }}" >

                                    <button type="submit" class="btn btn-primary">{{ trans('classrooms.submit') }} </button>
                                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
