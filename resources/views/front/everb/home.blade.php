@extends('front.everb.master')

@section('content')

        @include('front.everb.home.css_start')

        @include('front.everb.home.header')

        @include('front.everb.home.navbar')

        @include('front.everb.home.modal')

        @if(!is_null($mainPage= \App\Models\Page::where('id' ,__stg('__main_page',0))->first()))
        @include('front.everb.home.banner',['mainPage' =>$mainPage ])
        @endif

        @include('front.everb.home.video')

        @include('front.everb.home.theory')

        @include('front.everb.home.about')

        @include('front.everb.home.services')
        @include('front.everb.home.team')
        @include('front.everb.home.testimonial')
        @include('front.everb.home.portfolio')

        @include('front.everb.home.progress')

        @include('front.everb.home.blog')
        @include('front.everb.home.contact')
        @include('front.everb.home.newsletter')

        @include('front.everb.home.footer')

@endsection
