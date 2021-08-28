@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">نقش های کاربران</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/roles') }}" title="بازگشت"><button class="btn btn-warning btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>
                        <a href="{{ url('/admin/roles/' . $role->id . '/edit') }}" title="ویرایش نقش"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o" aria-hidden="true"></i> ویرایش</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/roles', $role->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fas fa-trash-o" aria-hidden="true"></i> حذف', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'حذف نقش کاربری',
                                    'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>شناسه.</th> <th>نام</th><th>برچسب</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $role->id }}</td> <td> {{ $role->name }} </td><td> {{ $role->label }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
