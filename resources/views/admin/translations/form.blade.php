
<div class="form-group{{ $errors->has('translation') ? 'has-error' : ''}} mb-3">
    {!! Form::label('translation', 'ترجمه کلید', ['class' => 'control-label']) !!}
    {!! Form::text('translation', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('translation', '<p class="help-block">:message</p>') !!}
</div>

@if(isset($_REQUEST['language']))
<input type="hidden" name="language" value="{{ $_REQUEST['language']}}" >
<input type="hidden" name="translatable_id" value="{{ $_REQUEST['translatable_id'] }}">
@endif
@if(isset($_REQUEST['model']))
    <input type="hidden" name="model" value="{{ $_REQUEST['model']}}" >
@endif
<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{$formMode === 'edit' ? ' ویرایش اطلاعات' : 'ذخیره  ترجمه'}} </button>
</div>
