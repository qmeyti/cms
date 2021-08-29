@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">

                    اسلایدر {{ $slider->id }}
                </h4>

            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('sliders.index') }}" title="بازگشت"><button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>
                        <a href="{{ route('sliders.edit',['slider' => $slider->id]) }}" title="ویرایش اسلایدر"><button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i> ویرایش</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => route('sliders.destroy',['slider' => $slider->id]),
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i> حذف', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'حذف اسلایدر',
                                'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                        ))!!}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>شناسه</th>
                            <td>{{ $slider->id }}</td>
                        </tr>
                        <tr>
                            <th> عنوان </th>
                            <td> {{ $slider->title }} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </section>
@endsection
