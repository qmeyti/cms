<!DOCTYPE html>
<html dir='RTL' lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free-5.15.4-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/mazer/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admins/mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('admins/mazer/assets/css/app.rtl.css')}}">

    <link rel="stylesheet" href={{ asset('assets/style/main.css') }}>
    {{--Todo change icon--}}
    {{--    <link rel="shortcut icon" href="{{asset('admins/mazer/assets/images/favicon.svg')}}" type="image/x-icon">--}}
    @yield('head')

</head>

<body>

<div id="app">

    @include('admin.sidebar')

    <div id="main" class='layout-navbar'>
        @include('admin.topbar')

        <div id="main-content">

            <div class="page-heading">

                @include('admin.page_title')

                @if (Session::has('flash_message'))
                    <section class="section">
                        <div class="alert alert-light-success color-success"><i class="bi bi-star"></i>
                            {{ Session::get('flash_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </section>
                @endif

                @if (Session::has('flash_error'))
                    <section class="section">
                        <div class="alert alert-light-danger color-danger"><i class="bi bi-star"></i>
                            {{ Session::get('flash_error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </section>
                @endif

                @yield('content')


            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>کپی رایت {{ date('Y') }} &copy;</p>
                    </div>
                    <div class="float-end">
                        <p>قدرت گرفته از <span class="text-danger"> <i class="bi bi-heart-fill icon-mid"></i></span> <a href="https://laravel.com"> لاراول</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>


<script src="{{asset('admins/mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admins/mazer/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admins/mazer/assets/js/main.js')}}"></script>
@yield('scripts')

</body>

</html>
