@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('fees.fee_invoices') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('fees.fee_invoices') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item active"><a href="{{ route('fees.index') }}" class="default-color">{{ trans('fees.fees') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.fee_invoices') }}</li>
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
                                                <th>{{ trans('fees.type_fees') }}</th>
                                                <th>{{ trans('fees.amount') }}</th>
                                                <th>{{ trans('student.academic_year') }}</th>
                                                <th>{{ trans('classrooms.Name_class') }}</th>
                                                <th>{{ trans('fees.Statement') }}</th>
                                                <th>{{ trans('student.Processes') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fee_invoices as $fee_invoice)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$fee_invoice->student->name}}</td>
                                            <td>{{$fee_invoice->fee->name}}</td>
                                            <td>{{ number_format($fee_invoice->amount, 2) }}</td>
                                            <td>{{$fee_invoice->grade->name}}</td>
                                            <td>{{$fee_invoice->classroom->name_class}}</td>
                                            <td>{{$fee_invoice->description}}</td>
                                            <td>
                                                <a href="{{ route('fee_invoices.edit', $fee_invoice->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#" ><i class="fa fa-trash"></i></button>
                                                <input type="hidden" value="{{ $fee_invoice->id }}">
                                            </td>
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
