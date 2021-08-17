<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}} mb-3">
    {!! Form::label('title', 'نام دسته', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('slug') ? 'has-error' : ''}} mb-3">
    {!! Form::label('slug', 'نامک (a-z A-Z 0-9 - _)', ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ('required' == 'required') ? ['class' => 'form-control ltr', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('parent') ? 'has-error' : ''}} mb-3">
    {!! Form::label('parent', 'انتخاب دسته ی والد', ['class' => 'control-label']) !!}

    @php
        $cs = [];
        foreach (\App\Models\Category::all() as $item){
            $cs[$item->id] = $item->title;
        }
    @endphp

    {{Form::select('parent',$cs ,null , ['class' => 'form-control', 'placeholder' => 'انتخاب دسته والد'])}}

    {!! $errors->first('parent', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group mb-3">
    {!! Form::submit($formMode === 'edit' ? 'ذخیره تغییرات' : 'ساخت دسته جدید', ['class' => 'btn btn-primary']) !!}
</div>
