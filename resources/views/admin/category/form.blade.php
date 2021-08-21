<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}} mb-3">
    {!! Form::label('title', 'نام دسته', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('slug') ? 'has-error' : ''}} mb-3">
    {!! Form::label('slug', 'نامک (a-z A-Z 0-9 - _)', ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ['class' => 'form-control ltr', 'required' => 'required']) !!}
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('parent') ? 'has-error' : ''}} mb-3">
    {!! Form::label('parent', 'انتخاب دسته ی والد', ['class' => 'control-label']) !!}

    @php
        $cs = [];

        $cid = null;
        if ($formMode === 'edit')
            $cid = $category->id;

        $cats = \App\Models\Category::where('id','!=',$cid)->get();

        foreach ($cats as $item){
            $cs[$item->id] = $item->title;
        }
    @endphp

    {{Form::select('parent',$cs ,null , ['class' => 'form-control', 'placeholder' => 'انتخاب دسته والد'])}}

    {!! $errors->first('parent', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group mb-3">
    {!! Form::submit($formMode === 'edit' ? 'ذخیره تغییرات' : 'ساخت دسته جدید', ['class' => 'btn btn-primary']) !!}
</div>
