@extends('layouts.master')
@section('css')

@section('title')
    {{trans('classrooms.title_page')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('classrooms.List_classes')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"> {{trans('classrooms.title_page')}}</a></li>
                <li class="breadcrumb-item active">{{trans('classrooms.List_classes')}}</li>
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
                <button type="button" class="button x-small mb-2" data-toggle="modal" data-target="#exampleModal">{{trans('classrooms.add_class')}}</button>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>{{trans('classrooms.Name_class')}}</th>
                              <th>{{trans('classrooms.Name_Grade')}}</th>
                              <th>{{trans('classrooms.Processes')}}</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{trans('classrooms.Name_class')}}</th>
                            <th>{{trans('classrooms.Name_Grade')}}</th>
                            <th>{{trans('classrooms.Processes')}}</th>
                          </tr>
                      </tfoot>
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
