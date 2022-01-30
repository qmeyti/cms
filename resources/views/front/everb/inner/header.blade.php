<!-- header-start -->
<header>
    <div id="sticky-header" class="main-menu-area  menu-2 pt-25 pl-55 pr-85">
        <div class="container-fluid">
            <div class="mb-topbar d-lg-none">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12">
                        <div class="header-top-wrapper">
                            <div class="header-top-info">
                                <span class="mail-header-icon"><i class="far fa-envelope-open"></i>
                                    <a href="mailto:{{__stg('__inner_header_email')}}" class="__cf_email__">{{__stg('__inner_header_email')}}</a>
                                </span>
                                <br>
                                <span><i class="far fa-map-marker-alt"></i>{{__stg('__inner_header_location')}}</span>
                                <span> <i class="far fa-phone"></i> {{__stg('__inner_header_phone')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12">
                        <div class="header-02-right">
                            <div class="header-02-icon f-right">
                                @if(!empty($soc = __stg('__inner_header_social_icon_1')))
                                    <a href="{{__stg('__inner_header_social_url_1')}}"><i class="{{$soc}}"></i></a>
                                @endif

                                @if(!empty($soc = __stg('__inner_header_social_icon_2')))
                                    <a href="{{__stg('__inner_header_social_url_2')}}"><i class="{{$soc}}"></i></a>
                                @endif

                                @if(!empty($soc = __stg('__inner_header_social_icon_3')))
                                    <a href="{{__stg('__inner_header_social_url_3')}}"><i class="{{$soc}}"></i></a>
                                @endif
                            </div>
                            {{--
                                                        <div class="header-lang f-left pos-rel">
                                                            <div class="lang-icon">
                                                                <img src="{{asset('/front/carly/assets/img/icon/map.png')}}" alt="">
                                                                <a href="#">فارسی <i class="far fa-angle-down"></i></a>
                                                            </div>

                                                            <ul class="header-lang-list">
                                                                <li><a href="#">FA</a></li>
                                                                <li><a href="#">EN</a></li>
                                                                <li><a href="#">CA</a></li>
                                                                <li><a href="#">AU</a></li>
                                                            </ul>

                                                        </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{__stg('__logo')}}" alt=""/></a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                    <div class="d-none d-lg-block">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="header-top-wrapper">
                                    <div class="header-top-info">
                                        <span class="mail-header-icon"><i class="far fa-envelope-open"></i>
                                            <a href="mailto:{{__stg('__inner_header_email')}}" class="__cf_email__">{{__stg('__inner_header_email')}}</a>
                                        </span>
                                        <span> <i class="far fa-map-marker-alt"></i>{{__stg('__inner_header_location')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="header-02-right">
                                    <div class="header-02-icon f-left">
                                        @if(!empty($soc = __stg('__inner_header_social_icon_1')))
                                            <a href="{{__stg('__inner_header_social_url_1')}}"><i class="{{$soc}}"></i></a>
                                        @endif

                                        @if(!empty($soc = __stg('__inner_header_social_icon_2')))
                                            <a href="{{__stg('__inner_header_social_url_2')}}"><i class="{{$soc}}"></i></a>
                                        @endif

                                        @if(!empty($soc = __stg('__inner_header_social_icon_3')))
                                            <a href="{{__stg('__inner_header_social_url_3')}}"><i class="{{$soc}}"></i></a>
                                        @endif
                                    </div>
                                    {{--<div class="header-lang f-left pos-rel">
                                        <div class="lang-icon">
                                            <img src="assets/img/icon/map.png" alt="">
                                            <a href="#">فارسی <i class="far fa-angle-down"></i></a>
                                        </div>
                                        <ul class="header-lang-list">
                                            <li><a href="#">FA</a></li>
                                            <li><a href="#">EN</a></li>
                                            <li><a href="#">CA</a></li>
                                            <li><a href="#">AU</a></li>
                                        </ul>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="menu-2-area  d-flex justify-content-between">
                                <div class="main-menu menu-box">
                                    <nav id="mobile-menu">
                                        @php
                                            require_once base_path('resources/views/front/carly/setting/functions.php');
                                            echo get_main_menu();
                                        @endphp
                                    </nav>
                                </div>
                                <div class="header-button">
                                    @if(!empty($cp =__stg('__inner_header_contact_page')) && !is_null($cpa=\App\Models\Page::find($cp)))
                                        <a class="c-btn" href="{{__page_url($cpa)}}">تماس با ما</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <div class="header-2-right f-left d-none d-lg-block">
                        <div class="header-icon ml-15 f-right">
                            <i class="far fa-phone"></i>
                        </div>
                        <div class="header-info">
                            <span>تلفن</span>
                            <h5>{{__stg('__inner_header_phone')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-start -->
