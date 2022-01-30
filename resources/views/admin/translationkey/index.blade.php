@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    ترجمه ها
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">

                    <div class="col-sm-auto p-1">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/category', 'class' => 'form-inline', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="جستجو..." value="{{ request('search') }}">

                            <button class="btn btn-secondary " type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="col d-flex justify-content-end p-1">
                        <a href="{{ url('/admin/translationkey/create') }}" class="btn btn-success" title="افزودن یک دسته جدید">
                            <i class="fas fa-plus" aria-hidden="true"></i>
                            افزودن ترجمه جدبد
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>کلید</th>
                            <th>ساید</th>
                            <th>عملیات</th>
                            <th>افزودن زبان</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($translationkey as $item)
                            <tr>

                                @php
                                // dd($item->translations->where('language', 'fa'))
                                @endphp
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->key }}</td>
                                <td>{{ $item->side }}</td>
                                <td>
                                    <a href="{{ url('/admin/translationkey/' . $item->id) }}" title="نمایش دسته بندی">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ url('/admin/translationkey/' . $item->id . '/edit') }}" title="ویرایش دسته بندی">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i></button>
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/translationkey', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'حذف دسته بندی',
                                            'onclick'=>'return confirm("مطمعنی که قصد حذف کردن داری؟")'
                                    )) !!}
                                    {!! Form::close() !!}
                                </td>

                                <td>
                                    @foreach($languages as $language )


                                        {{-- <a href="{{  url('/admin/transitionkey/' . $item->id . '/edit')}}" title="{{ $language->language_name }}"  class="btn btn-success btn-sm">
                                           {{ $language->code }}
                                        </a> --}}
                                        @php
                                            // dd(null !==$item->translations->where('language', $language->code) );
                                            // route('transitions.edit',['id' => $item->id])
                                             $languagetranslation=$item->translations->where('language', $language->code)->first();
                                            //   dd($languagetranslation->id)
                                        @endphp


                                        @if(null !==$languagetranslation )
                                        <a href="{{  url('/admin/translations/' . $languagetranslation->id . '/edit')  }}" title="{{ $language->language_name }}"  class="btn btn-success btn-sm">
                                            {{ $language->code }}
                                         </a>

                                         @else


                                        <a href="{{  route('translations.create',['key_id' => $item->id,'language' => $language->code])  }}" title="{{ $language->language_name }}"  class="btn btn-danger btn-sm">
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
                <div class="pagination-wrapper">
                    {!! $translationkey->appends(['search' => Request::get('search')])->render() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
