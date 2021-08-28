@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">مشاهده تنظیم</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/settings') }}" title="بازگشت"><button class="btn btn-warning btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>
                        <a href="{{ url('/admin/settings/' . $setting->id . '/edit') }}" title="ویرایش تنظیمات"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o" aria-hidden="true"></i> ویرایش</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/settings', $setting->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fas fa-trash-o" aria-hidden="true"></i> حذف', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'حذف تنظیم',
                                    'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th> کلید </th>
                                        <td class="ltr"> {{ $setting->key }} </td>
                                    </tr>

                                    <tr>
                                        <th> نوع داده ای </th>
                                        <td>
                                            {{ str_replace(['int','float','json','bool','string','text'],['عدد صحیح','اعشاری','جیسون','صحیح غلط','رشته تک خطی','رشته چند خطی'],$setting->type) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th> بخش مورد استفاده </th>
                                        <td>
                                            @if($setting->part == 'admin')
                                                پنل مدیر
                                            @elseif($setting->part === 'home')
                                                سمت کاربر
                                            @else
                                                عمومی
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th> مقدار </th><td> {{ $setting->value }} </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
