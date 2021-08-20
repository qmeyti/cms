@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        مشاهده اسلاید {{ $slide->id }} از {{$slider->title}}
                    </div>
                    <div class="card-body">

                        <a href="{{ route('slides.index',['slider' => $slider->id]) }}" title="بازگشت"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>
                        <a href="{{ route('slides.edit',['slider' => $slider->id,'slide' => $slide->id])}}" title="ویرایش اسلاید"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ویرایش</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => route('slides.destroy',['slider' => $slider->id,'slide' => $slide->id]),
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> حذف', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'حذف اسلاید',
                                    'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>شناسه</th><td>{{ $slide->id }}</td>
                                    </tr>
                                    <tr><th> عنوان </th><td> {{ $slide->header }} </td></tr>
                                    <tr><th> توضیحات ۱ </th><td> {{ $slide->text1 }} </td></tr>
                                    <tr><th> توضیحات ۲ </th><td> {{ $slide->text2 }} </td></tr>
                                    <tr><th> لینک اسلاید </th><td> {{ $slide->url }} </td></tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <img src="{{ $slide->image }}" style="max-width: 100%;" alt="">
                                        </td>
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
