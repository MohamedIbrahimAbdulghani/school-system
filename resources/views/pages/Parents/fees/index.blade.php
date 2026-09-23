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
                <li class="breadcrumb-item"><a href="{{ route('parent.dashboard') }}" class="default-color">{{ trans('parent.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('parent.financial_report') }}</li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('parent.son_name') }}</th>
                                    <th>{{ trans('parent.amount') }}</th>
                                    <th>{{ trans('parent.remainder') }}</th>
                                    <th>{{ trans('student.Grade') }}</th>
                                    <th>{{ trans('student.classrooms') }}</th>
                                    <th>{{ trans('student.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($fee_invoices as $fee_invoice)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $fee_invoice->student->name }}</td>
                                        <td>{{ number_format($debit[$fee_invoice->student_id] ?? 0, 2) }}</td>
                                        <td> {{ number_format($balance[$fee_invoice->student_id]->balance ?? 0, 2) }}  </td>
                                        <td>{{ $fee_invoice->grade->name }}</td>
                                        <td>{{ $fee_invoice->classroom->name_class }}</td>
                                        <td>
                                            <a href="{{route('sons.receipt', $fee_invoice->student_id)}}"><button title="{{ trans('fees.edit') }}" class="mb-1 btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
