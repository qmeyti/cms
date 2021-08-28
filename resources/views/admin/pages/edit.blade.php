@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    ویرایش نوشته #{{ $page->id }}
                </h4>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('pages.index') }}" title="بازگشت">
                            <button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                        </a>
                    </div>
                </div>

                @if ($errors->any())
                    <ul class="alert alert-light-danger color-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {!! Form::model($page, [
                    'method' => 'PATCH',
                    'url' => route('pages.update',['page'=>$page->id]),
                    'class' => 'form-horizontal',
                    'files' => true
                ]) !!}

                @include ('admin.pages.form', ['formMode' => 'edit'])

                {!! Form::close() !!}

            </div>
        </div>
    </section>
@endsection
