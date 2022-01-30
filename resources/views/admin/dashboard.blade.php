@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                {{-- {{ __('messages.dashboard.title.second') }} --}}
                {{  __tr('admin.dashboard.title')}}
                </h4>
            </div>
            <div class="card-body">
                {{  __tr('admin.dashboard.description')}}
            </div>
        </div>
    </section>
@endsection
