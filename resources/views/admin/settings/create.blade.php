@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                                                <h4 class="card-title">

                        ایجاد تنظیم جدید
                                            </h4>

                    </div>
                    <div class="card-body"><div class="row mb-3">
                            <div class="col">
                        <a href="{{ url('/admin/settings') }}" title="بازگشت"><button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>
                            </div>
                        </div>

                        @if ($errors->any())
                            <ul class="alert alert-light-danger color-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/settings', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.settings.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
