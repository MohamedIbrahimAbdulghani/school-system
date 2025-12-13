@extends('layouts.master')
@section('css')

@section('title')
    {{trans('parent.Add_parent')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('parent.Add_parent')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main-side.Parents')}}</a></li>
                <li class="breadcrumb-item active">{{trans('parent.Add_parent')}}</li>
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
                <form action="{{route('add_parent.store')}}" method="post">   
                    @csrf     
                    <!-- Start Father Form -->
                    <h5>{{trans('parent.Information_Father')}}</h5>
                    <div class="row setup-content">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('parent.Email')}}</label>
                                            <input type="email" name="email" placeholder="{{trans('parent.Email')}}"  class="form-control">
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Password')}}</label>
                                            <input type="password" name="password" placeholder="{{trans('parent.Password')}}" class="form-control" >
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('parent.Name_Father')}}</label>
                                            <input type="text" name="father_name" placeholder="{{trans('parent.Name_Father')}}" class="form-control" >
                                            @error('father_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Name_Father_en')}}</label>
                                            <input type="text" name="father_name_en" placeholder="{{trans('parent.Name_Father_en')}}" class="form-control" >
                                            @error('father_name_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="title">{{trans('parent.Job_Father')}}</label>
                                            <input type="text" name="father_job" placeholder="{{trans('parent.Job_Father')}}" class="form-control">
                                            @error('father_job')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="title">{{trans('parent.Job_Father_en')}}</label>
                                            <input type="text" name="father_job_en" placeholder="{{trans('parent.Job_Father_en')}}" class="form-control">
                                            @error('father_job_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="title">{{trans('parent.National_ID_Father')}}</label>
                                            <input type="text" name="father_national_id" placeholder="{{trans('parent.National_ID_Father')}}" class="form-control">
                                            @error('father_national_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Passport_ID_Father')}}</label>
                                            <input type="text" name="father_passport_id" placeholder="{{trans('parent.Passport_ID_Father')}}" class="form-control">
                                            @error('father_passport_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="title">{{trans('parent.Phone_Father')}}</label>
                                            <input type="text" name="father_phone" placeholder="{{trans('parent.Phone_Father')}}" class="form-control">
                                            @error('father_phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">{{trans('parent.Nationality_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="father_nationality_id">
                                                <option selected>{{trans('parent.Choose')}}...</option>
                                                @foreach($Nationalities as $National)
                                                    <option value="{{$National->id}}">{{$National->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('father_nationality_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputState">{{trans('parent.Blood_Type_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="father_blood_type_id">
                                                <option selected>{{trans('parent.Choose')}}...</option>
                                                @foreach($Type_Bloods as $Type_Blood)
                                                    <option value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('father_blood_type_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">{{trans('parent.Religion_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="father_religion_id">
                                                <option selected>{{trans('parent.Choose')}}...</option>
                                                @foreach($Religions as $Religion)
                                                    <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('father_religion_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{trans('parent.Address_Father')}}</label>
                                        <textarea class="form-control" name="father_address" id="exampleFormControlTextarea1" rows="4"></textarea>
                                        @error('father_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                    </div>
                    <!-- End Father Form -->
                    <hr>
                    <hr>
                    <!-- Start Mother Form -->
                    <h5>{{trans('parent.Information_Mother')}}</h5>
                    <div class="row setup-content" >
                            <div class="col">
                                <div class="col-md-12">
                                    <br>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('parent.Name_Mother')}}</label>
                                            <input type="text" name="mother_name" placeholder="{{trans('parent.Name_Mother')}}" class="form-control">
                                            @error('mother_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Name_Mother_en')}}</label>
                                            <input type="text" name="mother_name_en" placeholder="{{trans('parent.Name_Mother_en')}}" class="form-control">
                                            @error('mother_name_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="title">{{trans('parent.Job_Mother')}}</label>
                                            <input type="text" name="mother_job" placeholder="{{trans('parent.Job_Mother')}}" class="form-control">
                                            @error('mother_job')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="title">{{trans('parent.Job_Mother_en')}}</label>
                                            <input type="text" name="mother_job_en" placeholder="{{trans('parent.Job_Mother_en')}}" class="form-control">
                                            @error('mother_job_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="title">{{trans('parent.National_ID_Mother')}}</label>
                                            <input type="text" name="mother_national_id" placeholder="{{trans('parent.National_ID_Mother')}}" class="form-control">
                                            @error('mother_national_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Passport_ID_Mother')}}</label>
                                            <input type="text" name="mother_passport_id" placeholder="{{trans('parent.Passport_ID_Mother')}}" class="form-control">
                                            @error('mother_passport_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="title">{{trans('parent.Phone_Mother')}}</label>
                                            <input type="text" name="mother_phone" placeholder="{{trans('parent.Phone_Mother')}}" class="form-control">
                                            @error('mother_phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">{{trans('parent.Nationality_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="mother_nationality_id">
                                                <option selected>{{trans('parent.Choose')}}...</option>
                                                @foreach($Nationalities as $National)
                                                    <option value="{{$National->id}}">{{$National->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('mother_nationality_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputState">{{trans('parent.Blood_Type_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="mother_blood_type_id">
                                                <option selected>{{trans('parent.Choose')}}...</option>
                                                @foreach($Type_Bloods as $Type_Blood)
                                                    <option value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('mother_blood_type_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">{{trans('parent.Religion_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="mother_religion_id">
                                                <option selected>{{trans('parent.Choose')}}...</option>
                                                @foreach($Religions as $Religion)
                                                    <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('mother_religion_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{trans('parent.Address_Mother')}}</label>
                                        <textarea class="form-control" name="mother_address" id="exampleFormControlTextarea1"
                                                rows="4"></textarea>
                                        @error('mother_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- End Mother Form -->
                    <button class="btn btn-success" type="submit">{{trans('parent.Next')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
