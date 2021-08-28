@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">

                    ویرایش اسلاید #{{ $slide->id }}
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

    </section>
@endsection
