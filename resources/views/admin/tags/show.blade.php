@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    برچسب {{ $tag->id }}
                </h4>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ url('/admin/tags') }}" title="بازگشت"><button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>
                        <a href="{{ url('/admin/tags/' . $tag->id . '/edit') }}" title="ویرایش برچسب"><button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i> ویرایش</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/tags', $tag->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i> حذف', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'حذف برچسب',
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
                            <td>{{ $tag->id }}</td>
                        </tr>
                        <tr>
                            <th> نام </th>
                            <td> {{ $tag->name }} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection
