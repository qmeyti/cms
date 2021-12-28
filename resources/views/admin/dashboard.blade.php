@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                {{ __('messages.dashboard.title.second') }}
                </h4>
            </div>
            <div class="card-body">
            {{ __('messages.dashboard.title.third') }}
            </div>
        </div>
    </section>
@endsection
