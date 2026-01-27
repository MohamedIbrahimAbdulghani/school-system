@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('teacher.teacher_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('teacher.teacher_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('teacher.teachers') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('teacher.teacher_list') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success mb-2" role="alert">
            <span>{{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right !important"></button>
        </div>
    @endif
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{route('teachers.create')}}"><button type="button" class="mb-2 button x-small">{{trans('teacher.add_teacher')}}</button></a>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                        <tr class="table-success">
                            <th>#</th>
                            <th>{{ trans('teacher.name_teacher') }}</th>
                            <th>{{ trans('teacher.gender') }}</th>
                            <th>{{ trans('teacher.joining_date') }}</th>
                            <th>{{ trans('teacher.specialization') }}</th>
                            <th>{{ trans('teacher.processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->gender->name }}</td>
                                <td>{{ $teacher->join_date }}</td>
                                <td>{{ $teacher->specialization->name }}</td>
                                <td>
                                    <button title="{{ trans('teacher.edit') }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$teacher->id}}"><i class="fa fa-edit"></i></button>
                                    
                                    <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$teacher->id}}"  title="{{trans('teacher.Delete')}}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                           {{-- Start Modal To Edit teacher --}}
                            <div class="modal fade" id="edit{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('teacher.edit_teacher')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    {{-- update form--}}
                                    <form action="{{ route('teachers.update', $teacher->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{trans('teacher.name_ar')}} : </label>
                                                <input type="text" name="teacher_name_ar" id="teacher_name_ar"  class="form-control"  value="{{$teacher->getTranslation('name', 'ar')}}" >
                                                <input type="hidden" name="id" value={{$teacher->id}}>
                                            </div>
                                            <div class="col">
                                                <label for="name_en" class="mr-sm-2">{{trans('teacher.name_en')}} : </label>
                                                <input type="text" name="teacher_name_en" id="name_en" class="form-control" value="{{$teacher->getTranslation('name', 'en')}}"  >
                                            </div>
                                        </div><br>
                                        <div class="row">
                                                <div class="col-6">
                                                    <label for="name_en" >{{trans('teacher.gender')}} : </label>
                                                    <select class="form-control form-control-lg"  style="height: auto;" name="gender">
                                                        <option value="{{ $teacher->gender->id }}">
                                                            {{ $teacher->gender->name }}
                                                        </option>
                                                        @foreach ($genders as $gender)
                                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="name_en" >{{trans('teacher.specialization')}} : </label>
                                                    <select class="form-control form-control-lg" style="height: auto;" name="specialization">
                                                        <option value="{{ $teacher->specialization->id }}">
                                                            {{ $teacher->specialization->name }}
                                                        </option>
                                                        @foreach ($specializations as $specialization)
                                                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>{{trans('teacher.join_date')}}</label>
                                                <input type="date" name="join_date" class="form-control" value="{{ $teacher->join_date }}">
                                                @error('join_date')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                @enderror
                                        </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{trans('teacher.address')}}</label>
                                        <textarea class="form-control mb-1" name="address" id="exampleFormControlTextarea1" rows="4">{{ $teacher->address }}</textarea>
                                        @error('address')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
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
                            {{-- End Modal To Edit teacher --}}


                        {{-- Start Modal To Delete teacher --}}
                        <div class="modal fade" id="delete{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('teacher.delete')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                {{-- delete form--}}
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="row">
                                        <div class="col">
                                            <label for="name" class="mr-sm-2">{{trans('classrooms.Warning_class')}}</label>
                                            <input type="hidden" name="id" value={{$teacher->id}}>
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
                    {{-- End Modal To Delete teacher --}}

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
