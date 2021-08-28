@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">ویرایش اسلاید #{{ $slide->id }}</div>
                    <div class="card-body">
                        <a href="{{ route('slides.index',['slider' => $slider->id]) }}" title="بازگشت">
                            <button class="btn btn-warning btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                        </a>
                        <br/>
                        <br/>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($slide, [
                            'method' => 'PATCH',
                            'url' => route('slides.update',['slider' => $slider->id,'slide' => $slide->id]),
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.slide.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
