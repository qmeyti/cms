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

                <div class="form-group{{ $errors->has('__main_page_video_title') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_video_title', 'عنوان درباره ی ما', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_video_title', __stg_straight('__main_page_video_title'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان درباره ی ما'])  !!}
                    {!! $errors->first('__main_page_video_title', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__main_page_video_link') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_video_link', 'لینک ویدیو درباره ی ما', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_video_link', __stg_straight('__main_page_video_link'), ['class' => 'form-control ltr','placeholder' => 'لینک ویدیو درباره ی ما']) !!}
                    {!! $errors->first('__main_page_video_link', '<p class="help-block">:message</p>') !!}
                </div>

                <br />
                <hr />
                <br />

                <div class="form-group{{ $errors->has('__main_page_theory_title') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_theory_title', 'عنوان بخش نظریه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_theory_title', __stg_straight('__main_page_theory_title'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان بخش نظریه']) !!}
                    {!! $errors->first('__main_page_theory_title', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_theory_description') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_theory_description', 'توضیحات بخش نظریه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_theory_description', __stg_straight('__main_page_theory_description'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'توضیحات بخش نظریه']) !!}
                    {!! $errors->first('__main_page_theory_description', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'عکس اصلی بخش نظریه','fieldName' => '__main_page_theory_main_image', 'old' => old( '__main_page_theory_main_image', __stg_straight('__main_page_theory_main_image'))])
                @include('admin.component.image_uploader',['fieldTitle' => 'عکس امضا بخش نظریه','fieldName' => '__main_page_theory_sing_image', 'old' => old( '__main_page_theory_sing_image', __stg_straight('__main_page_theory_sing_image'))])

                <div class="form-group{{ $errors->has('__main_page_theory_name') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_theory_name', 'نام بخش نظریه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_theory_name', __stg_straight('__main_page_theory_title'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'نام بخش نظریه']) !!}
                    {!! $errors->first('__main_page_theory_name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_theory_job') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_theory_job', 'شغل بخش نظریه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_theory_job', __stg_straight('__main_page_theory_title'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'شغل بخش نظریه']) !!}
                    {!! $errors->first('__main_page_theory_job', '<p class="help-block">:message</p>') !!}
                </div>

                <br />
                <hr />
                <br />
                <div class="form-group{{ $errors->has('__main_page_about_us_shortـtitle') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_about_us_shortـtitle', 'عنوان  کوتاه بخش درباره', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_about_us_shortـtitle', __stg_straight('__main_page_about_us_shortـtitle'), ['class' => 'form-control ltr','placeholder' => 'عنوان  کوتاه بخش درباره']) !!}
                    {!! $errors->first('__main_page_about_us_shortـtitle', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_about_us_mainـtitle') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_about_us_mainـtitle', 'عنوان  اصلی بخش درباره', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_about_us_mainـtitle', __stg_straight('__main_page_about_us_mainـtitle'), ['class' => 'form-control ltr','placeholder' => 'عنوان  اصلی بخش درباره']) !!}
                    {!! $errors->first('__main_page_about_us_mainـtitle', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'عکس بخش درباره ی ما','fieldName' => '__main_page_about_us_image', 'old' => old( '__main_page_about_us_image', __stg_straight('__main_page_about_us_image'))])
                <div class="form-group{{ $errors->has('__main_page_about_us_description') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_about_us_description', 'توضیحات بخش درباره ی ما', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_about_us_description', __stg_straight('__main_page_about_us_description'), ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'توضیحات بخش درباره ی ما']) !!}
                    {!! $errors->first('__main_page_about_us_description', '<p class="help-block">:message</p>') !!}
                </div>

                <br />
                <hr />
                <br />
                @include('admin.component.image_uploader',['fieldTitle' => 'عکس بخش خدمات ما','fieldName' => '__main_page_services_image', 'old' => old( '__main_page_services_image', __stg_straight('__main_page_services_image'))])

                <div class="form-group{{ $errors->has('__main_page_servicesـtitle') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_servicesـtitle', 'عنوان  بخش خدمات ما', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_servicesـtitle', __stg_straight('__main_page_servicesـtitle'), ['class' => 'form-control ltr','placeholder' => 'عنوان  بخش خدمات ما']) !!}
                    {!! $errors->first('__main_page_servicesـtitle', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__main_page_servicesـfirst') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_servicesـfirst', 'اولین خدمت ما', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_servicesـfirst', __stg_straight('__main_page_servicesـfirst'), ['class' => 'form-control ltr','placeholder' => 'اولین خدمت ما']) !!}
                    {!! $errors->first('__main_page_servicesـfirst', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__main_page_servicesـsecond') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_servicesـsecond', 'دومین خدمت ما', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_servicesـsecond', __stg_straight('__main_page_servicesـsecond'), ['class' => 'form-control ltr','placeholder' => 'دومین خدمت ما']) !!}
                    {!! $errors->first('__main_page_servicesـsecond', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__main_page_servicesـthird') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_servicesـthird', 'سومین خدمت ما', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_servicesـthird', __stg_straight('__main_page_servicesـthird'), ['class' => 'form-control ltr','placeholder' => 'سومین خدمت ما']) !!}
                    {!! $errors->first('__main_page_servicesـthird', '<p class="help-block">:message</p>') !!}
                </div>

                <br />
                <hr />
                <br />

                <div class="form-group{{ $errors->has('__main_page_team_shortـtitle') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_team_shortـtitle', 'عنوان  کوتاه بخش تیم', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_team_shortـtitle', __stg_straight('__main_page_team_shortـtitle'), ['class' => 'form-control ltr','placeholder' => 'عنوان  کوتاه بخش درباره']) !!}
                    {!! $errors->first('__main_page_team_shortـtitle', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group{{ $errors->has('__main_page_teamـtitle') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_teamـtitle', 'عنوان اصلی بخش تیم', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_teamـtitle', __stg_straight('__main_page_teamـtitle'), ['class' => 'form-control ltr','placeholder' => 'عنوان اصلی بخش تیم']) !!}
                    {!! $errors->first('__main_page_teamـtitle', '<p class="help-block">:message</p>') !!}
                </div>

                @include('admin.component.image_uploader',['fieldTitle' => ' انتخاب تصویر تیم یک','fieldName' => '__main_page_team_image_first', 'old' => old( '__main_page_team_image_first', __stg_straight('__main_page_team_image_first'))])

                <div class="form-group{{ $errors->has('__main_page_teamـname_first') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_teamـname_first', 'نام فرد اول', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_teamـname_first', __stg_straight('__main_page_teamـname_first'), ['class' => 'form-control ltr','placeholder' => 'نام فرد اول']) !!}
                    {!! $errors->first('__main_page_teamـname_first', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_team_job_first') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_team_job_first', 'شغل فرد اول', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_team_job_first', __stg_straight('__main_page_team_job_first'), ['class' => 'form-control ltr','placeholder' => 'شغل فرد اول']) !!}
                    {!! $errors->first('__main_page_team_job_first', '<p class="help-block">:message</p>') !!}
                </div>

                @include('admin.component.image_uploader',['fieldTitle' => ' انتخاب تصویر تیم دو','fieldName' => '__main_page_team_image_second', 'old' => old( '__main_page_team_image_second', __stg_straight('__main_page_team_image_second'))])

                <div class="form-group{{ $errors->has('__main_page_teamـname_second') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_teamـname_second', 'نام فرد دو', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_teamـname_second', __stg_straight('__main_page_teamـname_second'), ['class' => 'form-control ltr','placeholder' => 'نام فرد دو']) !!}
                    {!! $errors->first('__main_page_teamـname_second', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_team_job_second') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_team_job_second', 'شغل فرد دو', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_team_job_second', __stg_straight('__main_page_team_job_second'), ['class' => 'form-control ltr','placeholder' => 'شغل فرد دو']) !!}
                    {!! $errors->first('__main_page_team_job_second', '<p class="help-block">:message</p>') !!}
                </div>

                @include('admin.component.image_uploader',['fieldTitle' => ' انتخاب تصویر تیم سه','fieldName' => '__main_page_team_image_third', 'old' => old( '__main_page_team_image_third', __stg_straight('__main_page_team_image_third'))])
                <div class="form-group{{ $errors->has('__main_page_teamـname_third') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_teamـname_third', 'نام فرد سه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_teamـname_third', __stg_straight('__main_page_teamـname_third'), ['class' => 'form-control ltr','placeholder' => 'نام فرد سه']) !!}
                    {!! $errors->first('__main_page_teamـname_third', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_team_job_third') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_team_job_third', 'شغل فرد سه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_team_job_third', __stg_straight('__main_page_team_job_third'), ['class' => 'form-control ltr','placeholder' => 'شغل فرد سه']) !!}
                    {!! $errors->first('__main_page_team_job_third', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => ' انتخاب تصویر تیم چهار','fieldName' => '__main_page_team_image_fourth', 'old' => old( '__main_page_team_image_fourth', __stg_straight('__main_page_team_image_fourth'))])

                <div class="form-group{{ $errors->has('__main_page_teamـname_fourth') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_teamـname_fourth', 'نام فرد چهار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_teamـname_fourth', __stg_straight('__main_page_teamـname_fourth'), ['class' => 'form-control ltr','placeholder' => 'نام فرد چهار']) !!}
                    {!! $errors->first('__main_page_teamـname_fourth', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_team_job_fourth') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_team_job_fourth', 'شغل فرد چهار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_team_job_fourth', __stg_straight('__main_page_team_job_fourth'), ['class' => 'form-control ltr','placeholder' => 'شغل فرد چهار']) !!}
                    {!! $errors->first('__main_page_team_job_fourth', '<p class="help-block">:message</p>') !!}
                </div>

                <br />
                <hr />
                <br />
                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب تصویر رضایت نامه','fieldName' => '__main_page_testimonial_image', 'old' => old( '__main_page_testimonial_image', __stg_straight('__main_page_testimonial_image'))])
                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب تصویر رضایت نامه 1','fieldName' => '__main_page_testimonial_image_first', 'old' => old( '__main_page_testimonial_image_first', __stg_straight('__main_page_testimonial_image_first'))])
                <div class="form-group{{ $errors->has('__main_page_testimonialـname_first') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_testimonialـname_first', 'نام فرد یک', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_testimonialـname_first', __stg_straight('__main_page_testimonialـname_first'), ['class' => 'form-control ltr','placeholder' => 'نام فرد یک']) !!}
                    {!! $errors->first('__main_page_testimonialـname_first', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_testimonialـjob_first') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_testimonialـjob_first', 'شغل فرد یک', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_testimonialـjob_first', __stg_straight('__main_page_testimonialـjob_first'), ['class' => 'form-control ltr','placeholder' => 'شغل فرد یک']) !!}
                    {!! $errors->first('__main_page_testimonialـjob_first', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_testimonialـdescription_first') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_testimonialـdescription_first', 'توضیحات فرد یک', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_testimonialـdescription_first', __stg_straight('__main_page_testimonialـdescription_first'), ['class' => 'form-control ltr','placeholder' => 'توضیحات فرد یک']) !!}
                    {!! $errors->first('__main_page_testimonialـdescription_first', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب تصویر رضایت نامه 2','fieldName' => '__main_page_testimonial_image_second', 'old' => old( '__main_page_testimonial_image_second', __stg_straight('__main_page_testimonial_image_second'))])
                <div class="form-group{{ $errors->has('__main_page_testimonialـname_second') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_testimonialـname_second', 'نام فرد دو', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_testimonialـname_second', __stg_straight('__main_page_testimonialـname_second'), ['class' => 'form-control ltr','placeholder' => 'نام فرد دو']) !!}
                    {!! $errors->first('__main_page_testimonialـname_second', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_testimonialـjob_second') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_testimonialـjob_second', 'شغل فرد دو', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_testimonialـjob_second', __stg_straight('__main_page_testimonialـjob_second'), ['class' => 'form-control ltr','placeholder' => 'شغل فرد دو']) !!}
                    {!! $errors->first('__main_page_testimonialـjob_second', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_testimonialـdescription_second') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_testimonialـdescription_second', 'توضیحات فرد دو', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_testimonialـdescription_second', __stg_straight('__main_page_testimonialـdescription_second'), ['class' => 'form-control ltr','placeholder' => 'توضیحات فرد دو']) !!}
                    {!! $errors->first('__main_page_testimonialـdescription_second', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب تصویر رضایت نامه 3','fieldName' => '__main_page_testimonial_image_third', 'old' => old( '__main_page_testimonial_image_third', __stg_straight('__main_page_testimonial_image_third'))])
                <div class="form-group{{ $errors->has('__main_page_testimonialـname_third') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_testimonialـname_third', 'نام فرد سه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_testimonialـname_third', __stg_straight('__main_page_testimonialـname_third'), ['class' => 'form-control ltr','placeholder' => 'نام فرد سه']) !!}
                    {!! $errors->first('__main_page_testimonialـname_third', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_testimonialـjob_third') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_testimonialـjob_third', 'شغل فرد سه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_testimonialـjob_third', __stg_straight('__main_page_testimonialـjob_third'), ['class' => 'form-control ltr','placeholder' => 'شغل فرد سه']) !!}
                    {!! $errors->first('__main_page_testimonialـjob_third', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_testimonialـdescription_third') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_testimonialـdescription_third', 'توضیحات فرد سه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_testimonialـdescription_third', __stg_straight('__main_page_testimonialـdescription_third'), ['class' => 'form-control ltr','placeholder' => 'توضیحات فرد سه']) !!}
                    {!! $errors->first('__main_page_testimonialـdescription_third', '<p class="help-block">:message</p>') !!}
                </div>

                <br />
                <hr />
                <br />
                <div class="form-group{{ $errors->has('__main_page_portfolio_short_title') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_short_title', 'عنوان کوتاه بخش نمونه کار ها', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_short_title', __stg_straight('__main_page_portfolio_short_title'), ['class' => 'form-control ltr','placeholder' => 'عنوان کوتاه بخش نمونه کار ها']) !!}
                    {!! $errors->first('__main_page_portfolio_short_title', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_portfolio_title') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_title', 'عنوان بخش نمونه کار ها', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_title', __stg_straight('__main_page_portfolio_title'), ['class' => 'form-control ltr','placeholder' => 'عنوان بخش نمونه کار ها']) !!}
                    {!! $errors->first('__main_page_portfolio_title', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_portfolio_description') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_description', 'توضیحات بخش نمونه کار ها', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_description', __stg_straight('__main_page_portfolio_description'), ['class' => 'form-control ltr','placeholder' => 'توضیحات بخش نمونه کار ها']) !!}
                    {!! $errors->first('__main_page_portfolio_description', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب تصویر نمونه کار 1','fieldName' => '__main_page_portfolio_image_one', 'old' => old( '__main_page_portfolio_image_one', __stg_straight('__main_page_portfolio_image_one'))])
                <div class="form-group{{ $errors->has('__main_page_portfolio_title_one') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_title_one', 'عنوان اولین نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_title_one', __stg_straight('__main_page_portfolio_title_one'), ['class' => 'form-control ltr','placeholder' => 'عنوان اولین نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_title_one', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_portfolio_link_one') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_link_one', 'لینک اولین نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_link_one', __stg_straight('__main_page_portfolio_link_one'), ['class' => 'form-control ltr','placeholder' => 'لینک اولین نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_link_one', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'نتخاب تصویر نمونه کار 2','fieldName' => '__main_page_portfolio_image_two', 'old' => old( '__main_page_portfolio_image_two', __stg_straight('__main_page_portfolio_image_two'))])
                <div class="form-group{{ $errors->has('__main_page_portfolio_title_two') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_title_two', 'عنوان  دومین نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_title_two', __stg_straight('__main_page_portfolio_title_two'), ['class' => 'form-control ltr','placeholder' => 'عنوان دومین نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_title_two', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_portfolio_link_two') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_link_two', 'لینک دومین نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_link_two', __stg_straight('__main_page_portfolio_link_two'), ['class' => 'form-control ltr','placeholder' => 'لینک دومین نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_link_two', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'نتخاب تصویر نمونه کار 3','fieldName' => '__main_page_portfolio_image_three', 'old' => old( '__main_page_portfolio_image_three', __stg_straight('__main_page_portfolio_image_three'))])
                <div class="form-group{{ $errors->has('__main_page_portfolio_title_three') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_title_three', 'عنوان  سومین نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_title_three', __stg_straight('__main_page_portfolio_title_three'), ['class' => 'form-control ltr','placeholder' => 'عنوان سومین نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_title_three', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_portfolio_link_three') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_link_three', 'لینک سومین نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_link_three', __stg_straight('__main_page_portfolio_link_three'), ['class' => 'form-control ltr','placeholder' => 'لینک سومین نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_link_three', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'نتخاب تصویر نمونه کار 4','fieldName' => '__main_page_portfolio_image_four', 'old' => old( '__main_page_portfolio_image_four', __stg_straight('__main_page_portfolio_image_four'))])
                <div class="form-group{{ $errors->has('__main_page_portfolio_title_four') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_title_four', 'عنوان  چهار نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_title_four', __stg_straight('__main_page_portfolio_title_four'), ['class' => 'form-control ltr','placeholder' => 'عنوان چهار نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_title_four', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_portfolio_link_four') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_link_four', 'لینک چهار نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_link_four', __stg_straight('__main_page_portfolio_link_four'), ['class' => 'form-control ltr','placeholder' => 'لینک چهار نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_link_four', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'نتخاب تصویر نمونه کار5','fieldName' => '__main_page_portfolio_image_five', 'old' => old( '__main_page_portfolio_image_five', __stg_straight('__main_page_portfolio_image_five'))])
                <div class="form-group{{ $errors->has('__main_page_portfolio_title_five') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_title_five', 'عنوان  پنج نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_title_five', __stg_straight('__main_page_portfolio_title_five'), ['class' => 'form-control ltr','placeholder' => 'عنوان پنج نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_title_five', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_portfolio_link_five') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_link_five', 'لینک پنج نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_link_five', __stg_straight('__main_page_portfolio_link_five'), ['class' => 'form-control ltr','placeholder' => 'لینک پنج نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_link_five', '<p class="help-block">:message</p>') !!}
                </div>
                @include('admin.component.image_uploader',['fieldTitle' => 'نتخاب تصویر نمونه کار6','fieldName' => '__main_page_portfolio_image_six', 'old' => old( '__main_page_portfolio_image_six', __stg_straight('__main_page_portfolio_image_six'))])
                <div class="form-group{{ $errors->has('__main_page_portfolio_title_six') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_title_six', 'عنوان  شیش نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_title_six', __stg_straight('__main_page_portfolio_title_six'), ['class' => 'form-control ltr','placeholder' => 'عنوان شیش نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_title_six', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_portfolio_link_six') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_portfolio_link_six', 'لینک شیش نمومه کار', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_portfolio_link_six', __stg_straight('__main_page_portfolio_link_six'), ['class' => 'form-control ltr','placeholder' => 'لینک شیش نمومه کار']) !!}
                    {!! $errors->first('__main_page_portfolio_link_six', '<p class="help-block">:message</p>') !!}
                </div>
                <br />
                <hr />
                <br />
                @include('admin.component.image_uploader',['fieldTitle' => 'نتخاب تصویر قسمت پیشرفت','fieldName' => '__main_page_progress_image', 'old' => old( '__main_page_progress_image', __stg_straight('__main_page_progress_image'))])
                <div class="form-group{{ $errors->has('__main_page_progress_title') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_progress_title', 'عنوان بخش پیشرفت', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_progress_title', __stg_straight('__main_page_progress_title'), ['class' => 'form-control ltr','placeholder' => 'عنوان بخش پیشرفت']) !!}
                    {!! $errors->first('__main_page_progress_title', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_progress_description') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_progress_description', 'توضیحات بخش پیشرفت', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_progress_description', __stg_straight('__main_page_progress_description'), ['class' => 'form-control ltr','placeholder' => 'توضیحات بخش پیشرفت']) !!}
                    {!! $errors->first('__main_page_progress_description', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_progress_inner_one') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_progress_inner_one', 'پیشرفت داخلی اول', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_progress_inner_one', __stg_straight('__main_page_progress_inner_one'), ['class' => 'form-control ltr','placeholder' => 'پیشرفت داخلی اول']) !!}
                    {!! $errors->first('__main_page_progress_inner_one', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_progress_inner_one_value') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_progress_inner_one_value', 'مقدار پیشرفت داخلی اول', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_progress_inner_one_value', __stg_straight('__main_page_progress_inner_one_value'), ['class' => 'form-control ltr','placeholder' => 'مقدار پیشرفت داخلی اول']) !!}
                    {!! $errors->first('__main_page_progress_inner_one_value', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_progress_inner_two') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_progress_inner_two', 'پیشرفت داخلی دو', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_progress_inner_two', __stg_straight('__main_page_progress_inner_two'), ['class' => 'form-control ltr','placeholder' => 'پیشرفت داخلی دو']) !!}
                    {!! $errors->first('__main_page_progress_inner_two', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_progress_inner_two_value') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_progress_inner_two_value', 'مقدار پیشرفت داخلی دو', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_progress_inner_two_value', __stg_straight('__main_page_progress_inner_two_value'), ['class' => 'form-control ltr','placeholder' => 'مقدار پیشرفت داخلی دو']) !!}
                    {!! $errors->first('__main_page_progress_inner_two_value', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_progress_inner_three') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_progress_inner_three', 'پیشرفت داخلی سه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_progress_inner_three', __stg_straight('__main_page_progress_inner_three'), ['class' => 'form-control ltr','placeholder' => 'پیشرفت داخلی سه']) !!}
                    {!! $errors->first('__main_page_progress_inner_three', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_progress_inner_three_value') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_progress_inner_three_value', 'مقدار پیشرفت داخلی سه', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_progress_inner_three_value', __stg_straight('__main_page_progress_inner_three_value'), ['class' => 'form-control ltr','placeholder' => 'مقدار پیشرفت داخلی سه']) !!}
                    {!! $errors->first('__main_page_progress_inner_three_value', '<p class="help-block">:message</p>') !!}
                </div>
                <br />
                <hr />
                <br />
                @include('admin.component.image_uploader',['fieldTitle' => 'انتخاب تصویر قسمت تماس با ما','fieldName' => '__main_page_contact_image', 'old' => old( '__main_page_contact_image', __stg_straight('__main_page_contact_image'))])
                <div class="form-group{{ $errors->has('__main_page_contact_title') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_contact_title', 'عنوان بخش تماس با  ما', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_contact_title', __stg_straight('__main_page_contact_title'), ['class' => 'form-control ltr','placeholder' => 'عنوان بخش تماس با  ما']) !!}
                    {!! $errors->first('__main_page_contact_title', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group{{ $errors->has('__main_page_contact_description') ? 'has-error' : ''}} mb-3">
                    {!! Form::label('__main_page_contact_description', 'توضیحات بخش تماس با  ما', ['class' => 'control-label mb-3' ]) !!}
                    {!! Form::text('__main_page_contact_description', __stg_straight('__main_page_contact_description'), ['class' => 'form-control ltr','placeholder' => 'توضیحات بخش تماس با  ما']) !!}
                    {!! $errors->first('__main_page_contact_description', '<p class="help-block">:message</p>') !!}
                </div>


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
