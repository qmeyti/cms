@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات تماس با ما
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'contact']), 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group{{ $errors->has('__contact_us_local_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_local_1', 'موقعبت ما 1', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_local_1', __stg_straight('__contact_us_local_1'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_local_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_local_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_local_2', 'موقعبت ما 2', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_local_2', __stg_straight('__contact_us_local_2'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_local_2', '<p class="help-block">:message</p>') !!}
                </div>

                <hr>

                <div class="form-group{{ $errors->has('__contact_us_phone_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_phone_1', 'شماره تماس 1', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_phone_1', __stg_straight('__contact_us_phone_1'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_phone_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_phone_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_phone_2', 'شماره تماس 2', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_phone_2', __stg_straight('__contact_us_phone_2'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_phone_2', '<p class="help-block">:message</p>') !!}
                </div>

                <hr>

                <div class="form-group{{ $errors->has('__contact_us_email_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_email_1', 'آدرس ایمیل 1', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_email_1', __stg_straight('__contact_us_email_1'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_email_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_email_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_email_2', 'آدرس ایمیل 2', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_email_2', __stg_straight('__contact_us_email_2'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_email_2', '<p class="help-block">:message</p>') !!}
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


