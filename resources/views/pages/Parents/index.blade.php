@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('parent.Parent_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('parent.Parent_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main-side.Parents') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('parent.Parent_list') }}</li>
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
                <a href="{{route('parents.create')}}"><button type="button" class="mb-2 button x-small">{{trans('parent.Add_parent')}}</button></a>

                    <button type="button" class="mb-2 button x-small" id="bulk-delete-btn"  style="background: #dc3545; border: 2px solid #dc3545;" data-toggle="modal" data-target="#delete_all_classes" >{{trans('classrooms.delete_checkbox')}}</button>

                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select_all_box" id="select_all_box"></th>
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
                                        <td><input type="checkbox" name="checkbox" id="checkbox" class="checkbox_row" value="{{$my_parent->id}}"></td>
                                        <td>{{ $i }}</td>
                                        <td>{{ $my_parent->email }}</td>
                                        <td>{{ $my_parent->father_name }}</td>
                                        <td>{{ $my_parent->father_national_id }}</td>
                                        <td>{{ $my_parent->father_passport_id }}</td>
                                        <td>{{ $my_parent->father_phone }}</td>
                                        <td>{{ $my_parent->father_job }}</td>
                                        <td>
                                            <a href="{{route('parents.edit', $my_parent->id)}}"><button title="{{ trans('parent.Edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$my_parent->id}}"  title="{{trans('parent.Delete')}}"><i class="fa fa-trash"></i></button>
                                            <a href="{{ route('parents.show',$my_parent->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>
                                        </td>
                                    </tr>
                                        {{-- Start Modal To Delete Parent --}}
                                            <div class="modal fade" id="delete{{$my_parent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('parent.Delete')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form action="{{ route('parents.destroy', $my_parent->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name" class="mr-sm-2">{{trans('classrooms.Warning_class')}}</label>
                                                                <input type="hidden" name="id" value={{$my_parent->id}}>
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
                                        {{-- End Modal To Delete Parent --}}
                                @endforeach
                                {{-- Start Modal To Delete All ClassRooms --}}
                                    <div class="modal fade" id="delete_all_classes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('classrooms.delete_rows')}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            {{-- delete form--}}
                                            <form id="bulk-delete-form"  action="{{ route('parents.bulkDestroy') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="ids" id="bulk-delete-ids">
                                                <button type="submit" class="btn btn-danger">{{trans('grades.delete')}}</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                {{-- End Modal To Delete All ClassRooms --}}
                            </tbody>
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
