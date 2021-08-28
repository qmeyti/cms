@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    مدیریت تماس ها
                </h4>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-auto">
                        {!! Form::open(['method' => 'GET', 'url' => route('contacts.index'), 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو...">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>موضوع</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>موبایل</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="{{ route('contacts.show', ['contact' => $item->id]) }}">{{ $item->subject }}</a></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>
                                    <a href="{{ route('contacts.show', ['contact' => $item->id]) }}" title="نمایش حق تماس">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => route('contacts.destroy', ['contact' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'حذف حق تماس',
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
                <div class="pagination"> {!! $contacts->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </section>
@endsection
