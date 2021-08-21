@extends('front.carly.master')

@section('content')

    @include('front.carly.home.header')

    <main>

        @include('front.carly.home.slider')

        @include('front.carly.home.about_us')

        @include('front.carly.home.brands')

        @include('front.carly.home.video')

        @include('front.carly.home.services')

        @include('front.carly.home.case')

        @include('front.carly.home.team')

        @include('front.carly.home.skill')

        @include('front.carly.home.contact_us')

        @include('front.carly.home.blog')

        @include('front.carly.home.footer_cta')

    </main>

    @include('front.carly.home.footer')

@endsection
