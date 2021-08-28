@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">اسلایدر</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/slider/create') }}" class="btn btn-success" title="افزودن اسلایدر جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i> افزودن
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/slider', 'class' => 'form-inline my-2 my-lg-0 float-left', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو..." value="{{ request('search') }}">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
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
                                    <th>عنوان</th>
                                     <th>اسلایدها</th>
                                     <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($slider as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <a href="{{ route('slides.index',['slider' => $item->id]) }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-picture-o"></i>
                                                مشاهده اسلایدها
                                            </a>

                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/slider/' . $item->id) }}" title="نمایش اسلایدر">
                                                <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                            </a>
                                            <a href="{{ url('/admin/slider/' . $item->id . '/edit') }}" title="ویرایش اسلایدر">
                                                <button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o" aria-hidden="true"></i></button>
                                            </a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/slider', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fas fa-trash-o" aria-hidden="true"></i>', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'حذف اسلایدر',
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
                        <div class="pagination-wrapper"> {!! $slider->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
