
{!! Form::model($item, [
                            'method' => 'PATCH',
                            'url' => route('menu_items.update',['menu' => $menu->id,'menu_item' => $item->id]),
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
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
    <button class="btn btn-warning" type="submit"><i class="fa fa-pencil"></i> ویرایش </button>
</div>

{!! Form::close() !!}
