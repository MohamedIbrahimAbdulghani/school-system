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

{{-- Start Show Errors --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- End Show Errors --}}
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button" class="button x-small mb-2" data-toggle="modal" data-target="#add_class">{{trans('classrooms.add_class')}}</button>
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
                          <?php $counter = 1; ?>
                              <tr>
                                  @foreach($classrooms as $classroom)
                                      <td><?php echo $counter++; ?></td>
                                      <td>{{$classroom->name_class}}</td>
                                      <td>{{ $classroom->grade->getTranslation('name', app()->getLocale()) }}</td>
                                      <td>
                                          <button class='btn btn-info  btn-sm' data-toggle="modal"  title="{{trans('grades.edit')}}"><i class="fa fa-edit"></i></button>
                                          <button class='btn btn-danger btn-sm' data-toggle="modal"  title="{{trans('grades.delete')}}"><i class="fa fa-trash"></i></button>
                                      </td>
                                  @endforeach;
                              </tr>
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

{{-- Start Modal To Add Grade --}}
<div class="modal fade" id="add_class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('classrooms.add_class')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        {{-- add form--}}
        <form action="{{ route('classrooms.store') }}" method="post">
            @csrf
            <div class="card-body">
                {{-- use repeater list to add all form  --}}
                <div class="repeater">
                    <div data-repeater-list="List_Classes">
                        <div data-repeater-item>
                            <div class="row">
                                <div class="col">
                                    <label for="name_ar" class="mr-sm-2">{{trans('classrooms.Name_class')}} : </label>
                                    <input type="text" id="name_ar" name="class_ar" class="form-control" >
                                </div>
                                <div class="col">
                                    <label for="name_en" class="mr-sm-2">{{trans('classrooms.Name_class_en')}} : </label>
                                    <input type="text" id="name_en" name="name" class="form-control" >
                                </div>
                                <div class="col">
                                    <label for="name_en" class="mr-sm-2">{{trans('grades.stage_name_en')}} : </label>
                                    <div class="box">
                                        <select class="fancyselect" name="Grade_id">
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">{{ trans('classrooms.Processes') }} :</label>
                                    <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('classrooms.delete_row') }}" /> </div>
                            </div>

                            <button class="btn btn-success mt-3 mb-3" data-repeater-create type="button" value="">{{trans('classrooms.add_row')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">{{trans('grades.submit')}}</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades.close')}}</button>
        </div>
        </form>
        </div>
    </div>
    </div>
</div>
{{-- End Modal To Add Grade --}}

</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
