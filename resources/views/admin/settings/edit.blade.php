@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Setting #{{ $setting->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/settings') }}" title="بازگشت"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($setting, [
                            'method' => 'PATCH',
                            'url' => ['/admin/settings', $setting->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.settings.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
