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

                        <div class="form-group{{ $errors->has('__footer_menu_title_1') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__footer_menu_title_1', 'عنوان منوی فوتر ۱', ['class' => 'control-label mb-3' ]) !!}
                            {!! Form::text('__footer_menu_title_1', __stg_straight('__footer_menu_title_1'), ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان منوی فوتر ۱']) !!}
                            {!! $errors->first('__footer_menu_title_1', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__footer_menu_1') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__footer_menu_1', 'منوی فوتر ۱', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__footer_menu_1', $menus , __stg_straight('__footer_menu_1') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'منوی فوتر ۱'])}}

                            {!! $errors->first('__footer_menu_1', '<p class="help-block">:message</p>') !!}
                        </div>


                        <div class="form-group{{ $errors->has('__footer_menu_title_2') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__footer_menu_title_2', 'عنوان منوی فوتر ۲', ['class' => 'control-label mb-3' ]) !!}
                            {!! Form::text('__footer_menu_title_2', __stg_straight('__footer_menu_title_2'), ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان منوی فوتر ۲']) !!}
                            {!! $errors->first('__footer_menu_title_2', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('__footer_menu_2') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__footer_menu_2', 'منوی فوتر ۲', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__footer_menu_2', $menus , __stg_straight('__footer_menu_2') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'منوی فوتر ۲'])}}

                            {!! $errors->first('__footer_menu_2', '<p class="help-block">:message</p>') !!}
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
