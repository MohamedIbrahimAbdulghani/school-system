@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('fees.fees') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('fees.fees') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('fees.index') }}" class="default-color">{{ trans('main-side.Accounts') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.fees') }}</li>
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
                    <a href="{{route('fees.create')}}"><button type="button" class="mb-2 button x-small">{{trans('fees.add_fees')}}</button></a>

                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('fees.fees_name') }}</th>
                                    <th>{{ trans('fees.fees_amount') }}</th>
                                    <th>{{ trans('student.Grade') }}</th>
                                    <th>{{ trans('student.classrooms') }}</th>
                                    <th>{{ trans('student.academic_year') }}</th>
                                    <th>{{ trans('fees.notes') }}</th>
                                    <th>{{ trans('student.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($fees as $fee)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $fee->name }}</td>
                                        <td>{{ number_format($fee->amount, 2) }}</td>
                                        <td>{{ $fee->grade->name }}</td>
                                        <td>{{ $fee->classroom->name_class }}</td>
                                        <td>{{ $fee->year }}</td>
                                        <td>{{ $fee->notes }}</td>
                                        <td>
                                            <a href="{{route('fees.edit', $fee->id)}}"><button title="{{ trans('fees.edit') }}" class="mb-1 btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <button class='mb-1 btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$fee->id}}"  title="{{trans('fees.delete')}}"><i class="fa fa-trash"></i></button>
                                            {{-- <a href="{{route('fees.show',$fee->id)}}"><button title="{{ trans('fees.show') }}" class="mb-1 btn btn-warning btn-sm"><i class="far fa-eye"></i></button></a> --}}
                                        </td>
                                    </tr>
                                    {{-- Start Modal To Delete students --}}
                                        <div class="modal fade" id="delete{{$fee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('fees.delete')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                {{-- delete form--}}
                                                <form action="{{ route('fees.destroy', $fee->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <input type="hidden" name="id" value={{$fee->id}}>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="name" class="mr-sm-2">{{trans('classrooms.Warning_class')}}</label>
                                                            <input type="text" readonly value="{{ $fee->name }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">{{trans('grades.delete')}}</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades.close')}}</button>
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    {{-- End Modal To Delete students --}}
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
