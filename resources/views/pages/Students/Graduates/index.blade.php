@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('student.list_Graduates') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('student.list_Graduates') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="default-color">{{ trans('student.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.Graduate_students') }}</li>
                <li class="breadcrumb-item active">{{ trans('student.list_Graduates') }}</li>
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
                                    <th class="alert-success">#</th>
                                    <th class="alert-success">{{ trans('student.name') }}</th>
                                    <th class="alert-success">{{ trans('student.email') }}</th>
                                    <th class="alert-success">{{ trans('student.gender') }}</th>
                                    <th class="alert-success">{{ trans('student.Grade') }}</th>
                                    <th class="alert-success">{{ trans('student.classrooms') }}</th>
                                    <th class="alert-success">{{ trans('student.section') }}</th>
                                    <th class="alert-success">{{ trans('student.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($graduated_students as $graduated_student)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $graduated_student->name }}</td>
                                        <td>{{ $graduated_student->email }}</td>
                                        <td>{{ $graduated_student->gender->name }}</td>
                                        <td>{{ $graduated_student->grade->name }}</td>
                                        <td>{{ $graduated_student->classroom->name_class }}</td>
                                        <td>{{ $graduated_student->section->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button type="button"  class="mr-2 btn btn-success" data-toggle="modal" data-target="#restore{{ $graduated_student->id }}">{{trans('student.restore')}}</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$graduated_student->id}}">{{trans('student.delete')}}</button>
                                            </div>
                                        </td>
                                    </tr>
                                        {{-- Start Modal To Make restore students --}}
                                            <div class="modal fade" id="restore{{ $graduated_student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('student.rollback')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form  action="{{ route('graduations.restore', $graduated_student->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value={{$graduated_student->id}}>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name" class="mr-sm-2">{{trans('student.rollback?')}}</label>
                                                                <input type="text" readonly value="{{ $graduated_student->name  }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('student.close')}}</button>
                                                            <button  class="btn btn-danger">{{trans('student.submit')}}</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        {{-- End Modal To Make restore students --}}

                                        {{-- Start Modal To Delete students --}}
                                            <div class="modal fade" id="delete{{$graduated_student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('student.Delete')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form action="{{ route('graduations.destroy', $graduated_student->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <input type="hidden" name="id" value={{$graduated_student->id}}>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name" class="mr-sm-2">{{trans('classrooms.Warning_class')}}</label>
                                                                <input type="text" readonly value="{{ $graduated_student->name }}" class="form-control">
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
