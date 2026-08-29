@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('settings.settings') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('settings.settings_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('settings.index') }}" class="default-color">{{ trans('settings.settings') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('settings.settings_list') }}</li>
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
                <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 border-right-2 border-right-blue-400">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"> {{ trans('settings.school_name') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="school_name" value="{{ $setting['school_name'] }}" col-lg-3  type="text" class="form-control" placeholder="{{ trans('settings.school_name') }}">
                                        @error('school_name')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="current_year" class="col-lg-3 col-form-label font-weight-semibold">{{ trans('settings.current_year') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select  name="current_year" id="current_year" class="select-search form-control">
                                        <option value="">{{trans('parent.Choose')}}...</option>
                                        @for($y=date('Y', strtotime('- 1 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)
                                            <option {{ ($setting['current_year'] == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }}>{{ ($y-=1).'-'.($y+=1) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('settings.school_title') }}</label>
                                <div class="col-lg-9">
                                    <input name="school_title" value="{{ $setting['school_title'] }}" type="text" class="form-control" placeholder="{{ trans('settings.school_title') }}">
                                        @error('school_title')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('settings.phone') }}</label>
                                <div class="col-lg-9">
                                    <input name="phone" value="{{ $setting['phone'] }}" type="text" class="form-control" placeholder="{{ trans('settings.phone') }}">
                                        @error('phone')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"> {{ trans('settings.email') }}</label>
                                <div class="col-lg-9">
                                    <input name="email" value="{{ $setting['email'] }}" type="email" class="form-control" placeholder="{{ trans('settings.email') }}">
                                        @error('email')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"> {{ trans('settings.address') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input col-lg-3  name="address" value="{{ $setting['address'] }}" type="text" class="form-control" placeholder="{{ trans('settings.address') }}">
                                        @error('address')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('settings.end_first_term') }}</label>
                                <div class="col-lg-9">
                                    <input name="end_first_term" value="{{ $setting['end_first_term'] }}" type="text" class="form-control date-pick" placeholder="{{ trans('settings.end_first_term') }}">
                                        @error('end_first_term')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('settings.end_second_term') }}</label>
                                <div class="col-lg-9">
                                    <input name="end_second_term" value="{{ $setting['end_second_term'] }}" type="text" class="form-control date-pick" placeholder="{{ trans('settings.end_second_term') }}">
                                        @error('end_second_term')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('settings.school_logo') }}</label>
                                <div class="col-lg-9">
                                    <div class="mb-3">
                                        <img src="{{ asset('attachments/logo/' . $setting['logo']) }}" alt="School Logo" style="width: 100px; height: 100px; object-fit: contain;" >
                                    </div>
                                    <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('settings.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- row closed -->
@endsection
