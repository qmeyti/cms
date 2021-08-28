@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    دسته بندی های صفحات
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">

                    <div class="col-sm-auto p-1">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/category', 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو..." value="{{ request('search') }}">

                            <button class="btn btn-secondary " type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="col d-flex justify-content-end p-1">
                        <a href="{{ url('/admin/category/create') }}" class="btn btn-success" title="افزودن یک دسته جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i>
                            افزودن دسته جدید
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>نامک</th>
                            <th>والد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ is_null($c = $item->parent()->first()) ? '' : $c->title }}</td>
                                <td>
                                    <a href="{{ url('/admin/category/' . $item->id) }}" title="نمایش دسته بندی">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ url('/admin/category/' . $item->id . '/edit') }}" title="ویرایش دسته بندی">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/category', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'حذف دسته بندی',
                                            'onclick'=>'return confirm("مطمعنی که قصد حذف کردن داری؟")'
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
                <div class="pagination-wrapper">
                    {!! $category->appends(['search' => Request::get('search')])->render() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
