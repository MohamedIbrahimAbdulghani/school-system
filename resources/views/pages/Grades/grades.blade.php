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
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('grades.title_page') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('grades.list_grades') }}</li>
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

            {{-- Start Show Error Messages --}}
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- End Show Error Messages --}}

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
                        <?php $counter = 1; ?>
                        @foreach($grades as $grade)
                        <tr>
                            <td><?php echo $counter++ ; ?></td>
                            <td>{{$grade->name}}</td>
                            <td>{{$grade->notes}}</td>
                            <td>
                                <button class='btn btn-info  btn-sm' data-toggle="modal" data-target="#edit{{$grade->id}}" title="{{trans('grades.edit')}}"><i class="fa fa-edit"></i></button>

                                <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$grade->id}}" title="{{trans('grades.delete')}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                        {{-- Start Modal To Edit Grade --}}
                            <div class="modal fade" id="edit{{$grade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('grades.edit_grade')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    {{-- update form--}}
                                    <form action="{{ route('grades.update', $grade->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{trans('grades.stage_name_ar')}} : </label>
                                                <input type="text" name="name" id="name"  class="form-control"  value="{{$grade->name}}" >

                                                <input type="hidden" name="id" value={{$grade->id}}>
                                            </div>
                                            <div class="col">
                                                <label for="name_en" class="mr-sm-2">{{trans('grades.stage_name_en')}} : </label>
                                                <input type="text" name="name_en" id="name_en" class="form-control" value="{{$grade->getTranslation('name', 'en')}}"  >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">{{trans('grades.notes')}} : </label>
                                            <textarea class="form-control" name="notes" id="notes"  rows="3"> {{$grade->notes}}</textarea>
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
                            <div class="modal fade" id="delete{{$grade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('grades.delete_grade')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    {{-- delete form--}}
                                    <form action="{{ route('grades.destroy', $grade->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{trans('grades.warning_grade')}}</label>
                                                <input type="text" name="name" id="name"  class="form-control"  value="{{$grade->name}}" readonly>
                                                <input type="hidden" name="id" value={{$grade->id}}>
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
                   </table>
                  </div>
            </div>
        </div>
    </div>

{{-- Start Modal To Add Grade --}}
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
                    <input type="text" id="name" name="name" class="form-control" >
                </div>
                <div class="col">
                    <label for="name_en" class="mr-sm-2">{{trans('grades.stage_name_en')}} : </label>
                    <input type="text" id="name_en" name="name_en" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{trans('grades.notes')}} : </label>
                <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"  rows="3"></textarea>
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



<!--{{-- Start Modal To Edit Grade --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="text" name="name" id="edit-name"  class="form-control"  >

                    <input type="hidden" name="id" id="edit-id">
                </div>
                <div class="col">
                    <label for="name_en" class="mr-sm-2">{{trans('grades.stage_name_en')}} : </label>
                    <input type="text" name="name_en" id="edit-name_en" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{trans('grades.notes')}} : </label>
                <textarea class="form-control" name="notes" id="edit-notes"  rows="3"></textarea>
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
{{-- End Modal To Edit Grade --}}-->


</div>
<!-- row closed -->
@endsection
@section('js')

{{-- <script>
    $(document).on('click', '.edit-button', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var name_en = $(this).data('name_en');
        var notes = $(this).data('notes');

        $('#edit-id').val(id);
        $('#edit-name').val(name);
        $('#edit-name_en').val(name_en);
        $('#edit-notes').val(notes);
    });
</script> --}}

@endsection
