@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">مدیریت تماس ها</div>
                    <div class="card-body">

                        {!! Form::open(['method' => 'GET', 'url' => route('contacts.index'), 'class' => 'form-inline my-2 my-lg-0 float-left', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو...">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
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
                                            <a href="{{ route('contacts.show', ['contact' => $item->id]) }}" title="نمایش حق تماس"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => route('contacts.destroy', ['contact' => $item->id]),
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
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
            </div>
        </div>
    </div>
@endsection
