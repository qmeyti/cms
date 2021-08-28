<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}} mb-3">
    {!! Form::label('name', 'عنوان برچسب', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره برچسب جدید'}} </button>
</div>

