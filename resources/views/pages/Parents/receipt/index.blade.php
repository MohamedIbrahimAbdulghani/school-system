@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('fees.receipts') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('fees.receipts') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('sons.fees') }}" class="default-color">{{ trans('parent.financial_report') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('parent.sons_list') }}</li>
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
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table p-0 table-hover table-bordered" data-page-length="10" style="text-align: center">
                                        <thead>
                                            <tr class="alert-success">
                                                <th>#</th>
                                                <th>{{ trans('student.name') }}</th>
                                                <th>{{ trans('fees.amount') }}</th>
                                                <th>{{ trans('fees.Statement') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($receipt_students as $receipt_student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$receipt_student->student->name}}</td>
                                            <td>{{ number_format($receipt_student->debit, 2) }}</td>
                                            <td>{{$receipt_student->description}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
