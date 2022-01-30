
<div class="form-group{{ $errors->has('key') ? 'has-error' : ''}} mb-3">
    {!! Form::label('key', 'نام کلید', ['class' => 'control-label']) !!}
    {!! Form::text('key', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group{{ $errors->has('side') ? 'has-error' : ''}} mb-3">
    {!! Form::label('side', 'ساید', ['class' => 'control-label']) !!}
    {!! Form::text('side', null, ['class' => 'form-control ltr', 'required' => 'required']) !!}
    {!! $errors->first('side', '<p class="help-block">:message</p>') !!}
</div>





<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{$formMode === 'edit' ? ' ویرایش اطلاعات' : 'ذخیره کلید ترجمه'}} </button>
</div>
