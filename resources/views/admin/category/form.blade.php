<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}} mb-3">
    {!! Form::label('title', 'نام دسته', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

@if(isset($_REQUEST['language']))

    <input type="hidden" name="language" value="{{ $_REQUEST['language']}}" >
    <input type="hidden" name="parent_translition" value="{{ $_REQUEST['parent_translition'] }}">

@endif

@if(!isset($_REQUEST['language']) && !isset($category->parent_translition ))

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

        $cats = \App\Models\Category::where('id','!=',$cid)->where('language','fa')->get();

        foreach ($cats as $item){
            $cs[$item->id] = $item->title;
        }
    @endphp

    {{Form::select('parent',$cs ,null , ['class' => 'form-control', 'placeholder' => 'انتخاب دسته والد'])}}

    {!! $errors->first('parent', '<p class="help-block">:message</p>') !!}
</div>

@endif



<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره دسته جدید'}} </button>
</div>
