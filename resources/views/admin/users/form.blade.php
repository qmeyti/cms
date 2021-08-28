<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}} mb-3">
    {!! Form::label('name', 'نام: ', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('family') ? ' has-error' : ''}} mb-3">
    {!! Form::label('family', 'نام خانوادگی: ', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('family', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('family', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}} mb-3">
    {!! Form::label('email', 'ایمیل: ', ['class' => 'control-label mb-3']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}} mb-3">
    {!! Form::label('password', 'رمز عبور: ', ['class' => 'control-label mb-3']) !!}
    @php
        $passwordOptions = ['class' => 'form-control'];
        if ($formMode === 'create') {
            $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
        }
    @endphp
    {!! Form::password('password', $passwordOptions) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}} mb-3">
    {!! Form::label('role', 'نقش های کاربر: ', ['class' => 'control-label mb-3']) !!}
    {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]) !!}
</div>

@php
    $fmOld = old( 'avatar', $formMode === 'edit' ? $user->avatar : '' );
@endphp

@include('admin.component.image_uploader',['fieldTitle' => 'انتخاب تصویر کاربر','fieldName' => 'avatar','old' => $fmOld])

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره کاربر جدید'}} </button>
</div>

@section('scripts')
    <script src="{{asset('vendor/jquery/jquery-3.6.0.min.js')}}"></script>
    {{--FILE MANAGER--}}
    <script src="{{asset('assets/js/component/imageUploader.js')}}"></script>
    <script>
        $(document).ready(function () {
            imageUploader('avatar');
        });
    </script>
@endsection
