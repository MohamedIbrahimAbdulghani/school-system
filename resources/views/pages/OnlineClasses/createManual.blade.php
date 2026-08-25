@extends('layouts.master')
@section('css')

@section('title')
    {{trans('online_classes.add_new_class')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('online_classes.add_new_class')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('online_classes.index') }}" class="default-color">{{ trans('online_classes.online_classes') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('online_classes.add_manual_meeting') }}</li>
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
                <form action="{{route('online_classes.storeManual')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row setup-content">
                            <div class="col">
                                <div class="col-md-12">
                                    <br>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="grade_id">{{trans('online_classes.grade')}}</label>
                                            <select class="my-1 custom-select mr-sm-2" name="grade_id">
                                                <option value="">{{trans('student.Choose')}}...</option>
                                                @foreach($grades as $grade)
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
                                            <label for="classroom_id">{{trans('online_classes.classroom')}}</label>
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
                                            <label for="section_id">{{trans('student.section')}}</label>
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
                                    </div>

                                    <div class="form-row">
                                        <div class="col-4">
                                            <label for="meeting_platform">{{ trans('online_classes.meeting_platform') }}</label>

                                            <select name="meeting_platform" id="meeting_platform" class="my-1 custom-select mr-sm-2">
                                                <option value="">{{ trans('student.Choose') }}...</option>
                                                <option value="Zoom" {{ old('meeting_platform') == 'Zoom' ? 'selected' : '' }}>
                                                    Zoom
                                                </option>
                                                <option value="Google Meet" {{ old('meeting_platform') == 'Google Meet' ? 'selected' : '' }}>
                                                    Google Meet
                                                </option>
                                            </select>

                                            @error('meeting_platform')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-2" id="metting_id_group">
                                            <label for="metting_id">{{trans('online_classes.metting_id')}}</label>
                                            <input type="text" name="metting_id"  class="form-control" value="{{ old('metting_id') }}">
                                            @error('metting_id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-2">
                                            <label for="topic">{{trans('online_classes.topic')}}</label>
                                            <input type="text" name="topic"  class="form-control" value="{{ old('topic') }}">
                                            @error('topic')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="start_at">{{trans('online_classes.start_at')}}</label>
                                            <input type="datetime-local" name="start_at"  class="form-control" value="{{ old('start_at') }}">
                                            @error('start_at')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-2">
                                            <label for="duration">{{trans('online_classes.duration')}}</label>
                                            <input type="text" name="duration"  class="form-control" value="{{ old('duration') }}">
                                            @error('duration')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-2" id="password_group">
                                            <label for="password">{{trans('online_classes.password')}}</label>
                                            <input type="text" name="password"  class="form-control" value="{{ old('password') }}">
                                            @error('password')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="meeting_link">{{trans('online_classes.meeting_link')}}</label>
                                            <input type="text" name="meeting_link"  class="form-control" value="{{ old('meeting_link') }}">
                                            @error('meeting_link')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <button class="mt-3 btn btn-success" type="submit">{{trans('quizzes.submit')}}</button>
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
    $(document).ready(function () {

        function toggleMeetingFields() {

            let platform = $('#meeting_platform').val();

            if (platform === 'Zoom') {

                $('#metting_id_group').show();
                $('#password_group').show();

            } else if (platform === 'Google Meet') {

                $('#metting_id_group').hide();
                $('#password_group').hide();

            } else {

                $('#metting_id_group').hide();
                $('#password_group').hide();
            }
        }

        $('#meeting_platform').on('change', function () {
            toggleMeetingFields();
        });

        toggleMeetingFields();
    });
</script>

@endsection
