@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    ویرایش ترجمه ها
                    #
                    {{ $translation->id }}
                    {{ $translation->key }}
                </h4>
            </div>

            <div class="card-body">
                <div class="row mb-3">

                    <div class="d-flex justify-content-between">


                        <div>
                            <a href="{{ route('translations.index') }}" title="بازگشت">
                                <button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                            </a>
                        </div>


                        {{--                    <div>--}}
                        {{--                        <form method="POST" action="{{ route('pages.destroy',['page'=>$page->id]) }}">--}}
                        {{--                            {{ csrf_field() }}--}}
                        {{--                            {{ method_field('DELETE') }}--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <i class="fas fa-arrow-right" aria-hidden="true"></i>--}}
                        {{--                                <input type="submit" class="btn btn-danger delete-user" value="حذف پست">--}}
                        {{--                            </div>--}}
                        {{--                        </form>--}}

                        {{--                    </div>--}}


                        <div>

                            {!! Form::open([
                                  'method' => 'DELETE',
                                  'url' => route('translations.destroy',['translation' => $translation->id]),
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

                {!! Form::model($translation, ['method' => 'PATCH','url' => route('translations.update',['translation' => $translation->id]),'class' => 'form-horizontal','files' => true]) !!}

                @include ('admin.translations.form', ['formMode' => 'edit'])

                {!! Form::close() !!}

            </div>
        </div>
    </section>
@endsection
