
{!! Form::open(['method' => 'POST','url' => route('menu_items.store',['menu' => $menu->id]), 'class' => 'form-horizontal', 'files' => true]) !!}

<input type="hidden" name="type" value="page">

<div class="form-group{{ $errors->has('label') ? 'has-error' : ''}} mb-3">
    {!! Form::label('label', 'برچسب', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required'] ) !!}
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('link') ? 'has-error' : ''}} mb-3">
    {!! Form::label('link', 'انتخاب صفحه', ['class' => 'control-label mb-3' ]) !!}

    {{Form::select('link', $pages , null , ['class' => 'form-control', 'placeholder' => 'انتخاب صفحه'])}}

    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> افزودن آیتم جدید </button>
</div>

{!! Form::close() !!}
