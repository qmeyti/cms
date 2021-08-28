<div class="form-group{{ $errors->has('header') ? 'has-error' : ''}} mb-3">
    {!! Form::label('header', 'عنوان اسلاید', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('header', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('header', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('text1') ? 'has-error' : ''}} mb-3">
    {!! Form::label('text1', 'توضیحات ۱', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('text1', null, ['class' => 'form-control']) !!}
    {!! $errors->first('text1', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('text2') ? 'has-error' : ''}} mb-3">
    {!! Form::label('text2', 'توضیحات ۲', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('text2', null, ['class' => 'form-control']) !!}
    {!! $errors->first('text2', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('url') ? 'has-error' : ''}} mb-3">
    {!! Form::label('url', 'آدرس اینترنتی', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('url', null,  ['class' => 'form-control ltr']) !!}
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('button1_text') ? 'has-error' : ''}} mb-3">
    {!! Form::label('button1_text', 'متن دکمه ۱', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('button1_text', null,['class' => 'form-control']) !!}
    {!! $errors->first('button1_text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('button1_url') ? 'has-error' : ''}} mb-3">
    {!! Form::label('button1_url', 'آدرس اینترنتی دکمه ۱', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('button1_url', null, ['class' => 'form-control ltr']) !!}
    {!! $errors->first('button1_url', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('button2_text') ? 'has-error' : ''}} mb-3">
    {!! Form::label('button2_text', 'متن دکمه ۲', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('button2_text', null, ['class' => 'form-control']) !!}
    {!! $errors->first('button2_text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('button2_url') ? 'has-error' : ''}} mb-3">
    {!! Form::label('button2_url', 'آدرس اینترنتی دکمه ۲', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('button2_url', null,  ['class' => 'form-control ltr']) !!}
    {!! $errors->first('button2_url', '<p class="help-block">:message</p>') !!}
</div>

@php
    $fmOld = old( 'image', $formMode === 'edit' ? $slide->image : '' );
@endphp

@include('admin.component.image_uploader',['fieldTitle' => 'انتخاب تصویر کاربر','fieldName' => 'image','old' => $fmOld])

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره اسلاید جدید'}} </button>
</div>


@section('scripts')
    <script src="{{asset('vendor/jquery/jquery-3.6.0.min.js')}}"></script>
    {{--FILE MANAGER--}}
    <script src="{{asset('assets/js/component/imageUploader.js')}}"></script>
    <script>
        $(document).ready(function () {
            imageUploader('image');
        });
    </script>
@endsection
