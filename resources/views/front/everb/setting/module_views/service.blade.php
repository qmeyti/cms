@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات منوهای سایت
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'service']), 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group{{ $errors->has('__service_title_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_title_1', 'عنوان ۱ خدمات', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_title_1', __stg_straight('__service_title_1'), ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان ۱ خدمات']) !!}
                    {!! $errors->first('__service_title_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__service_title_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_title_2', 'عنوان ۲ خدمات', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_title_2', __stg_straight('__service_title_2'), ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان ۲ خدمات']) !!}
                    {!! $errors->first('__service_title_2', '<p class="help-block">:message</p>') !!}
                </div>

                <hr />
                <br />

                <div class="form-group{{ $errors->has('__service_item_icon_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_icon_1', 'آیکون خدمات آیتم ۱', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_icon_1', __stg_straight('__service_item_icon_1'), ['class' => 'form-control ltr', 'maxlength' => 255,'placeholder' => 'آیکون خدمات ۱']) !!}
                    {!! $errors->first('__service_item_icon_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__service_item_title_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_title_1', 'عنوان خدمات آیتم ۱', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_title_1', __stg_straight('__service_item_title_1'), ['class' => 'form-control', 'maxlength' => 255,'placeholder' => 'عنوان خدمات آیتم ۱']) !!}
                    {!! $errors->first('__service_item_title_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__service_item_body_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_body_1', 'متن خدمات آیتم ۱', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_body_1', __stg_straight('__service_item_body_1'), ['class' => 'form-control', 'maxlength' => 255,'placeholder' => 'متن خدمات آیتم ۱']) !!}
                    {!! $errors->first('__service_item_body_1', '<p class="help-block">:message</p>') !!}
                </div>

                <hr />
                <br />

                <div class="form-group{{ $errors->has('__service_item_icon_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_icon_2', 'آیکون خدمات آیتم ۲', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_icon_2', __stg_straight('__service_item_icon_2'), ['class' => 'form-control ltr', 'maxlength' => 255,'placeholder' => 'آیکون خدمات ۲']) !!}
                    {!! $errors->first('__service_item_icon_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__service_item_title_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_title_2', 'عنوان خدمات آیتم ۲', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_title_2', __stg_straight('__service_item_title_2'), ['class' => 'form-control', 'maxlength' => 255,'placeholder' => 'عنوان خدمات آیتم ۲']) !!}
                    {!! $errors->first('__service_item_title_2', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__service_item_body_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_body_2', 'متن خدمات آیتم ۲', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_body_2', __stg_straight('__service_item_body_2'), ['class' => 'form-control', 'maxlength' => 255,'placeholder' => 'متن خدمات آیتم ۲']) !!}
                    {!! $errors->first('__service_item_body_2', '<p class="help-block">:message</p>') !!}
                </div>

                <hr />
                <br />

                <div class="form-group{{ $errors->has('__service_item_icon_3') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_icon_3', 'آیکون خدمات آیتم ۳', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_icon_3', __stg_straight('__service_item_icon_3'), ['class' => 'form-control ltr', 'maxlength' => 255,'placeholder' => 'آیکون خدمات ۳']) !!}
                    {!! $errors->first('__service_item_icon_3', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__service_item_title_3') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_title_3', 'عنوان خدمات آیتم ۳', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_title_3', __stg_straight('__service_item_title_3'), ['class' => 'form-control', 'maxlength' => 255,'placeholder' => 'عنوان خدمات آیتم ۳']) !!}
                    {!! $errors->first('__service_item_title_3', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__service_item_body_3') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_body_3', 'متن خدمات آیتم ۳', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_body_3', __stg_straight('__service_item_body_3'), ['class' => 'form-control', 'maxlength' => 255,'placeholder' => 'متن خدمات آیتم ۳']) !!}
                    {!! $errors->first('__service_item_body_3', '<p class="help-block">:message</p>') !!}
                </div>

                <hr />
                <br />

                <div class="form-group{{ $errors->has('__service_item_icon_4') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_icon_4', 'آیکون خدمات آیتم ۴', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_icon_4', __stg_straight('__service_item_icon_4'), ['class' => 'form-control ltr', 'maxlength' => 255,'placeholder' => 'آیکون خدمات ۴']) !!}
                    {!! $errors->first('__service_item_icon_4', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__service_item_title_4') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_title_4', 'عنوان خدمات آیتم ۴', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_title_4', __stg_straight('__service_item_title_4'), ['class' => 'form-control', 'maxlength' => 255,'placeholder' => 'عنوان خدمات آیتم ۴']) !!}
                    {!! $errors->first('__service_item_title_4', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__service_item_body_4') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__service_item_body_4', 'متن خدمات آیتم ۴', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__service_item_body_4', __stg_straight('__service_item_body_4'), ['class' => 'form-control', 'maxlength' => 255,'placeholder' => 'متن خدمات آیتم ۴']) !!}
                    {!! $errors->first('__service_item_body_4', '<p class="help-block">:message</p>') !!}
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
            imageUploader('__logo');
        });
    </script>
@endsection


