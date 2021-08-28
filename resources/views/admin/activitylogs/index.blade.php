@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    لاگ فعالیت ها
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-auto">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/activitylogs', 'class' => 'form-inline', 'role' => 'search'])  !!}

                        <div class="input-group">
                            <input type="text" class="form-control" name="search" dir="rtl" placeholder="جستجو..." value="{{ request('search') }}">
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>فعالیت</th>
                            <th>توسط</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activitylogs as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    @if ($item->causer)
                                        <a href="{{ url('/admin/users/' . $item->causer->id) }}">{{ $item->causer->name }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ url('/admin/activitylogs/' . $item->id) }}" title="View Activity">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/activitylogs', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete Activity',
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
                    {!! $activitylogs->appends(['search' => Request::get('search')])->render() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
