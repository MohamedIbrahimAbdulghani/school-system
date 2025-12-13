@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Page Title</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
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
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('parent.Add_parent') }}</button><br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                        <tr class="table-success">
                            <th>#</th>
                            <th>{{ trans('parent.Email') }}</th>
                            <th>{{ trans('parent.Name_Father') }}</th>
                            <th>{{ trans('parent.National_ID_Father') }}</th>
                            <th>{{ trans('parent.Passport_ID_Father') }}</th>
                            <th>{{ trans('parent.Phone_Father') }}</th>
                            <th>{{ trans('parent.Job_Father') }}</th>
                            <th>{{ trans('parent.Processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($parent as $my_parent)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $my_parent->email }}</td>
                                <td>{{ $my_parent->father_name }}</td>
                                <td>{{ $my_parent->father_national_id }}</td>
                                <td>{{ $my_parent->father_passport_id }}</td>
                                <td>{{ $my_parent->father_phone }}</td>
                                <td>{{ $my_parent->father_job }}</td>
                                <td>
                                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('Grades_trans.Edit') }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
