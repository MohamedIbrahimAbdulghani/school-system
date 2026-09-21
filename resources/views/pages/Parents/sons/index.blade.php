@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('parent.sons_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('parent.sons_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('parent.dashboard') }}" class="default-color">{{ trans('parent.dashboard') }}</a></li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('student.name') }}</th>
                                    <th>{{ trans('student.email') }}</th>
                                    <th>{{ trans('student.gender') }}</th>
                                    <th>{{ trans('student.Grade') }}</th>
                                    <th>{{ trans('student.classrooms') }}</th>
                                    <th>{{ trans('student.section') }}</th>
                                    <th>{{ trans('student.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($sons as $son)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $son->name }}</td>
                                        <td>{{ $son->email }}</td>
                                        <td>{{ $son->gender->name }}</td>
                                        <td>{{ $son->grade->name }}</td>
                                        <td>{{ $son->classroom->name_class }}</td>
                                        <td>{{ $son->section->name }}</td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{trans('student.Processes')}}</a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{route('sons.result',$son->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;{{trans('parent.show_sons_results')}}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- {{-- <td>
                                            <a href="{{route('students.show',$student->id)}}"><button title="{{ trans('student.Show') }}" class="mb-1 btn btn-warning btn-sm"><i class="far fa-eye"></i></button></a>
                                            <a href="{{route('students.edit', $student->id)}}"><button title="{{ trans('student.Edit') }}" class="mb-1 btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <a href="{{route('fee_invoices.create')}}"><button title="{{ trans('fees.add_fees') }}" class="mb-1 btn btn-success btn-sm"><i class="fas fa-plus"></i></button></a>
                                            <button class='mb-1 btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$student->id}}"  title="{{trans('student.Delete')}}"><i class="fa fa-trash"></i></button>
                                        </td> --}} -->
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
