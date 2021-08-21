@section('head')
    <link rel="stylesheet" href="{{ asset('vendor/tagify-master/dist/tagify.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection

<input type="hidden" value="{{$page->id}}" name="page_id">

<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}} mb-3">
    {!! Form::label('title', 'عنوان نوشته', ['class' => 'control-label mb-3' ]) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان نوشته']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('slug') ? 'has-error' : ''}} mb-3">
    {!! Form::label('slug', 'عنوان به انگلیسی', ['class' => 'control-label mb-3' ]) !!}
    {!! Form::text('slug', null, ['class' => 'form-control ltr', 'required' => 'required','maxlength' => 255,'placeholder' => 'عنوان انگلیسی']) !!}
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('content') ? 'has-error' : ''}} mb-3">
    {!! Form::label('content', 'محتوای نوشته', ['class' => 'control-label mb-3' ]) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control crud-richtext']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('type') ? 'has-error' : ''}} mb-3">
    {!! Form::label('type', 'نوع نوشته', ['class' => 'control-label mb-3' ]) !!}

    {{Form::select('type',['post' => 'خبر یا مقاله','page' => 'صفحه تکی'] , null , ['type' => 'select','id' => 'type','class' => 'form-control'])}}

    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>

<div id="CATEGORY_SECTION" class="form-group{{ $errors->has('categories') ? 'has-error' : ''}} mb-3">
    {!! Form::label('categories', 'دسته بندی', ['class' => 'control-label mb-3' ]) !!}

    @php
        $cs = [];
        foreach (\App\Models\Category::all() as $item){
            $cs[$item->id] = $item->title;
        }
    @endphp

    {{Form::select('categories[]',$cs , ($formMode === 'edit'? $page->categories->pluck('id')->toArray() : null) ,[
    'class' => 'form-control',
    'multiple'=>'multiple',
    'name'=>'categories[]',
    'id' => 'categories'
    ])}}

    {!! $errors->first('categories', '<p class="help-block">:message</p>') !!}
</div>

<div id="PARENT_SECTION" class="form-group{{ $errors->has('parent') ? 'has-error' : ''}} mb-3 d-none">
    {!! Form::label('parent', 'صفحه والد', ['class' => 'control-label mb-3' ]) !!}


    {{Form::select('parent', $parents , null , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه والد'])}}

    {!! $errors->first('parent', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('excerpt') ? 'has-error' : ''}} mb-3">
    {!! Form::label('excerpt', 'خلاصه نوشته', ['class' => 'control-label mb-3' ]) !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}
    {!! $errors->first('excerpt', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('meta_description') ? 'has-error' : ''}} mb-3">
    {!! Form::label('meta_description', 'توضیحات متا', ['class' => 'control-label mb-3' ]) !!}
    {!! Form::textarea('meta_description', null, ['class' => 'form-control']) !!}
    {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('tags') ? 'has-error' : ''}} mb-3">
    <label for="validationTags" class="form-label">برچسب ها</label>
    <input name="tags" value="{{old('tags',$formMode === 'edit' ? implode(',',$tags) : '')}}" class="form-control ltr" placeholder="ایجاد یک برچسب جدید">
    <div class="invalid-feedback">لطفا یک برچسب صحیح را بنویسید.</div>
</div>

<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}} mb-3">
    {!! Form::label('status', 'وضعیت انتشار', ['class' => 'control-label mb-3' ]) !!}

    {{Form::select('status',['pending' => 'در انتظار تایید','published' => 'انتشار یابد'] , null , ['class' => 'form-control'])}}

    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('feature_image') ? 'has-error' : ''}} mb-3">
    @php
        $fmOld = old( 'feature_image', $formMode === 'edit' ? $page->feature_image : '' );
    @endphp

    <div id="FEATURE_PHOTO_PREVIEW" class="d-flex flex-column justify-content-center align-items-center position-relative">
        <div style="max-width: 360px;background: #f3f3f3;padding: 6px;box-shadow: 0 1px 2px rgb(0 0 0 / 20%);">
            <input value="{{$fmOld}}" type="hidden" id="FEATURE_PHOTO_INPUT" class="form-control" name="feature_image" aria-label="Image" aria-describedby="button-image">
            <img src="{{$fmOld}}" alt="" style="width: 100%;">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <button style="width: 100%;border: unset;outline: unset;" class="btn" type="button" id="button-image">
                        <span class="fal fa-select"></span>
                        انتخاب تصویر شاخص
                    </button>
                </div>
                <div>
                    <button type="button" class="btn btn-text text-danger" id="FEATURE_PHOTO_TRASH"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    {!! $errors->first('feature_image', '<p class="help-block">:message</p>') !!}

</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره پست جدید'}} </button>
</div>

@section('scripts')

    {{--TINY-MCE--}}
    {{--    <script src="https://cdn.tiny.cloud/1/1lx5nhnj3ybljvrcy8qsrtfnc6xl60ugs7neudi6ep07d7h5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.1/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '.crud-richtext',
            plugins: "directionality",
            // menubar: 'file edit view format',
            toolbar: 'undo redo | styleselect | fontselect fontsizeselect formatselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | ltr rtl | code'
        });
    </script>

    {{--TAGIFY--}}
    <script src="{{ asset('vendor/tagify-master/dist/jQuery.tagify.min.js') }}"></script>
    <script type="text/javascript">

        var $input = $('input[name=tags]')
            .tagify({
                direction: 'rtl',
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
            })
            .on('add', function (e, tagName) {
                console.log('JQEURY EVENT: ', 'added', tagName)
            })
            .on("invalid", function (e, tagName) {
                console.log('JQEURY EVENT: ', "invalid", e, ' ', tagName);
            });
    </script>

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

    {{--PAGE TYPE SWITCHER--}}
    <script>

        /**
         * Switch page type
         */
        function postTypeSwitcher() {

            const type = $('#type option:selected').val();

            if (type === 'post') {

                $('#CATEGORY_SECTION').removeClass('d-none');

                $('#PARENT_SECTION').addClass('d-none')

            } else {

                $('#PARENT_SECTION').removeClass('d-none');

                $('#CATEGORY_SECTION').addClass('d-none')

            }

        }

        $(document).ready(function () {
            postTypeSwitcher();

            $('#type').change(function () {
                postTypeSwitcher();
            });

        });
    </script>
@endsection
