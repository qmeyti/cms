@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ $translationkey->title }}
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ url('/admin/translationkey') }}" title="بازگشت">
                            <button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                        </a>
                        <a href="{{ url('/admin/translationkey/' . $translationkey->id . '/edit') }}" title="ویرایش دسته بندی">
                            <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i> ویرایش</button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/translationkey', $translationkey->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> حذف', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'حذف دسته بندی',
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
                            <td>{{ $translationkey->id }}</td>
                        </tr>

                        <tr>
                            <th>کلید</th>
                            <td> {{ $translationkey->key }} </td>
                        </tr>
                        <tr>
                            <th>ساید</th>
                            <td> {{ $translationkey->side }} </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection
