@extends('layouts.master')

@section('css')
    @livewireStyles
@endsection

@section('title')
    اجراء اختبار
@endsection

@section('page-header')
    @section('PageTitle')
        اجراء اختبار
    @stop
@endsection

@section('content')
    <livewire:show-question
        :quizz_id="$quizz_id"
        :student_id="$student_id"
    />
@endsection

@section('js')
    @toastr_js
    @toastr_render
    @livewireScripts
@endsection
