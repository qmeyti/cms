<div class="form-group{{ $errors->has('question') ? 'has-error' : ''}} mb-3">
    {!! Form::label('question', 'سوال', ['class' => 'control-label']) !!}
    {!! Form::text('question', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>

@if(isset($_REQUEST['language']))

    <input type="hidden" name="language" value="{{ $_REQUEST['language']}}" >
    <input type="hidden" name="parent" value="{{ $_REQUEST['parent'] }}">

@endif

<div class="form-group{{ $errors->has('answer') ? 'has-error' : ''}} mb-3">
    {!! Form::label('answer', 'پاسخ', ['class' => 'control-label mb-3' ]) !!}
    {!! Form::textarea('answer', null, ['class' => 'form-control']) !!}
    {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره ی سوال جدید'}} </button>
</div>
