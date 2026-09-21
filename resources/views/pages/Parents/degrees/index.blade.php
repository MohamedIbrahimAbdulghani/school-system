@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('parent.sons_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('parent.sons_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('parent.dashboard') }}" class="default-color">{{ trans('parent.dashboard') }}</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('sons.index') }}" class="default-color">{{ trans('parent.sons_list') }}</a></li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('quizzes.student_name') }}</th>
                                    <th>{{ trans('quizzes.quizze_name') }}</th>
                                    <th>{{ trans('quizzes.degree') }}</th>
                                    <th>{{ trans('quizzes.date_quizz') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($degrees as $degree)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $degree->student->name }}</td>
                                        <td>{{ $degree->quizz->name }}</td>
                                        <td>{{ $degree->score }}</td>
                                        <td>{{ $degree->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
