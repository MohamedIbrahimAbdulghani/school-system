@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('student.Promotion_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('student.Promotion_students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="float-left pt-0 pr-0 breadcrumb float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="default-color">{{ trans('student.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.Promotion_students') }}</li>
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
                    <button type="button" class="mb-2 button x-small"  style="background: #dc3545; border: 2px solid #dc3545;" data-toggle="modal" data-target="#rollback_all_promotions" >{{trans('student.rollback')}}</button>


                    <div class="table-responsive">
                        <table id="datatable" class="table p-0 table-striped table-bordered" data-page-length="10"  style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="alert-info">#</th>
                                    <th class="alert-info">{{ trans('student.name') }}</th>
                                    <th class="alert-danger">{{ trans('student.old_grade') }}</th>
                                    <th class="alert-danger">{{ trans('student.old_academic_year') }}</th>
                                    <th class="alert-danger">{{ trans('student.old_classroom') }}</th>
                                    <th class="alert-danger">{{ trans('student.old_section') }}</th>
                                    <th class="alert-success">{{ trans('student.new_grade') }}</th>
                                    <th class="alert-success">{{ trans('student.new_academic_year') }}</th>
                                    <th class="alert-success">{{ trans('student.new_classroom') }}</th>
                                    <th class="alert-success">{{ trans('student.new_section') }}</th>
                                    <th class="alert-info">{{ trans('student.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($promotions as $promotion)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $promotion->student->name }}</td>
                                        <td>{{ $promotion->fromGrade->name }}</td>
                                        <td>{{ $promotion->academic_year }}</td>
                                        <td>{{ $promotion->fromClassroom->name_class }}</td>
                                        <td>{{ $promotion->fromSection->name }}</td>

                                        <td>{{ $promotion->toGrade->name }}</td>
                                        <td>{{ $promotion->new_academic_year }}</td>
                                        <td>{{ $promotion->toClassroom->name_class }}</td>
                                        <td>{{ $promotion->toSection->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button type="button"  class="mr-2 btn btn-outline-danger" data-toggle="modal" data-target="#rollback_one_promotion{{ $promotion->id }}">{{trans('student.rollback')}}</button>
                                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">{{trans('student.graduation')}}</button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Start Modal To Make Rollback About One Promotion --}}
                                            <div class="modal fade" id="rollback_one_promotion{{ $promotion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('student.rollback')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form  action="{{ route('promotions.destroy', $promotion->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value={{$promotion->id}}>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name" class="mr-sm-2">{{trans('student.rollback?')}}</label>
                                                                <input type="text" readonly value="{{ $promotion->student->name  }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('student.close')}}</button>
                                                            <button  class="btn btn-danger">{{trans('student.submit')}}</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        {{-- End Modal To Make Rollback About One Promotion --}}

                                        {{-- Start Modal To Make Rollback About AllPromotions --}}
                                            <div class="modal fade" id="rollback_all_promotions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">{{trans('student.rollback')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{-- delete form--}}
                                                    <form  action="{{ route('promotions.destroy', $promotion->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="page_id" value="1">
                                                        <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('student.rollback_all?') }}</h5>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('student.close')}}</button>
                                                            <button  class="btn btn-danger">{{trans('student.submit')}}</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        {{-- End Modal To Make Rollback About Promotions --}}
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
