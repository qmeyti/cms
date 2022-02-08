<div class="form-group{{ $errors->has('transition') ? 'has-error' : ''}} mb-3">
    {!! Form::label('transition', 'ترجمه کلید', ['class' => 'control-label']) !!}
    {!! Form::text('transition', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('transition', '<p class="help-block">:message</p>') !!}
</div>

@if(isset($_REQUEST['language']))

    <input type="hidden" name="language" value="{{ $_REQUEST['language']}}">
    <input type="hidden" name="translatable_id" value="{{ $_REQUEST['translatable_id'] }}">

@endif

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i
            class="fas fa-save"></i> {{$formMode === 'edit' ? ' ویرایش اطلاعات' : 'ذخیره  ترجمه'}} </button>
</div>
