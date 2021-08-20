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

<div class="form-group{{ $errors->has('avatar') ? 'has-error' : ''}} mb-3">
    @php
        $fmOld = old( 'avatar', $formMode === 'edit' ? $user->avatar : '' );
    @endphp

    <div id="FEATURE_PHOTO_PREVIEW" class="d-flex flex-column justify-content-center align-items-center position-relative">
        <div style="max-width: 360px;background: #f3f3f3;padding: 6px;box-shadow: 0 1px 2px rgb(0 0 0 / 20%);">
            <input value="{{$fmOld}}" type="hidden" id="FEATURE_PHOTO_INPUT"
                   class="form-control" name="avatar"
                   aria-label="Image"
                   aria-describedby="button-image">
            <img src="{{$fmOld}}" alt="" style="width: 100%;">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <button style="width: 100%;border: unset;outline: unset;" class="btn" type="button" id="button-image">
                        <span class="fal fa-select"></span>
                        انتخاب تصویر اسلاید
                    </button>
                </div>
                <div>
                    <button type="button" class="btn btn-text text-danger" id="FEATURE_PHOTO_TRASH"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}

</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره کاربر جدید'}} </button>
</div>

@section('scripts')

    {{--FILE MANAGER--}}
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script>

        /**
         * Delete the feature photo
         */
        $('#FEATURE_PHOTO_TRASH').click(function () {
            fmSetLink('');
        });

        /**
         * Open file manager
         */
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {

                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        /**
         * Set image link to inputs
         *
         * @param $url
         */
        function fmSetLink($url) {

            document.getElementById('FEATURE_PHOTO_INPUT').value = $url;

            const imageTag = document.querySelector('#FEATURE_PHOTO_PREVIEW img');

            imageTag.setAttribute('src', $url);
        }
    </script>
@endsection
