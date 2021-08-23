@php
    $slider = \App\Models\Slider::with('slides')->where('id',__stg('__main_slider'))->first();
@endphp

@if(!is_null($slider) && $slider->slides->count() > 0)
    <!-- hero-area start -->
    <section class="hero-area">
        <div class="hero-slider">
            <div class="slider-active">
                @foreach($slider->slides as $slide)
                    <div class="single-slider slider-height d-flex align-items-center" data-background="{{$slide->image}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="hero-text hero-info">
                                        <div class="hero-slider-caption ">

                                            @if(!empty($slide->text1))
                                                <h5 data-animation="fadeInUp" data-delay=".2s">{{$slide->text1}}<span></span></h5>
                                            @endif

                                            @if(!empty($slide->text2))
                                                <h2 data-animation="fadeInUp" data-delay=".4s">{{$slide->text2}}</h2>
                                            @endif

                                        </div>
                                        <div class="hero-slider-btn">

                                            @if(!empty($slide->button1_url))
                                                <a data-animation="fadeInRight" data-delay=".6s" href="{{$slide->button1_url}}" class="c-btn">{{$slide->button1_text}}<i class="far fa-long-arrow-left"></i></a>
                                            @endif

                                            @if(!empty($slide->button2_url))
                                                <a data-animation="fadeInLeft" data-delay="1.0s" href="{{$slide->button2_url}}" class="c-btn btn-border">{{$slide->button2_text}}<i class="far fa-long-arrow-left"></i></a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- hero-area end -->
@endif
