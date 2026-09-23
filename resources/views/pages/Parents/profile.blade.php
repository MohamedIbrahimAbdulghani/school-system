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
        <div class="shadow-sm card card-statistics h-100">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="p-4 card-body">
                <div class="row">
                    <div class="col-lg-4 border-right">
                        <div class="p-3 text-center">
                            <div class="mb-4">
                                <img src="{{URL::asset('assets/images/parent.png')}}" alt="avatar" class="rounded-circle" style="width: 150px; height: 150px; padding: 5px; background-color: #fff; border: 2px solid #e9ecef; box-shadow: 0px 4px 8px rgba(0,0,0,0.05);">
                            </div>
                            <h4 style="font-family: Cairo; font-weight: bold;" class="mb-2 text-dark">{{$profile->name}}</h4>
                            <p class="mb-2 text-muted"><i class="mr-1 fa fa-envelope-o"></i> {{$profile->email}}</p>
                            <span class="px-3 py-2 mt-2 badge badge-success" style="font-size: 14px;">{{trans('parent.parent')}}</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="p-3">
                            <h5 class="mb-4 text-dark" style="font-family: Cairo; font-weight: bold; border-bottom: 2px solid #f3f3f3; padding-bottom: 10px;">
                                <i class="mr-2 fa fa-edit text-primary"></i> {{trans('parent.Edit')}}
                            </h5>
                            <form action="{{route('parent.profile.update',$profile->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 text-muted" style="font-weight: 600;">{{trans('parent.parent')}} (AR)</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="father_name" value="{{ $profile->getTranslation('father_name', 'ar') }}" class="form-control form-control-lg" style="background-color: #f8f9fa; border: 1px solid #e9ecef;">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="mb-3 row align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 text-muted" style="font-weight: 600;">{{trans('parent.parent')}} (EN)</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="father_name_en" value="{{ $profile->getTranslation('father_name', 'en') }}" class="form-control form-control-lg" style="background-color: #f8f9fa; border: 1px solid #e9ecef;">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="mb-3 row align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 text-muted" style="font-weight: 600;">{{trans('teacher.password')}}</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" id="password" class="mb-2 form-control form-control-lg" name="password" style="background-color: #f8f9fa; border: 1px solid #e9ecef;" placeholder="{{trans('teacher.password')}}">
                                        <div class="mt-2 custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" onclick="myFunction()" id="exampleCheck1">
                                            <label class="custom-control-label" style="cursor: pointer; margin-top: 0;" for="exampleCheck1">{{trans('teacher.show_password')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="mt-4 text-right">
                                    <button type="submit" class="px-5 shadow-sm btn btn-success btn-lg" style="font-family: Cairo; font-weight: bold;">
                                        <i class="mr-2 fa fa-save"></i> {{trans('parent.Edit')}}
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
