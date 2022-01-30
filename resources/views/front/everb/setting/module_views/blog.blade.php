@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات وبلاگ
            </div>

            <div class="card-body">

                {!! Form::open(['url' => route('template.store',['module' => 'blog']), 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group{{ $errors->has('__blog_title_1') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__blog_title_1', 'متن هدر ۱', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__blog_title_1', __stg_straight('__blog_title_1'),['class' => 'form-control']) !!}
                    {!! $errors->first('__blog_title_1', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__blog_title_2') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__blog_title_2', 'متن هدر ۲', ['class' => 'control-label mb-3']) !!}
                    {!! Form::text('__blog_title_2', __stg_straight('__blog_title_2'),['class' => 'form-control']) !!}
                    {!! $errors->first('__blog_title_2', '<p class="help-block">:message</p>') !!}
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


