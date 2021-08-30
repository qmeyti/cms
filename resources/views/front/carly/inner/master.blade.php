@extends('front.carly.master')

@section('content')

    @include('front.carly.inner.header')

    <main>
        @include('front.carly.inner.breadcrumb_area')

        @yield('inner_content')
    </main>

    @include('front.carly.home.footer')

@endsection
