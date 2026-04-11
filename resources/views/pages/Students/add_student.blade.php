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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <h5 style="color: blue">{{trans('student.personal_information')}}</h5>
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
                                            <input type="text" name="name_ar" placeholder="{{trans('student.name_ar')}}" class="form-control" value="{{ old('name_ar') }}">
                                            @error('name_ar')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('student.name_en')}}</label>
                                            <input type="text" name="name_en" placeholder="{{trans('student.name_en')}}" class="form-control" value="{{ old('name_en') }}">
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
                                            <select class="my-1 custom-select mr-sm-2" name="gender_id">
                                                <option value="">{{trans('student.Choose')}}...</option>
                                                @foreach($Genders as $gender)
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
                                        <div class="form-group col-md-3">
                                            <label for="inputCity">{{trans('student.Nationality')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="nationality_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Nationalities as $National)
                                                    <option value="{{$National->id}}" {{ old('nationality_id') == $National->id ? 'selected' : '' }}>{{$National->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('nationality_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputState">{{trans('student.blood_type')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="blood_type_id">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @foreach($Type_Bloods as $Type_Blood)
                                                    <option value="{{$Type_Blood->id}}" {{ old('blood_type_id') == $Type_Blood->id ? 'selected' : '' }}>{{$Type_Blood->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('blood_type_id')
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

                                <h5 style="color: blue">{{trans('student.Student_information')}}</h5>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="inputCity">{{trans('student.Grade')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="grade_id">
                                                <option value="">{{trans('student.Choose')}}...</option>
                                                @foreach($Grades as $grade)
                                                    <option value="{{$grade->id}}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}>{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('grade_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputCity">{{trans('student.classrooms')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="classroom_id" disabled>

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
                                            <select class="my-1 custom-select mr-sm-2" name="section_id" disabled>

                                            </select>
                                            @error('section_id')
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
                                                    <option value="{{$parent->id}}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>{{$parent->father_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputState">{{trans('student.academic_year')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="academic_year">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @php
                                                    $current_year = date("Y");
                                                @endphp
                                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                    <option value="{{ $year}}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                            @error('academic_year')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <label for="images[]">{{ trans('parent.choose_file_name')}}</label>
                                        <input type="file" accept="image/*" name="images[]" id="images" class="form-control d-block" multiple>
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

{{-- script ajax code --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {

    // Grades -> Classrooms
    $('select[name="grade_id"]').on('change', function () {

        let grade_id = $(this).val();

        let classroom = $('select[name="classroom_id"]');
        let section = $('select[name="section_id"]');

        // reset
        classroom.empty().prop('disabled', true);
        section.empty().prop('disabled', true);


        if (grade_id) {

            $.ajax({
                url: "{{ url('get_classrooms') }}/" + grade_id,
                type: "GET",
                dataType: "json",

                success: function (data) {

                    // option افتراضي
                    classroom.append('<option selected disabled>{{ trans('student.Choose') }}</option>');

                    // loop على البيانات
                    $.each(data, function (key, value) {
                        classroom.append('<option value="' + key + '">' + value + '</option>'); //ضيف option جديد واديله ال key and value
                    });

                    classroom.prop('disabled', false); // تفعيل

                },

                error: function () {
                    console.log('Error loading classrooms');
                }
            });

        } else {
            $('select[name="classroom_id"]').empty();
        }

    });

    // Grades -> Classrooms

    $('select[name="classroom_id"]').on('change', function () {

        let classroom_id = $(this).val();

        let section = $('select[name="section_id"]');

        // reset
        section.empty().prop('disabled', true);

        if (classroom_id) {

            $.ajax({
                url: "{{ url('get_sections') }}/" + classroom_id,
                type: "GET",
                dataType: "json",

                success: function (data) {

                    section.append('<option selected disabled>{{ trans('student.Choose') }}</option>');

                    $.each(data, function (key, value) {
                        section.append('<option value="' + key + '">' + value + '</option>');
                    });
                    section.prop('disabled', false); // تفعيل
                }
            });
        }
    });

});

</script>


@endsection
