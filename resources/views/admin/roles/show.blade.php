@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    نقش های کاربران
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('roles.index') }}" title="بازگشت">
                            <button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                        </a>
                        <a href="{{ route('roles.edit' ,['role' => $role->id]) }}" title="ویرایش نقش">
                            <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i> ویرایش</button>
                        </a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' =>  route('roles.destroy' ,['role' => $role->id]),
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i> حذف', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'حذف نقش کاربری',
                                'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                        ))!!}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>برچسب</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td> {{ $role->name }} </td>
                            <td> {{ $role->label }} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
