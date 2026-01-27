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
            <h4 class="mb-0">{{trans('teacher.add_teacher')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('teacher.teachers')}}</a></li>
                <li class="breadcrumb-item active">{{trans('teacher.add_teacher')}}</li>
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
                <form action="{{route('teachers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row setup-content">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('teacher.email')}}</label>
                                            <input type="email" name="email" placeholder="{{trans('teacher.email')}}"  class="form-control" value="{{ old('email') }}" >
                                            @error('email')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('teacher.password')}}</label>
                                            <input type="password" name="password" placeholder="{{trans('teacher.password')}}" class="form-control" value="{{ old('password') }}">
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
                                            <label for="title">{{trans('teacher.name_teacher')}}</label>
                                            <input type="text" name="teacher_name_ar" placeholder="{{trans('teacher.name_teacher')}}" class="form-control" value="{{ old('father_name') }}">
                                            @error('teacher_name_ar')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('teacher.name_teacher_en')}}</label>
                                            <input type="text" name="teacher_name_en" placeholder="{{trans('teacher.name_teacher_en')}}" class="form-control" value="{{ old('father_name_en') }}">
                                            @error('teacher_name_en')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="inputState">{{trans('teacher.specialization')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($specializations as $specialization)
                                                    <option value="{{$specialization->id}}" {{ old('specialization_id') == $specialization->id ? 'selected' : '' }}>{{$specialization->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('specialization_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">{{trans('teacher.gender')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($genders as $gender)
                                                    <option value="{{$gender->id}}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>{{$gender->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('gender_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label>{{trans('teacher.join_date')}}</label>
                                            <input type="date" name="join_date" class="form-control" value="{{ old('join_date') }}">
                                            @error('join_date')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{trans('teacher.address')}}</label>
                                        <textarea class="form-control mb-1" name="address" id="exampleFormControlTextarea1" rows="4">{{ old('address') }}</textarea>
                                        @error('address')
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
