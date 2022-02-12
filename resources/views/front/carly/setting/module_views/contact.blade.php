@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات تماس با ماasas
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'contact']), 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group{{ $errors->has('__contact_us_local_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_local_1', 'موقعبت ما 1', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_local_1', __stg_straight('__contact_us_local_1'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_local_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_title_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_local_2', 'موقعبت ما 2', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_local_2', __stg_straight('__contact_us_local_2'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_local_2', '<p class="help-block">:message</p>') !!}
                </div>
                {{-- <hr>

                <div class="form-group{{ $errors->has('__contact_us_address_title_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_title_1', 'عنوان باکس تماس ۱', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_title_1', __stg_straight('__contact_us_address_title_1'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_address_title_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_icon_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_icon_1', 'آیکون باکس تماس ۱', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_icon_1', __stg_straight('__contact_us_address_icon_1'),['class' => 'form-control ltr']) !!}
                    {!! $errors->first('__contact_us_address_icon_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_line_1_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_line_1_1', 'عنوان خط اول باکس تماس ۱', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_line_1_1', __stg_straight('__contact_us_address_line_1_1'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_address_line_1_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_line_2_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_line_2_1', 'عنوان خط دوم باکس تماس ۱', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_line_2_1', __stg_straight('__contact_us_address_line_2_1'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_address_line_2_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_line_1_data_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_line_1_data_1', 'دیتای خط اول باکس تماس ۱', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_line_1_data_1', __stg_straight('__contact_us_address_line_1_data_1'),['class' => 'form-control ltr']) !!}
                    {!! $errors->first('__contact_us_address_line_1_data_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_line_2_data_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_line_2_data_1', 'دیتای خط دوم باکس تماس ۱', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_line_2_data_1', __stg_straight('__contact_us_address_line_2_data_1'),['class' => 'form-control ltr']) !!}
                    {!! $errors->first('__contact_us_address_line_2_data_1', '<p class="help-block">:message</p>') !!}
                </div>

                <hr>

                <div class="form-group{{ $errors->has('__contact_us_address_title_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_title_2', 'عنوان باکس تماس ۲', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_title_2', __stg_straight('__contact_us_address_title_2'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_address_title_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_icon_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_icon_2', 'آیکون باکس تماس ۲', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_icon_2', __stg_straight('__contact_us_address_icon_2'),['class' => 'form-control ltr']) !!}
                    {!! $errors->first('__contact_us_address_icon_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_line_1_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_line_1_2', 'عنوان خط اول باکس تماس ۲', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_line_1_2', __stg_straight('__contact_us_address_line_1_2'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_address_line_1_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_line_2_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_line_2_2', 'عنوان خط دوم باکس تماس ۲', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_line_2_2', __stg_straight('__contact_us_address_line_2_2'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_address_line_2_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_line_1_data_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_line_1_data_2', 'دیتای خط اول باکس تماس ۲', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_line_1_data_2', __stg_straight('__contact_us_address_line_1_data_2'),['class' => 'form-control ltr']) !!}
                    {!! $errors->first('__contact_us_address_line_1_data_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__contact_us_address_line_2_data_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_address_line_2_data_2', 'دیتای خط دوم باکس تماس ۲', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__contact_us_address_line_2_data_2', __stg_straight('__contact_us_address_line_2_data_2'),['class' => 'form-control ltr']) !!}
                    {!! $errors->first('__contact_us_address_line_2_data_2', '<p class="help-block">:message</p>') !!}
                </div>
                <hr>

                <div class="form-group{{ $errors->has('__contact_us_form_text') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__contact_us_form_text', 'متن فرم تماس با ما', ['class' => 'control-label mb-3']) !!}
                    {!! Form::textarea('__contact_us_form_text', __stg_straight('__contact_us_form_text'),['class' => 'form-control']) !!}
                    {!! $errors->first('__contact_us_form_text', '<p class="help-block">:message</p>') !!}
                </div> --}}


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


