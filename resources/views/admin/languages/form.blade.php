<div class="form-group{{ $errors->has('code') ? ' has-error' : ''}} mb-3">
    {!! Form::label('code', 'کد: ', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('code', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}} mb-3">
    {!! Form::label('language_name', 'نام زبان: ', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('language_name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('language_name', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'افزودن زبان جدید'}} </button>
</div>
