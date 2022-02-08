@extends('front.everb.master')

@section('content')

    @include('front.everb.home.css_start')

    @include('front.everb.home.header')

    @include('front.everb.home.navbar')

    @include('front.everb.home.modal')

    {{-- @include('front.everb.home.blog-details-title') --}}

    @include('front.everb.home.blog-details-area')


    @include('front.everb.home.newsletter')

    @include('front.everb.home.footer')



@endsection
