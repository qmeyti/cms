<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}} mb-3">
    {!! Form::label('name', ' عنوان: ', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}} mb-3">
    {!! Form::label('label', 'برچسب: ', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}} mb-3">
    {!! Form::label('label', 'حقوق دسترسی: ', ['class' => 'control-label mb-3']) !!}
    {!! Form::select('permissions[]', $permissions, isset($role) ? $role->permissions->pluck('name') : [], ['class' => 'form-control', 'multiple' => true]) !!}
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره نقش جدید'}} </button>
</div>
