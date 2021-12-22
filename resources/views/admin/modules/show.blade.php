@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    نمایش حق دسترسی
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('permissions.index') }}" title="بازگشت">
                            <button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                        </a>
                        <a href="{{ route('permissions.edit',['permission' =>$permission->id ]) }}" title="ویرایش حق دسترسی">
                            <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i> ویرایش</button>
                        </a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => route('permissions.destroy',['permission' =>$permission->id ]),
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i> حذف', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'حذف حق دسترسی',
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
                            <th>عنوان</th>
                            <th>برچسب</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td> {{ $permission->name }} </td>
                            <td> {{ $permission->label }} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection
