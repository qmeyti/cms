@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    ایجاد اسلاید جدید برای {{$slider->title}}
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('slides.index',['slider' => $slider->id]) }}" title="بازگشت">
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

                {!! Form::open(['url' => route('slides.store',['slider' => $slider->id]), 'class' => 'form-horizontal', 'files' => true]) !!}

                @include ('admin.slide.form', ['formMode' => 'create'])

                {!! Form::close() !!}

            </div>
        </div>
    </section>
@endsection
