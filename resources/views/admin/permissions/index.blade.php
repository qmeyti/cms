@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    حقوق دسترسی
                </h4>
            </div>

            <div class="card-body">
                <div class="row mb-3">

                    <div class="col-sm-auto p-1">
                        {!! Form::open(['method' => 'GET', 'url' => route('permissions.index'), 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو...">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="col d-flex justify-content-end p-1">
                        <a href="{{route('permissions.create')}}" class="btn btn-success" title="ایجاد حق دسترسی جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i>
                            افزودن دسترسی جدید
                        </a>
                    </div>
                </div>

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
                                <td><a href="{{ route('permissions.show',['permission' =>$item->id])}}">{{ $item->name }}</a></td>
                                <td>{{ $item->label }}</td>
                                <td>
                                    <a href="{{ route('permissions.show',['permission' =>$item->id])}}" title="نمایش حق دسترسی">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ route('permissions.edit',['permission' =>$item->id])}}" title="ویرایش حق دسترسی">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' =>  route('permissions.destroy',['permission' =>$item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
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
    </section>
@endsection
