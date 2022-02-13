@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات پاصفحه
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'footer']), 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group{{ $errors->has('__footer_menu_services') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_menu_services', 'خدمات شرکت', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__footer_menu_services', $menus , __stg_straight('__footer_menu_services') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'انتخاب منوی خدمات شرکت'])}}

                    {!! $errors->first('__footer_menu_services', '<p class="help-block">:message</p>') !!}
                </div>


                <div class="form-group{{ $errors->has('__footer_menu_suitable') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_menu_suitable', 'منوی لینک های سریع', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__footer_menu_suitable', $menus , __stg_straight('__footer_menu_suitable') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'منوی لینک های سریع'])}}

                    {!! $errors->first('__footer_menu_suitable', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_menu_contact') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_menu_contact', 'منوی تماس بگیرید', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__footer_menu_contact', $menus , __stg_straight('__footer_menu_contact') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'منوی تماس بگیرید'])}}

                    {!! $errors->first('__footer_menu_contact', '<p class="help-block">:message</p>') !!}
                </div>

                {{-- ///////////// --}}
                <div class="form-group{{ $errors->has('__footer_description') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_description', 'توضیحات فوتر', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_description', __stg_straight('__footer_description'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 2500,'placeholder' => 'توضیحات فوتر']) !!}
                    {!! $errors->first('__footer_description', '<p class="help-block">:message</p>') !!}
                </div>



                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب لوگوی فوتر سایت','fieldName' => '__footer_logo', 'old' => old( '__footer_logo', __stg_straight('__footer_logo'))])

                <div class="form-group{{ $errors->has('__footer_facebook') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_facebook', 'آدرس فیسبوک', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_facebook', __stg_straight('__footer_facebook'), ['class' => 'form-control ltr', 'maxlength' => 30,'placeholder' => 'آدرس فیسبوک']) !!}
                    {!! $errors->first('__footer_facebook', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_twitter') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_twitter', 'آدرس تویتر', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_twitter', __stg_straight('__footer_twitter'), ['class' => 'form-control ltr','maxlength' => 30,'placeholder' => 'آدرس توییتر']) !!}
                    {!! $errors->first('__footer_twitter', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_linkedin') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_linkedin', 'لینک لینکدین', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_linkedin', __stg_straight('__footer_linkedin'), ['class' => 'form-control ltr','maxlength' => 30,'placeholder' => 'آدرس لینکدین']) !!}
                    {!! $errors->first('__footer_linkedin', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_telegram') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_telegram', 'آدرس تلگرام', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_telegram', __stg_straight('__footer_telegram'), ['class' => 'form-control ltr','maxlength' => 30,'placeholder' => 'آدرس تلگرام']) !!}
                    {!! $errors->first('__footer_telegram', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__footer_instagram') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__footer_instagram', 'آدرس صفحه اینستاگرام', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__footer_instagram', __stg_straight('__footer_instagram'), ['class' => 'form-control ltr', 'maxlength' => 30,'placeholder' => 'آدرس اینستاگرام']) !!}
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


