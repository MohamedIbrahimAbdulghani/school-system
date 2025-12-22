@extends('layouts.master')
@section('css')

@section('title')
    {{trans('parent.Edit')}}
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
                <form action="{{route('add_parent.update', $parent->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Start Father Form -->
                    <h5>{{trans('parent.Information_Father')}}</h5>
                        <div class="row setup-content">
                            <input type="hidden" class="form-control" name="id" value="{{$parent->id}}">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('parent.Email')}}</label>
                                            <input type="email" name="email" placeholder="{{trans('parent.Email')}}"  class="form-control" value="{{ old('email', $parent->email) }}" >
                                            @error('email')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Password')}}</label>
                                            <input type="password" name="password" placeholder="{{trans('parent.Password')}}" class="form-control" value="{{ old('password', $parent->password) }}">
                                        @error('password')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('parent.Name_Father')}}</label>
                                            <input type="text" name="father_name" placeholder="{{trans('parent.Name_Father')}}" class="form-control" value="{{ old('father_name', $parent->father_name) }}">
                                            @error('father_name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Name_Father_en')}}</label>
                                            <input type="text" name="father_name_en" placeholder="{{trans('parent.Name_Father_en')}}" class="form-control" value="{{ old('father_name_en', $parent->getTranslation('father_name', 'en')) }}">
                                            @error('father_name_en')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="title">{{trans('parent.Job_Father')}}</label>
                                            <input type="text" name="father_job" placeholder="{{trans('parent.Job_Father')}}" class="form-control" value="{{ old('father_job', $parent->father_job) }}">
                                            @error('father_job')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="title">{{trans('parent.Job_Father_en')}}</label>
                                            <input type="text" name="father_job_en" placeholder="{{trans('parent.Job_Father_en')}}" class="form-control" value="{{ old('father_job_en', $parent->getTranslation('father_job', 'en')) }}">
                                            @error('father_job_en')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="title">{{trans('parent.National_ID_Father')}}</label>
                                            <input type="text" name="father_national_id" placeholder="{{trans('parent.National_ID_Father')}}" class="form-control" data-rules="min:11|numeric" value="{{ old('father_national_id', $parent->father_national_id) }}">
                                            <small id="father_national_id_error" class="text-danger"></small>
                                            @error('father_national_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Passport_ID_Father')}}</label>
                                            <input type="text" name="father_passport_id" placeholder="{{trans('parent.Passport_ID_Father')}}" class="form-control" data-rules="min:11|numeric" value="{{ old('father_passport_id', $parent->father_passport_id) }}">
                                            <small id="father_passport_id_error" class="text-danger"></small>
                                            @error('father_passport_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="title">{{trans('parent.Phone_Father')}}</label>
                                            <input type="text" name="father_phone" placeholder="{{trans('parent.Phone_Father')}}" class="form-control" data-rules="min:11|numeric" value="{{ old('father_phone', $parent->father_phone) }}">
                                            <small id="father_phone_error" class="text-danger"></small>
                                            @error('father_phone')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">{{trans('parent.Nationality_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="father_nationality_id" >
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Nationalities as $National)
                                                    <option value="{{$National->id}}" {{ old('father_nationality_id', $parent->father_nationality_id) == $National->id ? 'selected' : '' }}>{{$National->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('father_nationality_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputState">{{trans('parent.Blood_Type_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="father_blood_type_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Type_Bloods as $Type_Blood)
                                                    <option value="{{$Type_Blood->id}}" {{ old('father_blood_type_id', $parent->father_blood_type_id) == $Type_Blood->id ? 'selected' : '' }}>{{$Type_Blood->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('father_blood_type_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">{{trans('parent.Religion_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="father_religion_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Religions as $Religion)
                                                    <option value="{{$Religion->id}}" {{ old('father_religion_id', $parent->father_religion_id) == $Religion->id ? 'selected' : '' }}>{{$Religion->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('father_religion_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{trans('parent.Address_Father')}}</label>
                                        <textarea class="form-control mb-1" name="father_address" id="exampleFormControlTextarea1" rows="4">{{ old('father_address', $parent->father_address) }}</textarea>
                                        @error('father_address')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
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
                                            <input type="text" name="mother_name" placeholder="{{trans('parent.Name_Mother')}}" class="form-control"  value="{{ old('mother_name', $parent->mother_name) }}">
                                            @error('mother_name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Name_Mother_en')}}</label>
                                            <input type="text" name="mother_name_en" placeholder="{{trans('parent.Name_Mother_en')}}" class="form-control"  value="{{ old('mother_name_en', $parent->getTranslation('mother_name', 'en')) }}">
                                            @error('mother_name_en')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="title">{{trans('parent.Job_Mother')}}</label>
                                            <input type="text" name="mother_job" placeholder="{{trans('parent.Job_Mother')}}" class="form-control" value="{{ old('mother_job', $parent->mother_job) }}">
                                            @error('mother_job')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="title">{{trans('parent.Job_Mother_en')}}</label>
                                            <input type="text" name="mother_job_en" placeholder="{{trans('parent.Job_Mother_en')}}" class="form-control" value="{{ old('mother_job_en', $parent->getTranslation('mother_job', 'en')) }}">
                                            @error('mother_job_en')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="title">{{trans('parent.National_ID_Mother')}}</label>
                                            <input type="text" name="mother_national_id" placeholder="{{trans('parent.National_ID_Mother')}}" class="form-control" data-rules="min:11|numeric"  value="{{ old('mother_national_id', $parent->mother_national_id) }}">
                                            <small id="mother_national_id_error" class="text-danger"></small>
                                            @error('mother_national_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('parent.Passport_ID_Mother')}}</label>
                                            <input type="text" name="mother_passport_id" placeholder="{{trans('parent.Passport_ID_Mother')}}" class="form-control" data-rules="min:11|numeric"  value="{{ old('mother_passport_id', $parent->mother_passport_id) }}">
                                            <small id="mother_passport_id_error" class="text-danger"></small>
                                            @error('mother_passport_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="title">{{trans('parent.Phone_Mother')}}</label>
                                            <input type="text" name="mother_phone" placeholder="{{trans('parent.Phone_Mother')}}" class="form-control" data-rules="min:11|numeric" value="{{ old('mother_phone', $parent->mother_phone) }}">
                                            <small id="mother_phone_error" class="text-danger"></small>
                                            @error('mother_phone')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">{{trans('parent.Nationality_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="mother_nationality_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Nationalities as $National)
                                                    <option value="{{$National->id}}" {{ old('mother_nationality_id', $parent->mother_nationality_id) == $National->id ? 'selected' : '' }}>{{$National->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('mother_nationality_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputState">{{trans('parent.Blood_Type_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="mother_blood_type_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Type_Bloods as $Type_Blood)
                                                    <option value="{{$Type_Blood->id}}" {{ old('mother_blood_type_id', $parent->mother_blood_type_id) == $Type_Blood->id ? 'selected' : '' }}>{{$Type_Blood->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('mother_blood_type_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">{{trans('parent.Religion_Father_id')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="mother_religion_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Religions as $Religion)
                                                    <option value="{{$Religion->id}}" {{ old('mother_religion_id', $parent->mother_religion_id) == $Religion->id ? 'selected' : '' }}>{{$Religion->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('mother_religion_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{trans('parent.Address_Mother')}}</label>
                                        <textarea class="form-control mb-1" name="mother_address" id="exampleFormControlTextarea1"
                                                rows="4">{{ old('mother_address', $parent->mother_address) }}</textarea>
                                            @error('mother_address')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <hr>
                    <hr>
                    <label for="file_name">{{ trans('parent.choose_file_name')}}</label>
                    <input type="file" name="files[]" id="files" class="form-control d-block" multiple>
                    <button class="btn btn-success mt-3" type="submit">{{trans('parent.Save')}}</button>
                    <!-- End Mother Form -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
document.querySelectorAll('[data-rules]').forEach(input => {
    input.addEventListener('blur', function () {

        fetch("{{ route('parents.validate') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                field: this.name,
                rules: this.dataset.rules,
                [this.name]: this.value
            })
        })
        .then(res => res.json())
        .then(data => {
            let errorBox = document.getElementById(this.name + '_error');
            if (!errorBox) return;

            if (data.error) {
                errorBox.innerText = data.error;
            } else {
                errorBox.innerText = '';
            }
        });
    });
});
</script>

@endsection
