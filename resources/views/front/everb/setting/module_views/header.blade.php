@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات منوهای سایت
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'header']), 'class' => 'form-horizontal', 'files' => true]) !!}


                <div class="form-group{{ $errors->has('__main_menu') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_menu', 'منوی اصلی', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__main_menu', $menus , __stg_straight('__main_menu') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'انتخاب منوی اصلی'])}}

                    {!! $errors->first('__main_menu', '<p class="help-block">:message</p>') !!}
                </div>


                <div class="form-group{{ $errors->has('__header_phone') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__header_phone', 'شماره ی تماس', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__header_phone', __stg_straight('__header_phone'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'شماره ی تماس']) !!}
                    {!! $errors->first('__header_phone', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__header_email') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__header_email', 'ایمیل', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__header_email', __stg_straight('__header_email'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'ایمیل هدر']) !!}
                    {!! $errors->first('__header_email', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__header_address') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__header_address', 'آدرس', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__header_address', __stg_straight('__header_address'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'آدرس هدر']) !!}
                    {!! $errors->first('__header_address', '<p class="help-block">:message</p>') !!}
                </div>

                {{-- ////////////////// --}}

                <div class="form-group{{ $errors->has('__header_facebok_link') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__header_facebok_link', 'لینک فیسبوک', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__header_facebok_link', __stg_straight('__header_facebok_link'), ['class' => 'form-control ltr','placeholder' => 'لینک فیسبوک']) !!}
                    {!! $errors->first('__header_facebok_link', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__header_twitter_link') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__header_twitter_link', 'لینک تویتر', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__header_twitter_link', __stg_straight('__header_twitter_link'), ['class' => 'form-control ltr','placeholder' => 'لینک تویتر']) !!}
                    {!! $errors->first('__header_twitter_link', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__header_linkedin_link') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__header_linkedin_link', 'لینک لینکدین', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__header_linkedin_link', __stg_straight('__header_linkedin_link'), ['class' => 'form-control ltr','placeholder' => 'لینک لینکدین']) !!}
                    {!! $errors->first('__header_linkedin_link', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__header_instagram_link') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__header_instagram_link', 'لینک اینستاگرام', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__header_instagram_link', __stg_straight('__header_instagram_link'), ['class' => 'form-control ltr','placeholder' => 'لینک اینستاگرام']) !!}
                    {!! $errors->first('__header_instagram_link', '<p class="help-block">:message</p>') !!}
                </div>

                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب لوگوی سایت','fieldName' => '__logo', 'old' => old( '__logo', __stg_straight('__logo'))])

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
            imageUploader('__logo');
        });
    </script>
@endsection


