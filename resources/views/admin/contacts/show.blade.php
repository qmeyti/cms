@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">نمایش پیام</div>
                    <div class="card-body">

                        <a href="{{ route('contacts.index') }}" title="بازگشت"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>

                        {!! Form::open(['method' => 'DELETE', 'url' => route('contacts.destroy', ['contact' => $contact->id]), 'style' => 'display:inline']) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> حذف', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'حذف حق تماس',
                                'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                        )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                <tr>
                                    <th>شناسه</th>
                                    <td>{{ $contact->id }}</td>
                                </tr>

                                <tr>
                                    <th> موضوع</th>
                                    <td> {{ $contact->subject }} </td>
                                </tr>

                                <tr>
                                    <th>عنوان</th>
                                    <td> {{ $contact->name }} </td>
                                </tr>

                                <tr>
                                    <th>ایمیل</th>
                                    <td> {{ $contact->email }} </td>
                                </tr>

                                <tr>
                                    <th>شماره تماس</th>
                                    <td> {{ $contact->mobile }} </td>
                                </tr>

                                <tr>
                                    <th> متن کامل</th>
                                    <td> {{ $contact->message }} </td>
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
