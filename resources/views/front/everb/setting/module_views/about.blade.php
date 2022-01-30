@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات درباره ما
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'about']), 'class' => 'form-horizontal', 'files' => true]) !!}

                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب تصویر','fieldName' => '__about_image', 'old' => old( '__about_image', __stg_straight('__about_image'))])

                <div class="form-group{{ $errors->has('__about_title') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_title', 'متن هدر', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__about_title', __stg_straight('__about_title'),['class' => 'form-control']) !!}
                    {!! $errors->first('__about_title', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__about_page') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_page', 'انتخاب صفحه درباره ما', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__about_page', $pages , __stg_straight('__about_page') , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه درباره ما'])}}

                    {!! $errors->first('__about_page', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__about_experience_days') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_experience_days', 'سال تجربه', ['class' => 'control-label mb-3']) !!}
                    {!! Form::number('__about_experience_days', __stg_straight('__about_experience_days'),['class' => 'form-control']) !!}
                    {!! $errors->first('__about_experience_days', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__about_button_text') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_button_text', 'متن دکمه', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__about_button_text', __stg_straight('__about_button_text'),['class' => 'form-control']) !!}
                    {!! $errors->first('__about_button_text', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__about_button_url') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_button_url', 'آدرس اینترنتی دکمه', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__about_button_url', __stg_straight('__about_button_url'), ['class' => 'form-control ltr']) !!}
                    {!! $errors->first('__about_button_url', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__about_phone') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_phone', 'شماره تماس', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__about_phone', __stg_straight('__about_phone'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'شماره تماس']) !!}
                    {!! $errors->first('__about_phone', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__about_list_title_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_list_title_1', 'عنوان لیست اول', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__about_list_title_1', __stg_straight('__about_list_title_1'), ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان لیست اول']) !!}
                    {!! $errors->first('__about_list_title_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__about_list_items_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_list_items_1', 'آیتم های لیست شماره ۱ (هر خط یک آیتم)', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::textarea('__about_list_items_1', __stg_straight('__about_list_items_1'), ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'آیتم های لیست شماره ۱ ']) !!}
                    {!! $errors->first('__about_list_items_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__about_list_title_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_list_title_2', 'عنوان لیست دوم', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__about_list_title_2', __stg_straight('__about_list_title_2'), ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان لیست دوم']) !!}
                    {!! $errors->first('__about_list_title_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__about_list_items_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__about_list_items_2', 'آیتم های لیست شماره ۲ (هر خط یک آیتم)', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::textarea('__about_list_items_2', __stg_straight('__about_list_items_2'), ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'آیتم های لیست شماره ۲']) !!}
                    {!! $errors->first('__about_list_items_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group">
                    <button class="btn btn-secondary" type="submit"><i class="fa fa-save"></i> ذخیره تغییرات</button>
                </div>

                {!! Form::close() !!}

            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('vendor/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/component/imageUploader.js')}}"></script>
    <script>
        $(document).ready(function () {
            imageUploader('__about_image');
        });
    </script>
@endsection


