@extends('layouts.master')
@section('css')

@section('title')
    {{trans('student.add_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('student.add_student')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('student.title')}}</a></li>
                <li class="breadcrumb-item active">{{trans('student.add_student')}}</li>
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
                <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <h5>{{trans('student.personal_information')}}</h5>
                    <div class="row setup-content">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('student.email')}}</label>
                                            <input type="email" name="email" placeholder="{{trans('student.email')}}"  class="form-control" value="{{ old('email') }}" >
                                            @error('email')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('student.password')}}</label>
                                            <input type="password" name="password" placeholder="{{trans('student.password')}}" class="form-control" value="{{ old('password') }}">
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
                                            <label for="title">{{trans('student.name_ar')}}</label>
                                            <input type="text" name="father_name" placeholder="{{trans('student.name_ar')}}" class="form-control" value="{{ old('father_name') }}">
                                            @error('father_name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('student.name_en')}}</label>
                                            <input type="text" name="father_name_en" placeholder="{{trans('student.name_en')}}" class="form-control" value="{{ old('name_en') }}">
                                            @error('name_en')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputCity">{{trans('student.gender')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="gender">
                                                <option value="">{{trans('student.Choose')}}...</option>
                                                @foreach($Genders as $gender)
                                                    <option value="{{$gender->id}}" {{ old('gender') == $gender->id ? 'selected' : '' }}>{{$gender->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('gender')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputCity">{{trans('student.Nationality')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="Nationality">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Nationalities as $National)
                                                    <option value="{{$National->id}}" {{ old('Nationality') == $National->id ? 'selected' : '' }}>{{$National->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('Nationality')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputState">{{trans('student.blood_type')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="blood_type">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Type_Bloods as $Type_Blood)
                                                    <option value="{{$Type_Blood->id}}" {{ old('blood_type') == $Type_Blood->id ? 'selected' : '' }}>{{$Type_Blood->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('blood_type')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputState">{{trans('student.Date_of_Birth')}}</label>
                                            <input type="date" name="birth_date" placeholder="{{trans('student.Date_of_Birth')}}"  class="form-control" value="{{ old('birth_date') }}">
                                            @error('birth_date')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                <h5>{{trans('student.Student_information')}}</h5>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="inputCity">{{trans('student.Grade')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="grade_id">
                                                <option value="">{{trans('student.Choose')}}...</option>
                                                @foreach($Grades as $grade)
                                                    <option value="{{$grade->id}}" {{ old('grade') == $grade->id ? 'selected' : '' }}>{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('grade')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputCity">{{trans('student.classrooms')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="classroom_id">

                                            </select>
                                            @error('classroom_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputState">{{trans('student.section')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="section_id">

                                            </select>
                                            @error('section')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputState">{{trans('student.parent')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="parent_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Parents as $parent)
                                                    <option value="{{$parent->id}}" {{ old('parent') == $parent->id ? 'selected' : '' }}>{{$parent->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('parent')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputState">{{trans('student.academic_year')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="academic_year_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Type_Bloods as $Type_Blood)
                                                    <option value="{{$Type_Blood->id}}" {{ old('blood_type') == $Type_Blood->id ? 'selected' : '' }}>{{$Type_Blood->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('birth_date')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="mt-3 btn btn-success" type="submit">{{trans('student.Save')}}</button>
                                </div>
                            </div>
                    </div>
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
