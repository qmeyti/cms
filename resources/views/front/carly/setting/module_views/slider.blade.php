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
                        {!! Form::open(['url' => route('template.store',['module' => 'slider']), 'class' => 'form-horizontal', 'files' => true]) !!}


                        <div class="form-group{{ $errors->has('__main_slider') ? 'has-error' : ''}} mb-3">
                            {!! Form::label('__main_slider', 'انتخاب اسلایدر', ['class' => 'control-label mb-3' ]) !!}

                            {{Form::select('__main_slider', $sliders , __stg_straight('__main_slider') , ['class' => 'form-control','required' => 'required', 'placeholder' => 'انتخاب اسلایدر'])}}

                            {!! $errors->first('__main_slider', '<p class="help-block">:message</p>') !!}
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
