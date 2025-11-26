@extends('layouts.master')
@section('css')

@section('title')
    {{trans('section.title_page')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('section.title_page')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('section.title_page')}}</a></li>
                <li class="breadcrumb-item active">{{trans('section.List_Grade')}}</li>
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
                <a class="button x-small" href="#" data-toggle="modal" data-target="#addSection">
                    {{ trans('section.add_section') }}</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        @foreach ($grades as $grade)

                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table mb-0 center-aligned-table">
                                                            <thead>
                                                            <tr class="text-dark">
                                                                <th>#</th>
                                                                <th>{{ trans('section.Name_Section') }}</th>
                                                                <th>{{ trans('section.Name_Class') }}</th>
                                                                <th>{{ trans('section.Status') }}</th>
                                                                <th>{{ trans('section.Processes') }}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $i = 0; ?>
                                                            @foreach ($grade->sections as $listSection)
                                                                <tr>
                                                                    <?php $i++; ?>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $listSection->name }}</td>
                                                                    <td>{{ $listSection->classroom->name_class }}</td>
                                                                    <td>
                                                                        @if ($listSection->status === 1)
                                                                            <label
                                                                                class="badge badge-success">{{ trans('section.Status_Section_AC') }}</label>
                                                                        @else
                                                                            <label
                                                                                class="badge badge-danger">{{ trans('section.Status_Section_No') }}</label>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#edit{{ $listSection->id }}">{{ trans('section.Edit') }}</a>
                                                                        <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $listSection->id }}">{{ trans('section.Delete') }}</a>
                                                                    </td>
                                                                </tr>

                                                                <!--تعديل قسم جديد -->
                                                                <div class="modal fade" id="edit{{ $listSection->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                                                                    id="exampleModalLabel">
                                                                                    {{ trans('section.add_section') }}</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{ route('sections.update', $listSection->id) }}" method="POST">
                                                                                    {{ csrf_field() }}
                                                                                    @method('PUT')
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <input type="text" name="Name_Section_Ar" class="form-control" placeholder="{{ trans('section.Section_name_ar') }}" value="{{$listSection->name}}">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <input type="text" name="Name_Section_En" class="form-control"  placeholder="{{ trans('section.Section_name_en') }}" value="{{$listSection->classroom->name_class}}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="col">
                                                                                        <label for="inputName" class="control-label">{{ trans('section.Name_Grade') }}</label>
                                                                                        <select name="Grade_id" class="custom-select"
                                                                                                onchange="console.log($(this).val())" value="">
                                                                                            <!--placeholder-->
                                                                                            <option value="" selected
                                                                                                    disabled>{{$grade->name}}
                                                                                            </option>
                                                                                            @foreach ($grades as $grade)
                                                                                                <option value="{{ $grade->id }}" {{ $listSection->grade_id == $grade->id ? 'selected' : '' }}> {{ $grade->name }} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="col">
                                                                                        <label for="inputName"  class="control-label">{{ trans('section.Name_Class') }}</label>
                                                                                        <select name="Class_id" class="custom-select">
                                                                                            @if($listSection->classroom)
                                                                                            <option value="{{ $listSection->classroom->id }}" selected>
                                                                                                {{ $listSection->classroom->name_class }}
                                                                                            </option>
                                                                                        @else
                                                                                            <option value="" disabled>{{ trans('section.Select_Class') }}</option>
                                                                                        @endif
                                                                                        </select>

                                                                                        <div class="mt-2 col">
                                                                                            <div class="form-check">
                                                                                                @if ($listSection->status === 1)
                                                                                                    <input type="checkbox" checked class="form-check-input"  name="status" id="exampleCheck1">
                                                                                                @else
                                                                                                    <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">{{ trans('section.Status') }}</label>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('section.Close') }}</button>
                                                                                <button type="submit"  class="btn btn-primary">{{ trans('section.Update') }}</button>
                                                                            </div>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- delete_modal_Grade -->
                                                                <div class="modal fade" id="delete{{ $listSection->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                    class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    {{ trans('section.delete_Section') }}
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                <span
                                                                                    aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form
                                                                                    action="{{ route('sections.destroy', $listSection->id) }}"
                                                                                    method="post">
                                                                                    {{ method_field('Delete') }}
                                                                                    @csrf
                                                                                    {{ trans('section.Warning_Section') }}
                                                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{ $listSection->id }}">
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">{{ trans('section.Close') }}</button>
                                                                                        <button type="submit"
                                                                                                class="btn btn-danger">{{ trans('section.submit') }}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
                <!--اضافة قسم جديد -->
                <div class="modal fade" id="addSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                    id="exampleModalLabel">
                                    {{ trans('section.add_section') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('sections.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="Name_Section_Ar" class="form-control" placeholder="{{ trans('section.Section_name_ar') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="Name_Section_En" class="form-control"  placeholder="{{ trans('section.Section_name_en') }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('section.Name_Grade') }}</label>
                                        <select name="Grade_id" class="custom-select"
                                                onchange="console.log($(this).val())">
                                            <!--placeholder-->
                                            <option value="" selected
                                                    disabled>{{ trans('section.Select_Grade') }}
                                            </option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}"> {{ $grade->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col">
                                        <label for="inputName"  class="control-label">{{ trans('section.Name_Class') }}</label>
                                        <select name="Class_id" class="custom-select">

                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('section.Close') }}</button>
                                <button type="submit"  class="btn btn-success">{{ trans('section.submit') }}</button>
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
    $(document).ready(function() {

        // لكل select في edit modal
        $('.edit-class-select').each(function() {
            var select = $(this);
            var gradeId = select.data('grade');

            // جلب كل الصفوف للمرحلة الحالية
            if(gradeId) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + gradeId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        select.empty(); // امسح الخيارات القديمة
                        $.each(data, function(key, value) {
                            var selected = key == select.val() ? 'selected' : '';
                            select.append('<option value="'+ key +'" '+selected+'>'+ value +'</option>');
                        });
                    }
                });
            }
        });

        // لو المستخدم غير المرحلة في الـ select الخاص بالمرحلة
        $('select[name="Grade_id"]').on('change', function() {
            var gradeId = $(this).val();
            var modal = $(this).closest('.modal');
            var classSelect = modal.find('select[name="Class_id"]');

            if(gradeId) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + gradeId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        classSelect.empty();
                        $.each(data, function(key, value) {
                            classSelect.append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
        });

    });
    </script>

@endsection
