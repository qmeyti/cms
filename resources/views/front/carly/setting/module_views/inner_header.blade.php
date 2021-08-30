@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات منوهای سایت
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'header']), 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group{{ $errors->has('__inner_header_phone') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_phone', 'شماره ی تماس', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__inner_header_phone', __stg_straight('__inner_header_phone'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 30]) !!}
                    {!! $errors->first('__inner_header_phone', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__inner_header_email') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_email', 'ایمیل', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::email('__inner_header_email', __stg_straight('__inner_header_email'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255]) !!}
                    {!! $errors->first('__inner_header_email', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__inner_header_location') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_location', 'آدرس', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__inner_header_location', __stg_straight('__inner_header_location'), ['class' => 'form-control', 'required' => 'required','maxlength' => 1000]) !!}
                    {!! $errors->first('__inner_header_location', '<p class="help-block">:message</p>') !!}
                </div>


                <div class="form-group{{ $errors->has('__inner_header_social_url_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_social_url_1', ' آدرس شبکه های اجتماعی ۱', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::email('__inner_header_social_url_1', __stg_straight('__inner_header_social_url_1'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255]) !!}
                    {!! $errors->first('__inner_header_social_url_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__inner_header_social_icon_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_social_icon_1', ' آیکون شبکه های اجتماعی ۱', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__inner_header_social_icon_1', __stg_straight('__inner_header_social_icon_1'), ['class' => 'form-control', 'required' => 'required','maxlength' => 1000]) !!}
                    {!! $errors->first('__inner_header_social_icon_1', '<p class="help-block">:message</p>') !!}
                </div>


                <div class="form-group{{ $errors->has('__inner_header_social_url_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_social_url_2', ' آدرس شبکه های اجتماعی ۲', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::email('__inner_header_social_url_2', __stg_straight('__inner_header_social_url_2'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255]) !!}
                    {!! $errors->first('__inner_header_social_url_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__inner_header_social_icon_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_social_icon_2', ' آیکون شبکه های اجتماعی ۲', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__inner_header_social_icon_2', __stg_straight('__inner_header_social_icon_2'), ['class' => 'form-control', 'required' => 'required','maxlength' => 1000]) !!}
                    {!! $errors->first('__inner_header_social_icon_2', '<p class="help-block">:message</p>') !!}
                </div>


                <div class="form-group{{ $errors->has('__inner_header_social_url_3') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_social_url_3', ' آدرس شبکه های اجتماعی ۳', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::email('__inner_header_social_url_3', __stg_straight('__inner_header_social_url_3'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255]) !!}
                    {!! $errors->first('__inner_header_social_url_3', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__inner_header_social_icon_3') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_social_icon_3', ' آیکون شبکه های اجتماعی ۳', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__inner_header_social_icon_3', __stg_straight('__inner_header_social_icon_3'), ['class' => 'form-control', 'required' => 'required','maxlength' => 1000]) !!}
                    {!! $errors->first('__inner_header_social_icon_3', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__inner_header_contact_page') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__inner_header_contact_page', 'صفحه تماس با ما', ['class' => 'control-label mb-3' ]) !!}

                    {{Form::select('__inner_header_contact_page', $pages , __stg_straight('__inner_header_contact_page') , ['class' => 'form-control'])}}

                    {!! $errors->first('__inner_header_contact_page', '<p class="help-block">:message</p>') !!}
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

@endsection


