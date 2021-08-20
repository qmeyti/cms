@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">مدیریت تنظیمات</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/settings/create') }}" class="btn btn-success" title="افزودن تنظیمات جدید">
                            <i class="fa fa-plus" aria-hidden="true"></i> افزودن
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/settings', 'class' => 'form-inline my-2 my-lg-0 float-left', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو..." value="{{ request('search') }}">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>کلید</th>
                                    <th>نوع داده ای</th>
                                    <th>بخش فعال</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settings as $item)
                                    <tr>
                                        <td class="ltr">{{ $item->key }}</td>
                                        <td>{{ str_replace(['int','float','json','bool','string','text'],['عدد صحیح','اعشاری','جیسون','صحیح غلط','رشته تک خطی','رشته چند خطی'],$item->type) }}</td>
                                        <td>
                                            @if($item->part == 'admin')
                                                پنل مدیر
                                            @elseif($item->part === 'home')
                                                سمت کاربر
                                            @else
                                                عمومی
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ url('/admin/settings/' . $item->id) }}" title="View Setting">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            </a>
                                            <a href="{{ url('/admin/settings/' . $item->id . '/edit') }}" title="Edit Setting">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            </a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/settings', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'حذف تنظیم',
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
                        <div class="pagination-wrapper"> {!! $settings->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
