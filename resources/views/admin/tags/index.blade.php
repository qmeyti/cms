@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    برچسب ها
                </h4>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-auto p-1">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/tags', 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو..." value="{{ request('search') }}">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="col d-flex justify-content-end p-1">
                        <a href="{{ url('/admin/tags/create') }}" class="btn btn-success" title="افزودن برچسب جدید">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            افزودن برچسب
                        </a>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام برچسب</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ url('/admin/tags/' . $item->id) }}" title="نمایش برچسب">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ url('/admin/tags/' . $item->id . '/edit') }}" title="ویرایش برچسب">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-pencil-ruler" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/tags', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'حذف برچسب',
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
                <div class="pagination-wrapper">
                    {!! $tags->appends(['search' => Request::get('search')])->render() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
