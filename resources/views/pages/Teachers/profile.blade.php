@extends('layouts.master')
@section('css')

@section('title')
   {{trans('teacher.profile')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('teacher.profile')}} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('teacher.dashboard')}}" class="default-color">{{trans('main-side.Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('teacher.profile')}} </li>
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
        <div class="card card-statistics h-100 shadow-sm">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-4 border-right">
                        <div class="text-center p-3">
                            <div class="mb-4">
                                <img src="{{URL::asset('assets/images/teacher.png')}}"
                                     alt="avatar"
                                     class="rounded-circle" 
                                     style="width: 150px; height: 150px; padding: 5px; background-color: #fff; border: 2px solid #e9ecef; box-shadow: 0px 4px 8px rgba(0,0,0,0.05);">
                            </div>
                            <h4 style="font-family: Cairo; font-weight: bold;" class="text-dark mb-2">{{$profile->name}}</h4>
                            <p class="text-muted mb-2"><i class="fa fa-envelope-o mr-1"></i> {{$profile->email}}</p>
                            <span class="badge badge-success px-3 py-2 mt-2" style="font-size: 14px;">{{trans('teacher.teacher')}}</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="p-3">
                            <h5 class="mb-4 text-dark" style="font-family: Cairo; font-weight: bold; border-bottom: 2px solid #f3f3f3; padding-bottom: 10px;">
                                <i class="fa fa-edit mr-2 text-primary"></i> {{trans('teacher.Edit')}}
                            </h5>
                            <form action="{{route('profile.update',$profile->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 text-muted" style="font-weight: 600;">{{trans('teacher.teacher')}} (AR)</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="name_ar"
                                               value="{{ $profile->getTranslation('name', 'ar') }}"
                                               class="form-control form-control-lg" style="background-color: #f8f9fa; border: 1px solid #e9ecef;">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 text-muted" style="font-weight: 600;">{{trans('teacher.teacher')}} (EN)</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="name_en"
                                               value="{{ $profile->getTranslation('name', 'en') }}"
                                               class="form-control form-control-lg" style="background-color: #f8f9fa; border: 1px solid #e9ecef;">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 text-muted" style="font-weight: 600;">{{trans('teacher.password')}}</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" id="password" class="form-control form-control-lg mb-2" name="password" style="background-color: #f8f9fa; border: 1px solid #e9ecef;" placeholder="{{trans('teacher.password')}}">
                                        <div class="custom-control custom-checkbox mt-2">
                                            <input type="checkbox" class="custom-control-input" onclick="myFunction()" id="exampleCheck1">
                                            <label class="custom-control-label" style="cursor: pointer;" for="exampleCheck1">{{trans('teacher.show_password')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="text-right mt-4">
                                    <button type="submit" class="btn btn-success btn-lg px-5 shadow-sm" style="font-family: Cairo; font-weight: bold;">
                                        <i class="fa fa-save mr-2"></i> {{trans('teacher.Edit')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
