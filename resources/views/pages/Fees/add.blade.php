@extends('layouts.master')
@section('css')

@section('title')
    {{trans('fees.add_fees')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('fees.add_fees')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('fees.index') }}" class="default-color">{{ trans('fees.fees') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.add_fees') }}</li>
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
                <form action="{{route('fees.store')}}" method="post" >
                    @csrf
                    <div class="row setup-content">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="title">{{trans('student.name_ar')}}</label>
                                            <input type="text" name="name_ar"  class="form-control" value="{{ old('name_ar') }}">
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
                                            <input type="text" name="name_en"  class="form-control" value="{{ old('name_en') }}">
                                            @error('name_en')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="title">{{trans('fees.fees_amount')}}</label>
                                            <input type="text" name="amount" class="form-control" value="{{ old('amount') }}">
                                            @error('amount')
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
                                            <label>{{trans('student.classrooms')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="classroom_id" >

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
                                            <label>{{trans('fees.type_fees')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="type_fees">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                <option value="1">{{ trans('fees.studying_fees') }}</option>
                                                <option value="2">{{ trans('fees.bus_fees') }}</option>
                                            </select>
                                            @error('type_fees')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col">
                                            <label>{{trans('student.academic_year')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="year">
                                                <option value="">{{trans('parent.Choose')}}...</option>
                                                @php
                                                    $current_year = date("Y");
                                                @endphp
                                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                            @error('year')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <textarea name="notes" id="notes"  class="form-control" placeholder="{{trans('fees.notes')}}"></textarea>
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



@endsection
