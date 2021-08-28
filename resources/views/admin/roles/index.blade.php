@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">نقش های کاربران</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/roles/create') }}" class="btn btn-success" title="افزودن نقش جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i> افزودن
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/roles', 'class' => 'form-inline my-2 my-lg-0 float-left', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو...">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>شناسه</th>
                                        <th>عنوان</th>
                                        <th>برچسب</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ url('/admin/roles', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->label }}</td>
                                        <td>
                                            <a href="{{ url('/admin/roles/' . $item->id) }}" title="نمایش نقش"><button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/roles/' . $item->id . '/edit') }}" title="ویرایش نقش کاربر"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/roles', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fas fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'حذف نقش',
                                                        'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer ltr">
                        <div class="pagination"> {!! $roles->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
