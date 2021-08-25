@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        تنظیمات درباره ما
                    </div>

                    <div class="card-body">
                        {!! Form::open(['url' => route('template.store',['module' => 'case']), 'class' => 'form-horizontal', 'files' => true]) !!}

                        <div class="form-group{{ $errors->has('__case_title_1') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_title_1', 'عنوان بخش نمونه کار ۱', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('__case_title_1', __stg_straight('__case_title_1'),['class' => 'form-control']) !!}
                            {!! $errors->first('__case_title_1', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__case_title_2') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_title_2', 'عنوان بخش نمونه کار ۲', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text('__case_title_2', __stg_straight('__case_title_2'),['class' => 'form-control']) !!}
                            {!! $errors->first('__case_title_2', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__case_page_1') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_page_1', 'انتخاب صفحه نمونه کار ۱', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__case_page_1', $pages , __stg_straight('__case_page_1') , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه نمونه کار ۱'])}}

                            {!! $errors->first('__case_page_1', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__case_page_2') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_page_2', 'انتخاب صفحه نمونه کار ۲', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__case_page_2', $pages , __stg_straight('__case_page_2') , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه نمونه کار ۲'])}}

                            {!! $errors->first('__case_page_2', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__case_page_3') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_page_3', 'انتخاب صفحه نمونه کار ۳', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__case_page_3', $pages , __stg_straight('__case_page_3') , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه نمونه کار ۳'])}}

                            {!! $errors->first('__case_page_3', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__case_page_4') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_page_4', 'انتخاب صفحه نمونه کار ۴', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__case_page_4', $pages , __stg_straight('__case_page_4') , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه نمونه کار ۴'])}}

                            {!! $errors->first('__case_page_4', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__case_page_5') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_page_5', 'انتخاب صفحه نمونه کار ۵', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__case_page_5', $pages , __stg_straight('__case_page_5') , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه نمونه کار ۵'])}}

                            {!! $errors->first('__case_page_5', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__case_page_6') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_page_6', 'انتخاب صفحه نمونه کار ۶', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__case_page_6', $pages , __stg_straight('__case_page_6') , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه نمونه کار ۶'])}}

                            {!! $errors->first('__case_page_6', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__case_page_7') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_page_7', 'انتخاب صفحه نمونه کار ۷', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__case_page_7', $pages , __stg_straight('__case_page_7') , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه نمونه کار ۷'])}}

                            {!! $errors->first('__case_page_7', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__case_page_8') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__case_page_8', 'انتخاب صفحه نمونه کار ۸', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__case_page_8', $pages , __stg_straight('__case_page_8') , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه نمونه کار ۸'])}}

                            {!! $errors->first('__case_page_8', '<p class="help-block">:message</p>') !!}
                        </div>


                        <div class="form-group">
                            <button class="btn btn-secondary" type="submit"><i class="fa fa-save"></i> ذخیره تغییرات</button>
                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/component/imageUploader.js')}}"></script>
    <script>
        $(document).ready(function () {
            imageUploader('__about_image');
        });
    </script>
@endsection


