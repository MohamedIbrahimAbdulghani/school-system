@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('student.title') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('student.title') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('student.title') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.students') }}</li>
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
                <a href="{{route('students.create')}}"><button type="button" class="mb-2 button x-small">{{trans('student.add_student')}}</button></a>

                    <button type="button" class="mb-2 button x-small" id="bulk-delete-btn"  style="background: #dc3545; border: 2px solid #dc3545;" data-toggle="modal" data-target="#delete_all_classes" >{{trans('classrooms.delete_checkbox')}}</button>

                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select_all_box" id="select_all_box"></th>
                                    <th>#</th>
                                    <th>{{ trans('student.name') }}</th>
                                    <th>{{ trans('student.email') }}</th>
                                    <th>{{ trans('student.gender') }}</th>
                                    <th>{{ trans('student.Grade') }}</th>
                                    <th>{{ trans('student.classrooms') }}</th>
                                    <th>{{ trans('student.section') }}</th>
                                    <th>{{ trans('student.parent') }}</th>
                                    <th>{{ trans('student.academic_year') }}</th>
                                    <th>{{ trans('student.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($students as $student)
                                    <tr>
                                        <?php $i++; ?>
                                        <td><input type="checkbox" name="checkbox" id="checkbox" class="checkbox_row" value="{{$student->id}}"></td>
                                        <td>{{ $i }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender->name }}</td>
                                        <td>{{ $student->grade->name }}</td>
                                        <td>{{ $student->classroom->name_class }}</td>
                                        <td>{{ $student->section->name }}</td>
                                        <td>{{ $student->parent->father_name }}</td>
                                        <td>{{ $student->academic_year }}</td>
                                        <td>
                                            <a href="{{route('students.edit', $student->id)}}"><button title="{{ trans('student.Edit') }}" class="mb-1 btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <button class='mb-1 btn btn-danger btn-sm' data-toggle="modal" data-target="#delete{{$student->id}}"  title="{{trans('student.Delete')}}"><i class="fa fa-trash"></i></button>
                                            <a href="{{route('students.show',$student->id)}}"><button title="{{ trans('student.Show') }}" class="mb-1  btn btn-warning btn-sm"><i class="far fa-eye"></i></button></a>
                                        </td>
                                    </tr>
                                        {{-- Start Modal To Delete students --}}
                                            <div class="modal fade" id="delete{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('student.Delete')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <input type="hidden" name="id" value={{$student->id}}>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name" class="mr-sm-2">{{trans('classrooms.Warning_class')}}</label>
                                                                <input type="text" readonly value="{{ $student->name }}" class="form-control">
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
                                {{-- Start Modal To Delete All students --}}
                                    <div class="modal fade" id="delete_all_classes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('classrooms.delete_rows')}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            {{-- delete form--}}
                                            <form id="bulk-delete-form" action="{{ route('students.deleteAllStudents') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="ids" id="bulk-delete-ids">
                                                <button type="submit" class="btn btn-danger">{{trans('grades.delete')}}</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                {{-- End Modal To Delete All students --}}
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
