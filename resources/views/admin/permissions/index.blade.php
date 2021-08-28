@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">حقوق دسترسی</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/permissions/create') }}" class="btn btn-success" title="ایجاد حق دسترسی جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i> افزودن
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/permissions', 'class' => 'form-inline my-2 my-lg-0 float-left', 'role' => 'search'])  !!}
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
                                        <th>نام</th>
                                        <th>برچسب</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ url('/admin/permissions', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->label }}</td>
                                        <td>
                                            <a href="{{ url('/admin/permissions/' . $item->id) }}" title="نمایش حق دسترسی"><button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/permissions/' . $item->id . '/edit') }}" title="ویرایش حق دسترسی"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/permissions', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fas fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'حذف حق دسترسی',
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
                        <div class="pagination"> {!! $permissions->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
