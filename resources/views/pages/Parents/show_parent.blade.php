@extends('layouts.master')

@section('css')
@endsection

@section('title')
    {{ trans('parent.Parent_list') }}
@stop

@section('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('parent.Parent_details') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('parent.Parents') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('parent.Parent_details') }}</li>
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

                <a href="{{route('parents.index')}}">
                    <button type="button" class="mb-3 button x-small">← {{trans('parent.Back')}}</button>
                </a>

                <div class="tab nav-border">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#parent_details">
                                {{trans('parent.Parent_details')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#parent_attachments">
                                {{trans('parent.Attachments')}}
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        {{-- ================= PARENT DETAILS ================= --}}
                        <div class="tab-pane fade active show" id="parent_details">
                <div class="table-responsive">
                    <table class="table p-0 table-striped table-bordered">
                        <tbody>

                            {{-- Father Information --}}
                            <tr>
                                <th>{{trans('parent.Email')}}</th>
                                <td>{{ $parent->email }}</td>

                                <th>{{trans('parent.Name_Father')}}</th>
                                <td>{{ $parent->getTranslation('father_name', 'ar') }}</td>

                                <th>{{trans('parent.Name_Father_en')}}</th>
                                <td>{{ $parent->getTranslation('father_name', 'en') }}</td>

                                <th>{{trans('parent.Job_Father')}}</th>
                                <td>{{  $parent->getTranslation('father_job', 'ar') }}</td>
                            </tr>

                            <tr>
                                <th>{{trans('parent.Job_Father_en')}}</th>
                                <td>{{  $parent->getTranslation('father_job', 'en') }}</td>

                                <th>{{trans('parent.National_ID_Father')}}</th>
                                <td>{{ $parent->father_national_id }}</td>

                                <th>{{trans('parent.Passport_ID_Father')}}</th>
                                <td>{{ $parent->father_passport_id }}</td>

                                <th>{{trans('parent.Phone_Father')}}</th>
                                <td>{{ $parent->father_phone }}</td>
                            </tr>

                            <tr>
                                <th>{{trans('parent.Nationality_Father_id')}}</th>
                                <td>{{ optional($parent->fatherNationality)->name }}</td>

                                <th>{{trans('parent.Blood_Type_Father_id')}}</th>
                                <td>{{ optional($parent->fatherBloodType)->name }}</td>

                                <th>{{trans('parent.Religion_Father_id')}}</th>
                                <td>{{ optional($parent->fatherReligion)->name }}</td>

                                <th>{{trans('parent.Address_Father')}}</th>
                                <td>{{ $parent->father_address }}</td>
                            </tr>

                            {{-- Mother Information --}}

                            <tr>
                                <th>{{trans('parent.Name_Mother')}}</th>
                                <td>{{ $parent->getTranslation('mother_name', 'ar') }}</td>

                                <th>{{trans('parent.Name_Mother_en')}}</th>
                                <td>{{ $parent->getTranslation('mother_name', 'en') }}</td>

                                <th>{{trans('parent.Job_Mother')}}</th>
                                <td>{{  $parent->getTranslation('mother_job', 'ar') }}</td>

                                <th>{{trans('parent.Job_Mother_en')}}</th>
                                <td>{{  $parent->getTranslation('mother_job', 'en') }}</td>
                            </tr>

                            <tr>
                                <th>{{trans('parent.National_ID_Mother')}}</th>
                                <td>{{ $parent->mother_national_id }}</td>

                                <th>{{trans('parent.Passport_ID_Mother')}}</th>
                                <td>{{ $parent->mother_passport_id }}</td>

                                <th>{{trans('parent.Phone_Mother')}}</th>
                                <td>{{ $parent->mother_phone }}</td>

                                <th>{{trans('parent.Nationality_Mother_id')}}</th>
                                <td>{{ optional($parent->motherNationality)->name }}</td>
                            </tr>

                            <tr>
                                <th>{{trans('parent.Blood_Type_Mother_id')}}</th>
                                <td>{{ optional($parent->motherBloodType)->name }}</td>
                                <th>{{trans('parent.Religion_Mother_id')}}</th>
                                <td>{{ optional($parent->motherReligion)->name }}</td>
                                <th>{{trans('parent.Address_Mother')}}</th>
                                <td>{{ $parent->mother_address }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                        </div>

                        {{-- ================= ATTACHMENTS ================= --}}
                        <div class="tab-pane fade" id="parent_attachments">
                            {{-- Upload form --}}
                            <form method="post" action="{{ route('parents.uploadParentAttachments', $parent->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="d-block">{{trans('parent.Attachments')}}</label>
                                    <input type="file" name="photos[]" multiple required>
                                    <input type="hidden" name="parent_id" value="{{ $parent->id }}">
                                </div>
                                <button type="submit" class="button button-border x-small">
                                    {{trans('parent.submit')}}
                                </button>
                            </form>
                            <br>
                            {{-- Attachments table --}}
                            <table class="table p-0 table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('parent.filename')}}</th>
                                        <th>{{trans('parent.created_at')}}</th>
                                        <th>{{trans('parent.Processes')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($parent->images as $attachment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ basename($attachment->filename) }}</td>
                                        <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                            href="{{ url('Download_attachment/'.$attachment->imageable->name.'/'.$attachment->filename) }}">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_img{{ $attachment->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <input type="hidden" value="{{ $attachment->id }}" name="attachment_id">
                                        </td>
                                    </tr>
                                    {{-- Modal خارج الجدول بشكل صحيح --}}
                                    <div class="modal fade" id="delete_img{{ $attachment->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5>{{ trans('parent.Delete_File') }}</h5>
                                                </div>
                                                <div class="pt-0 modal-body">
                                                    <label class="mb-2">{{ trans('parent.sure_delete?') }}</label>
                                                    <form method="POST" action="{{ route('parents.deleteParentAttachments', $attachment->id) }}">
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
