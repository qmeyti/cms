@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات پاصفحه
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'footer']), 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group{{ $errors->has('__footer_menu') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_menu', 'منوی اصلی فوتر', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__footer_menu', $menus , __stg_straight('__footer_menu') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'انتخاب منوی اصلی'])}}

                    {!! $errors->first('__footer_menu', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_menu_services') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_menu_services', 'منوی خدمات', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__footer_menu_services', $menus , __stg_straight('__footer_menu_services') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'انتخاب منوی اصلی'])}}

                    {!! $errors->first('__footer_menu_services', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_menu_suitable') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_menu_suitable', 'منوی لینک های مفید', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__footer_menu_suitable', $menus , __stg_straight('__footer_menu_suitable') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'انتخاب منوی اصلی'])}}

                    {!! $errors->first('__footer_menu_suitable', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_menu_last') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_menu_last', 'منوی قسمت کپی رایت', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__footer_menu_last', $menus , __stg_straight('__footer_menu_last') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'انتخاب منوی اصلی'])}}

                    {!! $errors->first('__footer_menu_last', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_phone') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_phone', 'شماره ی تماس', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_phone', __stg_straight('__footer_phone'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 30,'placeholder' => 'شماره ی تماس']) !!}
                    {!! $errors->first('__footer_phone', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_location') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_location', 'آدرس شرکت', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::textarea('__footer_location', __stg_straight('__footer_location'), ['class' => 'form-control', 'required' => 'required','placeholder' => 'شماره ی تماس']) !!}
                    {!! $errors->first('__footer_location', '<p class="help-block">:message</p>') !!}
                </div>

                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب لوگوی فوتر سایت','fieldName' => '__footer_logo', 'old' => old( '__footer_logo', __stg_straight('__footer_logo'))])

                <div class="form-group{{ $errors->has('__footer_facebook') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_facebook', 'آدرس فیسبوک', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_facebook', __stg_straight('__footer_facebook'), ['class' => 'form-control ltr', 'maxlength' => 30,'placeholder' => 'شماره ی تماس']) !!}
                    {!! $errors->first('__footer_facebook', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_twitter') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_twitter', 'آدرس تویتر', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_twitter', __stg_straight('__footer_twitter'), ['class' => 'form-control ltr','maxlength' => 30,'placeholder' => 'شماره ی تماس']) !!}
                    {!! $errors->first('__footer_twitter', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_whatsapp') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_whatsapp', 'آدرس تماس واتساپ', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_whatsapp', __stg_straight('__footer_whatsapp'), ['class' => 'form-control ltr','maxlength' => 30,'placeholder' => 'شماره ی تماس']) !!}
                    {!! $errors->first('__footer_whatsapp', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_telegram') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_telegram', 'آدرس تلگرام', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_telegram', __stg_straight('__footer_telegram'), ['class' => 'form-control ltr','maxlength' => 30,'placeholder' => 'شماره ی تماس']) !!}
                    {!! $errors->first('__footer_telegram', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_instagram') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_instagram', 'آدرس صفحه اینستاگرام', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_instagram', __stg_straight('__footer_instagram'), ['class' => 'form-control ltr', 'maxlength' => 30,'placeholder' => 'شماره ی تماس']) !!}
                    {!! $errors->first('__footer_instagram', '<p class="help-block">:message</p>') !!}
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
            imageUploader('__footer_logo');
        });
    </script>
@endsection


