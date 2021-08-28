@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    ایجاد دسته بندی جدید
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ url('/admin/category') }}" title="بازگشت">
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

                {!! Form::open(['url' => '/admin/category', 'class' => 'form-horizontal', 'files' => true]) !!}

                @include ('admin.category.form', ['formMode' => 'create'])

                {!! Form::close() !!}

            </div>
        </div>

    </section>
@endsection
