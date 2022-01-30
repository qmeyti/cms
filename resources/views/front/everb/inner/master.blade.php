@extends('front.everb.master')

@section('content')

    @include('front.everb.inner.header')

    <main>
        @include('front.everb.inner.breadcrumb_area')

        @yield('inner_content')
    </main>

    @include('front.everb.home.footer')

@endsection
