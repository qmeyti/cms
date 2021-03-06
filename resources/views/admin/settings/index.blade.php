@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    مدیریت تنظیمات
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">

                    <div class="col-sm-auto p-1">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/settings', 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو..." value="{{ request('search') }}">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col d-flex justify-content-end p-1">
                        <a href="{{ url('/admin/settings/create') }}" class="btn btn-success" title="افزودن تنظیمات جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i>
                            افزودن تنظیم جدید
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
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
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ url('/admin/settings/' . $item->id . '/edit') }}" title="Edit Setting">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/settings', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
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
    </section>
@endsection
