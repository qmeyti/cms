@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ $page->title }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/pages') }}" title="بازگشت">
                            <button class="btn btn-warning btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                        </a>
                        <a href="{{ url('/admin/pages/' . $page->id . '/edit') }}" title="ویرایش">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o" aria-hidden="true"></i> ویرایش</button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/pages', $page->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fas fa-trash-o" aria-hidden="true"></i> حذف', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'حذف کردن',
                                'onclick'=>'return confirm("آیا از حذف کردن این نوشته مطمعنی؟")'
                        ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                <tr>
                                    <th>شناسه</th>
                                    <td>{{ $page->id }}</td>
                                </tr>

                                <tr>
                                    <th> عنوان</th>
                                    <td> {{ $page->title }} </td>
                                </tr>

                                <tr>
                                    <th>عنوان انگلیسی</th>
                                    <td> {{ $page->slug }} </td>
                                </tr>

                                <tr>
                                    <th> نوع</th>
                                    <td>{{ str_replace(['post','page'],['خبر','صفحه'],$page->type) }}</td>
                                </tr>

                                <tr>
                                    <th> وضعیت</th>
                                    <td>{{ str_replace(['draft','published','trash','pending'],['پست موقت','منتشر شده','زباله دان','انتظار تایید'],$page->status) }}</td>
                                </tr>

                                <tr>
                                    <th> نویسنده</th>
                                    <td>{{ $page->writer->name }} {{ $page->writer->family }}</td>
                                </tr>

                                <tr>
                                    <th> دسته بندی یا صفحه والد</th>
                                    <td>
                                        @if($page->type === 'page')
                                            @if(!is_null($pa = ($page->parent()->first())))
                                                {{$pa->title}}
                                            @endif
                                        @else
                                            @foreach($page->categories as $cat)
                                                <span style="box-shadow: 1px 1px 2px rgba(0,0,0,.125);border-radius: 3px;background-color: rgba(0,0,0,.03);margin: 3px;padding:3px;font-size: .8rem;">{{$cat->title}}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                     <th>عملیات</th>
                                    <td>
                                        @foreach($page->tags as $tag)
                                            <span style="box-shadow: 1px 1px 2px rgba(0,0,0,.125);border-radius: 3px;background-color: rgba(0,0,0,.03);margin: 3px;padding:3px;font-size: .8rem;">{{$tag->name}}</span>
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <th> محتوا</th>
                                    <td> {!! html_entity_decode($page->content) !!} </td>
                                </tr>

                                <tr>
                                    <th> خلاصه</th>
                                    <td> {!! html_entity_decode($page->excerpt) !!} </td>
                                </tr>

                                <tr>
                                    <th> توضیحات متا</th>
                                    <td> {!! html_entity_decode($page->meta_description) !!} </td>
                                </tr>

                                @if(!empty($page->feature_photo))
                                    <tr>
                                        <th>تصویر شاخص</th>
                                        <td>
                                            <img src="{{$page->feature_photo}}" style="max-width: 100%;">
                                        </td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
