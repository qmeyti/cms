@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                                            <h4 class="card-title">

                        فعالیت {{ $activitylog->id }}
                                            </h4>

                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                        <a href="{{ url('/admin/activitylogs') }}" title="بازگشت"><button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button></a>
                                {!! Form::open([
         'method'=>'DELETE',
         'url' => ['admin/activitylogs', $activitylog->id],
         'style' => 'display:inline'
     ]) !!}
                                {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i> حذف', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete Activity',
                                        'onclick'=>'return confirm("آیا از حذف کردن این گزینه مطعن هستید؟")'
                                ))!!}
                                {!! Form::close() !!}
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>شناسه</th><td>{{ $activitylog->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> فعالیت </th><td> {{ $activitylog->description }} </td>
                                    </tr>
                                    <tr>
                                        <th> توسط </th>
                                        <td>
                                            @if ($activitylog->causer)
                                                <a href="{{ url('/admin/users/' . $activitylog->causer->id) }}">{{ $activitylog->causer->name }}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> تاریخ </th><td> {{ $activitylog->created_at }} </td>
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
