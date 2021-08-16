<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control crud-richtext']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('feature_image') ? 'has-error' : ''}}">

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

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
