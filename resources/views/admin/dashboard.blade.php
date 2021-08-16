@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">داشبورد</div>

                    <div class="card-body">
                        داشبورد اپلیکیشن شما
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
