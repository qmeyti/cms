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

<div class="form-group{{ $errors->has('image') ? 'has-error' : ''}} mb-3">
    @php
        $fmOld = old( 'image', $formMode === 'edit' ? $slide->image : '' );
    @endphp

    <div id="FEATURE_PHOTO_PREVIEW" class="d-flex flex-column justify-content-center align-items-center position-relative">
        <div style="max-width: 360px;background: #f3f3f3;padding: 6px;box-shadow: 0 1px 2px rgb(0 0 0 / 20%);">
            <input value="{{$fmOld}}" type="hidden" id="FEATURE_PHOTO_INPUT" class="form-control" name="image" aria-label="Image" aria-describedby="button-image">
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

    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}

</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره اسلاید جدید'}} </button>
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
