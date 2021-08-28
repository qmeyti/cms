<div class="form-group{{ $errors->has('key') ? 'has-error' : ''}} mb-3">
    {!! Form::label('key', 'کلید', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('key', null, ['class' => 'form-control ltr', 'required' => 'required']) !!}
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('part') ? 'has-error' : ''}} mb-3">
    {!! Form::label('part', 'بخش مورد استفاده', ['class' => 'control-label mb-3' ]) !!}

    {{Form::select('part',['' => 'عمومی','admin' => 'پنل  مدیریت','home' => 'بخش کاربری'] , null , ['type' => 'select','id' => 'part','class' => 'form-control'])}}

    {!! $errors->first('part', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('type') ? 'has-error' : ''}} mb-3">
    {!! Form::label('type', 'نوع ورودی', ['class' => 'control-label mb-3' ]) !!}

    {{Form::select('type',['string' => 'متن تک خطی','text' => 'متن چند خطی','int' => 'عدد صحیح','float' => 'اعشاری','bool' => 'بله خیر','json' => 'JSON'] , null , ['type' => 'select','id' => 'type','class' => 'form-control'])}}

    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group{{ $errors->has('value') ? 'has-error' : ''}} mb-3">
    {!! Form::label('value', 'مقدار', ['class' => 'control-label mb-3']) !!}
    <div ID="VALUE_FIELD">

    </div>
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> {{$formMode === 'edit' ? 'ویرایش اطلاعات' : 'ذخیره تنظیم جدید'}} </button>
</div>

@section('scripts')

    <script>

        $(document).ready(function () {


            function textarea(options) {

                const ltr = options.ltr ? ' ltr' : '';

                return `
                    {!! Form::textarea('value', null,  ['class' => 'form-control${ltr}']) !!}
                `;
            }

            function text(options) {

                const ltr = options.ltr ? ' ltr' : '';

                return `
                    {!! Form::text('value', null,  ['class' => 'form-control${ltr}']) !!}
                `;
            }

            function number(options) {
                const ltr = options.ltr ? ' ltr' : '';

                return `
                    {!! Form::number('value', null, ['class' => 'form-control${ltr}']) !!}
                `;

            }

            function bool(options) {

                return `
                    {{Form::select('value',['0' => ' خیر','1' => 'بله'] , null , ['type' => 'select','class' => 'form-control'])}}
                `;

            }

            let fields = {
                string: {
                    method: text,
                    options: {
                        ltr: false
                    }
                },
                json: {
                    method: textarea,
                    options: {
                        ltr: true
                    }
                },
                text: {
                    method: textarea,
                    options: {
                        ltr: false
                    }
                },
                int: {
                    method: number,
                    options: {
                        ltr: true
                    }
                },
                float: {
                    method: text,
                    options: {
                        ltr: true
                    }
                },
                bool: {
                    method: bool,
                    options: {
                        ltr: false
                    }
                }
            }

            function handleChangeType() {

                const type = $('#type option:selected').val();

                const html = fields[type].method(fields[type].options);

                $('#VALUE_FIELD').html(html);

            }

            $('#type').change(handleChangeType);

            handleChangeType();
        });

    </script>

@endsection
