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
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
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
                <button type="button" class="mb-2 button x-small" data-toggle="modal" data-target="#add_class">{{trans('classrooms.add_class')}}</button>
                <div class="table-responsive">
                    <table id="datatable" class="table p-0 table-striped table-bordered">
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
                          @foreach($classrooms as $classroom)
                              <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td>{{$classroom->name_class}}</td>
                                    <td>{{ $classroom->grade->getTranslation('name', app()->getLocale()) }}</td>
                                    <td>
                                        <button class='btn btn-info btn-sm' data-toggle="modal" data-target="#edit{{$classroom->id}}" title="{{trans('grades.edit')}}"><i class="fa fa-edit"></i></button>
                                        <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$classroom->id}}"  title="{{trans('classrooms.delete')}}"><i class="fa fa-trash"></i></button>
                                    </td>
                              </tr>

                            {{-- Start Modal To Edit Grade --}}
                            <div class="modal fade" id="edit{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('classrooms.edit_class')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    {{-- update form--}}
                                    <form action="{{ route('classrooms.update', $classroom->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{trans('classrooms.Name_class')}} : </label>
                                                <input type="text" name="class_name_ar" id="name"  class="form-control"  value="{{$classroom->name_class}}" >
                                                <input type="hidden" name="id" value={{$classroom->id}}>
                                            </div>
                                            <div class="col">
                                                <label for="name_en" class="mr-sm-2">{{trans('classrooms.Name_class_en')}} : </label>
                                                <input type="text" name="class_name_en" id="name_en" class="form-control" value="{{$classroom->getTranslation('name_class', 'en')}}"  >
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                                <label for="name_en" >{{trans('classrooms.Name_Grade')}} : </label>
                                                    <select class="form-control form-control-lg" name="grade_id">
                                                        <option value="{{ $classroom->grade->id }}">
                                                            {{ $classroom->grade->name }}
                                                        </option>
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">{{trans('grades.update')}}</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades.close')}}</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        {{-- End Modal To Edit Grade --}}

                        {{-- Start Modal To Delete Grade --}}
                            <div class="modal fade" id="delete{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('classrooms.delete_row')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    {{-- delete form--}}
                                    <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{trans('classrooms.Warning_class')}}</label>
                                                <input type="text" name="name" id="name"  class="form-control"  value="{{$classroom->name_class}}" readonly>
                                                <input type="hidden" name="id" value={{$classroom->id}}>
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
                        {{-- End Modal To Delete Grade --}}

                              @endforeach
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
    <div class="modal-dialog modal-lg" role="document">
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
                                    <input type="text" id="name_ar" name="class_name_ar" class="form-control" >
                                </div>
                                <div class="col">
                                    <label for="name_en" class="mr-sm-2">{{trans('classrooms.Name_class_en')}} : </label>
                                    <input type="text" id="name_en" name="class_name_en" class="form-control" >
                                </div>
                                <div class="col">
                                    <label for="name_en" class="mr-sm-2">{{trans('grades.stage_name_en')}} : </label>
                                    <div class="box">
                                        <select class="fancyselect" name="grade_id">
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
                        </div>
                    </div>
                    <div class="mt-20 row">
                        <div class="col-12">
                            <button class="mt-3 mb-3 btn btn-success" data-repeater-create type="button" value="">{{trans('classrooms.add_row')}}</button>
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
