@extends('front.everb.master')

@section('content')


    @include('front.everb.home.css_start')

    @include('front.everb.home.header')

    @include('front.everb.home.navbar')

    @include('front.everb.home.modal')
    @include('front.everb.home.contact-title')
    @include('front.everb.home.contact-card')
    @include('front.everb.home.contact')
    @include('front.everb.home.map')




    @include('front.everb.home.newsletter')

    @include('front.everb.home.footer')

@endsection
