@extends('layouts.master')
@section('css')

@section('title')
{{trans('grades.title_page')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('grades.title_page') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ trans('grades.title_page') }}</li>
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
                <button type="button" class="button x-small mb-2" data-toggle="modal" data-target="#exampleModal">{{trans('grades.add_grade')}}</button>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>{{trans('grades.name')}}</th>
                              <th>{{trans('grades.notes')}}</th>
                              <th>{{trans('grades.processes')}}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($grades as $grade)
                        <?php $counter = 0 ?>
                        <tr>
                            <td><?php echo $counter++ ?></td>
                            <td>{{$grade->name}}</td>
                            <td>{{$grade->note}}</td>
                            <td>
                                <button class='btn btn-info btn-sm' data-toggle="modal" data-target="#edit{{$grade->id}}" title="{{trans('grades.edit')}}"><i class="fa fa-edit"></i></button>
                                <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$grade->id}}" title="{{trans('grades.delete')}}"></button>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>#</th>
                            <th>{{trans('grades.name')}}</th>
                            <th>{{trans('grades.notes')}}</th>
                            <th>{{trans('grades.processes')}}</th>
                          </tr>
                      </tfoot>
                   </table>
                  </div>
            </div>
        </div>
    </div>


    {{-- modal --}}
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('grades.add_grade')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          {{-- add form--}}
          <form action="{{ route('grades.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="name" class="mr-sm-2">{{trans('grades.stage_name_ar')}} : </label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="col">
                    <label for="name_en" class="mr-sm-2">{{trans('grades.stage_name_en')}} : </label>
                    <input type="text" id="name_en" name="name_en" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{trans('grades.notes')}} : </label>
                <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"  rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">{{trans('grades.submit')}}</button>
            </div>
          </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades.close')}}</button>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
