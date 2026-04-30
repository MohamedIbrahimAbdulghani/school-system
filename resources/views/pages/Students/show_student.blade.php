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
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                @endif
                <a href="{{route('students.index')}}">
                    <button type="button" class="mb-3 button x-small">← {{trans('student.Back')}}</button>
                </a>

                <div class="tab nav-border">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#student_details">
                                {{trans('student.Student_details')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#student_attachments">
                                {{trans('student.Attachments')}}
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        {{-- ================= STUDENT DETAILS ================= --}}
                        <div class="tab-pane fade active show" id="student_details">

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
                        <div class="tab-pane fade" id="student_attachments">
                            {{-- Upload form --}}
                            <form method="post" action="{{ route('students.uploadStudentAttachments', $student->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="d-block">{{trans('student.Attachments')}}</label>
                                    <input type="file" name="files[]" multiple required accept="image/*,application/pdf">
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
                                        <td>{{ basename($attachment->filename) }}</td>
                                        <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                            href="{{ route('students.downloadStudentAttachment', $attachment->id) }}">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_img{{ $attachment->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#preview_img{{ $attachment->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <input type="hidden" value="{{ $attachment->id }}" name="attachment_id">
                                        </td>
                                    </tr>
                                    {{-- Modal خارج الجدول بشكل صحيح --}}
                                    <div class="modal fade" id="delete_img{{ $attachment->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5>{{ trans('student.Delete_File') }}</h5>
                                                </div>
                                                <div class="pt-0 modal-body">
                                                    <label class="mb-2">{{ trans('student.sure_delete?') }}</label>
                                                    <form method="POST" action="{{ route('students.deleteStudentAttachments', $attachment->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">{{trans('grades.delete')}}</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades.close')}}</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Model to preview attachment student --}}
                                        <div class="modal fade" id="preview_img{{ $attachment->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    {{-- Body --}}
                                                    <div class="text-center modal-body">
                                                        @if(\Illuminate\Support\Str::endsWith($attachment->filename, ['.pdf']))
                                                            <iframe
                                                                src="{{ route('students.previewStudentAttachment', $attachment->id) }}"
                                                                width="100%" height="500px">
                                                            </iframe>
                                                        @else
                                                            <img
                                                                src="{{ route('students.previewStudentAttachment', $attachment->id) }}"
                                                                class="rounded img-fluid">
                                                        @endif
                                                    </div>
                                                    {{-- Footer --}}
                                                    <div class="modal-footer">
                                                        <a href="{{ route('students.downloadStudentAttachment', $attachment->id) }}" class="btn btn-success"> {{ trans('student.Download') }} </a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                            {{ trans('grades.close') }}
                                                        </button>
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
