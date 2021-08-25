<!-- service-area-start -->
<div class="service-area ser-pt pb-90" style="background-image: url({{asset('front/carly/assets/img/bg/sbg.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                <div class="section-title white-title text-center mb-90">
                    <h5><span></span>{{__stg('__service_title_1')}}</h5>
                    <h2>{{__stg('__service_title_2')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="service-box mb-30 text-center">
                    <div class="services-icon">
                        @if(!empty($sic = __stg('__service_item_icon_1')))
                            <i class="{{$sic}}"></i>
                        @endif
                    </div>
                    <div class="services-text">
                        <h4>{{__stg('__service_item_title_1')}}</h4>
                        <p>{{__stg('__service_item_body_1')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="service-box active mb-30 text-center">
                    <div class="services-icon">
                        @if(!empty($sic = __stg('__service_item_icon_2')))
                            <i class="{{$sic}}"></i>
                        @endif
                    </div>
                    <div class="services-text">
                        <h4>{{__stg('__service_item_title_2')}}</h4>
                        <p>{{__stg('__service_item_body_2')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="service-box mb-30 text-center">
                    <div class="services-icon">
                        @if(!empty($sic = __stg('__service_item_icon_3')))
                            <i class="{{$sic}}"></i>
                        @endif
                    </div>
                    <div class="services-text">
                        <h4>{{__stg('__service_item_title_3')}}</h4>
                        <p>{{__stg('__service_item_body_3')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="service-box mb-30 text-center">
                    <div class="services-icon">
                        @if(!empty($sic = __stg('__service_item_icon_4')))
                            <i class="{{$sic}}"></i>
                        @endif
                    </div>
                    <div class="services-text">
                        <h4>{{__stg('__service_item_title_4')}}</h4>
                        <p>{{__stg('__service_item_body_4')}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- service-area-end -->
