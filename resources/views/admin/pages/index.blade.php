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

                <div class="row mb-3">
                    <div class="col-sm-auto p-1">
                        {!! Form::open(['method' => 'GET', 'url' => route('pages.index'), 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو..." value="{{ request('search') }}">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="col d-flex justify-content-end p-1">
                        <a href="{{ route('pages.create') }}" class="btn btn-success" title="ایجاد صفحه جدید">
                            <span class="fas fa-plus-circle" aria-hidden="true"></span>
                            افزودن نوشته جدید
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>عنوان</th>
                            <th>نوع</th>
                            <th>وضعیت</th>
                            <th>نویسنده</th>
                            <th>دسته بندی | والد</th>
                            <th>زبان</th>
                            <th>عملیات</th>
                            <th>افزودن زبان</th>

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
                                <td>{{ $item->language=='fa' ? 'فارسی' : 'English'}}</td>

                                <td>
                                    <a href="{{ route('pages.show',['page' => $item->id]) }}" title="مشاهده صفحه">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ route('pages.edit',['page' => $item->id]) }}" title="ویرایش صفحه">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => route('pages.destroy',['page' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'ویرایش صفحه',
                                            'onclick'=>'return confirm("آیا مطمعنی که میخواهی این صفحه را حذف کنی؟")'
                                    )) !!}
                                    {!! Form::close() !!}
                                </td>

                                <td>
                                    @foreach($languages as $language )

                                        @php
                                           if($item->language===$language->code)
                                            continue;

                                        //    $hastranslation = $item->translations->where('language',$language->code)->count() > 0 ;

                                           $hastranslation = $item->translations->where('language',$language->code)->first();

                                        @endphp

                                    @if($hastranslation)

                                        <a href=" {{  route( 'pages.edit',['page' => $hastranslation->id]  )  }}" title="{{ $language->language_name }} "   class="btn btn-success btn-sm">
                                           {{ $language->code }}
                                        </a>

                                        @else
                                        <a href='{{ route('pages.create',['parent'=>$item->id,'language'=>$language->code]) }}'  title="{{ $language->language_name }}"  class="btn btn-danger btn-sm">
                                            {{ $language->code }}
                                        </a>

                                    @endif

                                    @endforeach
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
