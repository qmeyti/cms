@extends('front.everb.master')

@section('content')

    @include('front.everb.home.header')

    <main>

        @include('front.everb.home.slider')

        @include('front.everb.home.about_us')

        @include('front.everb.home.brands')

        @include('front.everb.home.video')

        @include('front.everb.home.services')

        @include('front.everb.home.case')

        @include('front.everb.home.team')

        @include('front.everb.home.skill')

        @include('front.everb.home.contact_us')

        @include('front.everb.home.blog')

        @include('front.everb.home.footer_cta')

    </main>

    @include('front.everb.home.footer')

@endsection
