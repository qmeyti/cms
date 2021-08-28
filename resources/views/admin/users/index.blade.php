@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    کاربران
                </h4>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-auto p-1">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو...">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="col d-flex justify-content-end p-1">
                        <a href="{{ url('/admin/users/create') }}" class="btn btn-success" title="افزودن کاربر جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i> افزودن
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>گزینه ها</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="{{ route('users.show',['user' => $item->id]) }}">{{ $item->name }}</a></td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ route('users.show',['user' => $item->id]) }}" title="نمایش کاربر">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ route('users.edit',['user' => $item->id]) }}" title="ویرایش کاربر">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => route('users.destroy', $item->id),
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'حذف کاربر',
                                            'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                                    )) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </section>
@endsection
