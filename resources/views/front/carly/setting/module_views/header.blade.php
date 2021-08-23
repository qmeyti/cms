@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
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

                        @include('admin.component.image_uploader',['fieldName' => '__logo', 'old' => old( '__logo', __stg_straight('__logo'))])

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
            imageUploader('__logo');
        });
    </script>
@endsection


