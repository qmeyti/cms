@extends('layouts.backend')
@section('head')
    <style>
        td{
          vertical-align: middle;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">اسلایدهای مربوط به {{$slider->title}}</div>
                    <div class="card-body">
                        <a href="{{ route('sliders.index') }}" class="btn btn-warning" title="بازگشت">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i> بازگشت
                        </a>

                        <a href="{{ route('slides.create',['slider' => $slider->id]) }}" class="btn btn-success" title="ایجاد اسلاید جدید">
                            <i class="fa fa-plus" aria-hidden="true"></i> افزودن
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => route('slides.index',['slider' => $slider->id]), 'class' => 'form-inline my-2 my-lg-0 float-left', 'role' => 'search'])  !!}
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
                                    <th>#</th>
                                    <th></th>
                                    <th>عنوان اسلایدر</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($slide as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img src="{{ $item->image }}" style="width: 80px;" alt=""></td>
                                        <td>{{ $item->header }}</td>
                                        <td>
                                            <a href="{{ route('slides.show',['slide' => $item->id,'slider' => $slider->id]) }}" title="نمایش اسلاید">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            </a>
                                            <a href="{{ route('slides.edit',['slide' => $item->id,'slider' => $slider->id]) }}" title="ویرایش اسلاید">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            </a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => route('slides.destroy',['slide' => $item->id,'slider' => $slider->id]),
                                                'style' => 'display:inline'
                                            ]) !!}

                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'حذف اسلاید',
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
                        <div class="pagination-wrapper"> {!! $slide->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
