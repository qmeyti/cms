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
                        {!! Form::open(['url' => route('template.store',['module' => 'menu']), 'class' => 'form-horizontal', 'files' => true]) !!}


                        <div class="form-group{{ $errors->has('__main_menu') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__main_menu', 'منوی اصلی', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__main_menu', $menus , __stg_straight('__main_menu') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'انتخاب منوی اصلی'])}}

                            {!! $errors->first('__main_menu', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__header_image_link') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__header_image_link', 'لینک لوگو', ['class' => 'control-label mb-3' ]) !!}
                            {!! Form::text('__header_image_link', __stg_straight('__header_image_link'), ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'لینک لوگو']) !!}
                            {!! $errors->first('__header_image_link', '<p class="help-block">:message</p>') !!}
                        </div>


                        <div class="form-group">
                            <button class="btn btn-secondary" type="submit"><i class="fa fa-save"></i> ذخیره تغییرات </button>
                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
