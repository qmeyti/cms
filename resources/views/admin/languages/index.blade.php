@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    چند زبان
                </h4>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-auto p-1">
                        {!! Form::open(['method' => 'GET', 'url' => route('languages.index'), 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو...">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col d-flex justify-content-end p-1">
                        <a href="{{route('languages.create')}}" class="btn btn-success" title="افزودن زبان جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i>
                            افزودن زبان جدید
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>کد </th>
                            <th>نام زبان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="{{ route('languages.show',['language' =>$item->id])}}">{{ $item->code }}</a></td>
                                <td>{{ $item->language_name }}</td>
                                <td>
                                    <a href="{{ route('languages.show',['language' =>$item->id])}}" title="نمایش زبان">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ route('languages.edit',['language' =>$item->id])}}" title="ویرایش زبان">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' =>  route('languages.destroy',['language' =>$item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'حذف زبان',
                                            'onclick'=>'return confirm("آیا از حذف کردن این زبان مطمعن هستید؟")'
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
                <div class="pagination"> {!! $languages->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </section>
@endsection
