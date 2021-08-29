<!-- header-start -->
<header class="header-transparent">
    <div id="sticky-header" class="main-menu-area menu-bg pl-85">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-4">
                    <div class="logo logo-bg">
                        <a href="{{url('/')}}"><img src="{{__stg('__logo')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 d-none d-lg-block">
                    <div class="main-menu">

                        <nav id="mobile-menu">

                            @php
                                require_once base_path('resources/views/front/carly/setting/functions.php');
                                echo get_main_menu();
                            @endphp

                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-8">
                    <div class="header-right f-left">
                        <div class="header-icon ml-15 f-right">
                            <i class="far fa-phone"></i>
                        </div>
                        <div class="header-info">
                            <span>تلفن</span>
                            <h5>{{__stg('__header_phone')}}</h5>
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
