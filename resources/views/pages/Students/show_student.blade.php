@extends('layouts.master')

@section('css')
@endsection

@section('title')
    {{ trans('student.title') }}
@stop

@section('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('student.Student_details') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('student.title') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.students') }}</li>
                <li class="breadcrumb-item active">{{ trans('student.Student_details') }}</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <a href="{{route('students.index')}}">
                    <button type="button" class="mb-3 button x-small">← {{trans('student.Back')}}</button>
                </a>

                <div class="tab nav-border">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home-02">
                                {{trans('student.Student_details')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile-02">
                                {{trans('student.Attachments')}}
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        {{-- ================= STUDENT DETAILS ================= --}}
                        <div class="tab-pane fade active show" id="home-02">

                            <table class="table p-0 table-striped table-bordered">
                                <tbody>

                                <tr>
                                    <th>{{trans('student.name')}}</th>
                                    <td>{{ $student->name }}</td>

                                    <th>{{trans('student.email')}}</th>
                                    <td>{{ $student->email }}</td>

                                    <th>{{trans('student.gender')}}</th>
                                    <td>{{ optional($student->gender)->name }}</td>

                                    <th>{{trans('student.Nationality')}}</th>
                                    <td>{{ optional($student->Nationality)->name }}</td>
                                </tr>

                                <tr>
                                    <th>{{trans('student.Grade')}}</th>
                                    <td>{{ optional($student->grade)->name }}</td>

                                    <th>{{trans('student.classrooms')}}</th>
                                    <td>{{ optional($student->classroom)->name_class }}</td>

                                    <th>{{trans('student.section')}}</th>
                                    <td>{{ optional($student->section)->name }}</td>

                                    <th>{{trans('student.Date_of_Birth')}}</th>
                                    <td>{{ $student->birth_date }}</td>
                                </tr>

                                <tr>
                                    <th>{{trans('student.parent')}}</th>
                                    <td>{{ optional($student->parent)->father_name }}</td>

                                    <th>{{trans('student.academic_year')}}</th>
                                    <td>{{ $student->academic_year }}</td>

                                    <th></th><td></td>
                                    <th></th><td></td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                        {{-- ================= ATTACHMENTS ================= --}}
                        <div class="tab-pane fade" id="profile-02">

                            {{-- Upload form --}}
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="d-block">{{trans('student.Attachments')}}</label>
                                    <input type="file" name="photos[]" multiple required>
                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                                </div>

                                <button type="submit" class="button button-border x-small">
                                    {{trans('student.submit')}}
                                </button>
                            </form>

                            <br>

                            {{-- Attachments table --}}
                            <table class="table p-0 table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('student.filename')}}</th>
                                        <th>{{trans('student.created_at')}}</th>
                                        <th>{{trans('student.Processes')}}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($student->images as $attachment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $attachment->filename }}</td>
                                        <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                        <td>

                                            <a class="btn btn-info btn-sm"
                                            href="{{ url('Download_attachment/'.$attachment->imageable->name.'/'.$attachment->filename) }}">
                                                <i class="fas fa-download"></i>
                                            </a>

                                            <button class="btn btn-danger btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#delete_img{{ $attachment->id }}">
                                                Delete
                                            </button>

                                        </td>
                                    </tr>

                                    {{-- Modal خارج الجدول بشكل صحيح --}}
                                    <div class="modal fade" id="delete_img{{ $attachment->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5>Delete File</h5>
                                                </div>

                                                <div class="modal-body">
                                                    Are you sure?

                                                    <form method="POST" action="">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection
