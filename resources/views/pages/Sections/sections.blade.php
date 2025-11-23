@extends('layouts.master')
@section('css')

@section('title')
    {{trans('sections.title_page')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('sections.title_page')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('sections.title_page')}}</a></li>
                <li class="breadcrumb-item active">{{trans('sections.List_Grade')}}</li>
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
                <button type="button"class="mb-2 button x-small" data-toggle="modal" data-target="#add_section">{{ trans('sections.add_section') }}</button>

            </div>
        </div>
            {{-- Start Modal To Add Grade --}}
            <div class="modal fade" id="add_section" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        {{ trans('sections.add_section') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('sections.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="Name_Section_Ar" class="form-control"
                                                    placeholder="{{ trans('sections.Section_name_ar') }}">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="Name_Section_En" class="form-control"
                                                    placeholder="{{ trans('sections.Section_name_en') }}">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <label for="inputName"
                                                class="control-label">{{ trans('sections.Name_Grade') }}</label>
                                            <select name="Grade_id" class="custom-select"
                                                    onchange="console.log($(this).val())">
                                                <!--placeholder-->
                                                <option value="" selected
                                                        disabled>{{ trans('sections.Select_Grade') }}
                                                </option>
                                                @foreach ($allGrades as $allGrade)
                                                    <option value="{{ $allGrade->id }}">{{ $allGrade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <label for="inputName"
                                                class="control-label">{{ trans('sections.Name_Class') }}</label>
                                            <select name="Class_id" class="custom-select">
                                                @foreach ($allGrades as $allGrade)
                                                    <option value="{{ $allGrade->id }}">{{ $allGrade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('sections.Close') }}</button>
                                    <button type="submit"
                                            class="btn btn-danger">{{ trans('sections.submit') }}</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
    {{-- End Modal To Add Grade --}}
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
