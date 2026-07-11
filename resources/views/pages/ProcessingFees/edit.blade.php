@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('fees.edit_Fees_Processing') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('fees.edit_Fees_Processing') }} : <span style="color: red;">{{ $processing_fee->student->name }}</span></h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('processing_fees.index') }}" class="default-color">{{ trans('fees.Fees_Processing') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.edit_Fees_Processing') }} : <span style="color: red;">{{ $processing_fee->student->name }}</span></li>
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
                <form action="{{ route('processing_fees.update', $processing_fee->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="debit" class="mr-sm-2">{{ trans('fees.amount_Processing') }}</label>
                            <div class="box">
                                <input type="number" class="form-control" name="debit" value="{{ $processing_fee->amount }}">
                                <input type="hidden" name="processing_fee_id" id="processing_fee_id" value="{{ $processing_fee->id }}">
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
                            <label for="description" class="mr-sm-2">{{ trans('fees.description_Processing') }}</label>
                            <div class="box">
                                <textarea class="form-control" name="description" rows="4">{{ $processing_fee->description }}</textarea>
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
                    <button type="submit" class="btn btn-primary mt-3">{{ trans('section.Update') }} </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
