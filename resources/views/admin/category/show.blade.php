@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ $category->title }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/category') }}" title="بازگشت"><button class="btn btn-warning btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>
                        <a href="{{ url('/admin/category/' . $category->id . '/edit') }}" title="ویرایش دسته بندی"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o" aria-hidden="true"></i> ویرایش</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/category', $category->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> حذف', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'حذف دسته بندی',
                                    'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                <tr>
                                        <th>شناسه</th><td>{{ $category->id }}</td>
                                    </tr>

                                    <tr>
                                        <th> عنوان </th>
                                        <td> {{ $category->title }} </td>
                                    </tr>
                                    <tr>
                                        <th> نامک </th>
                                        <td> {{ $category->slug }} </td>
                                    </tr>

                                    <tr>
                                        <th> دسته والد </th>
                                        <td> {{ is_null($cat= $category->parent()->first())?'':$cat->title }} </td>
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
