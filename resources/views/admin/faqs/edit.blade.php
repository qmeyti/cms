@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    ویرایش سوال
                    #
                    {{ $faq->id }}
                    {{ $faq->question }}
                </h4>
            </div>

            <div class="card-body">
                <div class="row mb-3">

                    <div class="d-flex justify-content-between">


                        <div>
                            <a href="{{ route('faq.index') }}" title="بازگشت">
                                <button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                            </a>
                        </div>


                        <div>

                            {!! Form::open([
                                  'method' => 'DELETE',
                                  'url' => route('faq.destroy',['faq' => $faq->id]),
                                  'style' => 'btn btn-danger'
                             ]) !!}
                            {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'ویرایش صفحه',
                                    'onclick'=>'return confirm("آیا مطمعنی که میخواهی این صفحه را حذف کنی؟")'
                            )) !!}
                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>

                @if ($errors->any())
                    <ul class="alert alert-light-danger color-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {!! Form::model($faq, ['method' => 'PATCH','url' => route('faq.update',['faq' => $faq->id]),'class' => 'form-horizontal','files' => true]) !!}

                @include ('admin.faqs.form', ['formMode' => 'edit'])

                {!! Form::close() !!}

            </div>
        </div>
    </section>
@endsection
