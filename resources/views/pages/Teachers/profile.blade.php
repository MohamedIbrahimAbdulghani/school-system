@extends('layouts.master')
@section('css')

@section('title')
    الملف الشخصي
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الملف الشخصي</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">الملف الشخصي</li>
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
                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-center p-3">
                            <img src="{{URL::asset('assets/images/teacher.png')}}"
                                 alt="avatar"
                                 class="rounded-circle img-fluid shadow-sm" style="width: 150px;">
                            <h5 style="font-family: Cairo" class="my-3">{{$profile->name}}</h5>
                            <p class="text-muted mb-1">{{$profile->email}}</p>
                            <p class="text-muted mb-4">معلم</p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="p-3">
                            <form action="{{route('profile.update',$profile->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 mt-2">الاسم باللغة العربية</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="name_ar"
                                               value="{{ $profile->getTranslation('name', 'ar') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 mt-2">الاسم باللغة الانجليزية</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="name_en"
                                               value="{{ $profile->getTranslation('name', 'en') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0 mt-2">كلمة المرور</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" id="password" class="form-control mb-2" name="password">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" onclick="myFunction()" id="exampleCheck1">
                                            <label class="form-check-label d-inline" for="exampleCheck1">اظهار كلمة المرور</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">تعديل البيانات</button>
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
