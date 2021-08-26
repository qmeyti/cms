@extends('layouts.backend')

@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    لیست صفحات و خبرهای سایت
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="{{ url('/admin/pages/create') }}" class="btn btn-success" title="ایجاد صفحه جدید">
                            <span class="bi bi-plus-circle-fill" aria-hidden="true"></span>
                            افزودن
                        </a>
                    </div>
                    <div class="col">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/pages', 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو..." value="{{ request('search') }}">
                            <button class="btn btn-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>




                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>عنوان</th>
                            <th>نوع</th>
                            <th>وضعیت</th>
                            <th>نویسنده</th>
                            <th>دسته بندی | والد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $item)
                            <tr>
                                <td>{{ $item->id }}</td>

                                <td><a href="{{route('pages.edit',['page' => $item->id])}}">{{$item->title}}</a></td>

                                <td>{{ str_replace(['post','page'],['خبر','صفحه'],$item->type) }}</td>

                                <td>{{ str_replace(['draft','published','trash','pending'],['پست موقت','منتشر شده','زباله دان','انتظار تایید'],$item->status) }}</td>

                                <td>{{ $item->writer->name }} {{ $item->writer->family }}</td>

                                <td>
                                    @if($item->type === 'page')
                                        @if(!is_null($pa = ($item->parent()->first())))
                                            {{$pa->title}}
                                        @endif
                                    @else
                                        @if(!is_null($cat = ($item->categories->first())))
                                            {{$cat->title}}
                                        @endif
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ url('/admin/pages/' . $item->id) }}" title="مشاهده صفحه"><button class="btn btn-info btn-sm"><i class="bi bi-eye" aria-hidden="true"></i></button></a>
                                    <a href="{{ url('/admin/pages/' . $item->id . '/edit') }}" title="ویرایش صفحه"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/pages', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'ویرایش صفحه',
                                            'onclick'=>'return confirm("آیا مطمعنی که میخواهی این صفحه را حذف کنی؟")'
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
                {!! $pages->appends(['search' => Request::get('search')])->render() !!}
            </div>
        </div>
    </section>
@endsection

{{--
@section('scripts')
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
@endsection
--}}
