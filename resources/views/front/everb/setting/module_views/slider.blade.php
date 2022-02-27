@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات منوهای سایت
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'slider']), 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group{{ $errors->has('__main_page') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page', ' صحفه ی اصلی', ['class' => 'control-label mb-3' ]) !!}
                    {{Form::select('__main_page', $pages , __stg_straight('__main_page') , ['class' => 'form-control', 'placeholder' => 'صحفه ی اصلی رو انتخاب کنید'])}}
                    {!! $errors->first('__main_page', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__main_page_video_page_link') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_video_page_link', 'لینک ویدیو', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_video_page_link', __stg_straight('__main_page_video_page_link'), ['class' => 'form-control ltr','placeholder' => 'لینک ویدیو']) !!}
                    {!! $errors->first('__main_page_video_page_link', '<p class="help-block">:message</p>') !!}
                </div>

                @include('admin.component.image_uploader',['fieldTitle' => ' انتخاب تصویر صحفه ی اصلی','fieldName' => '__main_page_image', 'old' => old( '__main_page_image', __stg_straight('__main_page_image'))])
                <br />
                <hr />
                <br />

                <div class="form-group">
                    <button class="btn btn-secondary" type="submit"><i class="fa fa-save"></i> ذخیره تغییرات </button>
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
            imageUploader('__main_page_image');
        });
    </script>
@endsection
