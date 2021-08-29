@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    اسلایدر
                </h4>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-auto p-1">
                        {!! Form::open(['method' => 'GET', 'url' => route('sliders.index'), 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو..." value="{{ request('search') }}">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col d-flex justify-content-end p-1">
                        <a href="{{ route('sliders.create') }}" class="btn btn-success" title="افزودن اسلایدر جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i>
                            افزودن اسلایدر جدید
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
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
                                        <i class="fas fa-images"></i>
                                        لیست اسلایدها
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('sliders.show' ,['slider' =>  $item->id]) }}" title="نمایش اسلایدر">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ route('sliders.edit' ,['slider' =>  $item->id]) }}" title="ویرایش اسلایدر">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => route('sliders.destroy' ,['slider' =>  $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
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
    </section>
@endsection
