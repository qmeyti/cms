<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}} mb-3">
    {!! Form::label('title', 'عنوان نوشته', ['class' => 'control-label mb-3' ]) !!}
    {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('slug') ? 'has-error' : ''}} mb-3">
    {!! Form::label('slug', 'عنوان به انگلیسی', ['class' => 'control-label mb-3' ]) !!}
    {!! Form::text('slug', null, ('required' == 'required') ? ['class' => 'form-control ltr', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('type') ? 'has-error' : ''}} mb-3">
    {!! Form::label('type', 'نوع صفحه', ['class' => 'control-label mb-3' ]) !!}

    {{Form::select('type',['post' => 'خبر یا مقاله','page' => 'صفحه تکی'] , null , ['id' => 'type','class' => 'form-control'])}}

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

    {{Form::select('categories[]',$cs , ($formMode === 'edit'? $page->categories->pluck('id')->toArray() : null) ,
 ['class' => 'form-control',
 'placeholder' => 'دسته بندی',
 'multiple'=>'multiple',
 'name'=>'categories[]',
 'id' => 'categories',
 ])}}

    {!! $errors->first('categories', '<p class="help-block">:message</p>') !!}
</div>

<div id="PARENT_SECTION" class="form-group{{ $errors->has('parent') ? 'has-error' : ''}} mb-3 d-none">
    {!! Form::label('parent', 'صفحه والد', ['class' => 'control-label mb-3' ]) !!}

    @php
        $ps = [];
        foreach (\App\Models\Page::all() as $item){
            $ps[$item->id] = $item->title;
        }
    @endphp

    {{Form::select('parent',$ps , null , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه والد'])}}

    {!! $errors->first('parent', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group{{ $errors->has('content') ? 'has-error' : ''}} mb-3">
    {!! Form::label('content', 'محتوای نوشته', ['class' => 'control-label mb-3' ]) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control crud-richtext']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('feature_image') ? 'has-error' : ''}} mb-3">

    <div id="FEATURE_PHOTO_PREVIEW" class="d-flex flex-column justify-content-center align-items-center position-relative">
        <div style="max-width: 280px;background: #f3f3f3;padding: 10px;box-shadow: 0 1px 2px rgb(0 0 0 / 20%);">
            <input type="hidden" id="FEATURE_PHOTO_INPUT" class="form-control" name="feature_image" aria-label="Image" aria-describedby="button-image">
            <img src="" alt="" style="width: 100%;">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <button style="width: 100%;border: unset;outline: unset;" class="btn" type="button" id="button-image">
                        <span class="fal fa-select"></span>
                        انتخاب تصویر شاخص
                    </button>
                </div>
                <div>
                    <button class="btn btn-text text-danger"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}} mb-3">
    {!! Form::label('status', 'وضعیت انتشار', ['class' => 'control-label mb-3' ]) !!}

    {{Form::select('status',['draft' => 'پیشنویس','published' => 'انتشار','pending' => 'در انتظار انتشار'] , null , ['class' => 'form-control'])}}

    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{$formMode === 'edit' ? 'ویرایش' : 'ذخیره'}} </button>
</div>
