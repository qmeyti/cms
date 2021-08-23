@php
    $aboutPage = \App\Models\Page::find(__stg('__about_page'));
@endphp

@if(!is_null($aboutPage))
    <!-- about-us-area-start -->
    <div class="about-us-area pos-rel grey-bg pb-210 pt-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-us-img pos-rel mb-30">

                        <div class="ab-image fix">
                            @if(!empty($__about_image = __stg('__about_image')))
                                <img src="{{$__about_image}}" alt="">
                            @endif
                        </div>

                        @if(($__about_experience_days = __stg('__about_experience_days', 0)) > 0)
                            <div class="about-info">
                                <h2>{{$__about_experience_days}}</h2>
                                <h5>سال <br> تجربه</h5>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-us-wrapper mb-30">
                        <div class="section-title mb-45">
                            <h5><span></span>{{$aboutPage->title}} </h5>
                            @if(!empty($__about_title = __stg('__about_title')))
                                <h2>{{$__about_title}}</h2>
                            @endif
                            <p>{{$aboutPage->excerpt}}</p>
                        </div>
                        <div class="row">
                            @if(!empty($__about_list_items_1 = __stg('__about_list_items_1')))
                                <div class="col-xl-6 col-md-6 mb-45">
                                    <div class="about-list">
                                        <h4>{{__stg('__about_list_title_1')}}</h4>
                                        <ul>
                                            @foreach(explode("\n", $__about_list_items_1) as $ln)
                                                <li>{{$ln}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($__about_list_items_2 = __stg('__about_list_items_2')))
                                <div class="col-xl-6 col-md-6 mb-45">
                                    <div class="about-list">
                                        <h4>{{__stg('__about_list_title_2')}}</h4>
                                        <ul>
                                            @foreach(explode("\n", $__about_list_items_2) as $ln)
                                                <li>{{$ln}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="about-button d-md-flex">

                            @if(!empty($__about_button_url = __stg('__about_button_url')))
                                <a class="c-btn" href="{{$__about_button_url}}">{{__stg('__about_button_text','بیشتر...')}} <i class="far fa-long-arrow-left"></i></a>
                            @endif

                            @if(!empty($__about_phone =__stg('__about_phone')))
                                <div class="about-cta">
                                    <span>شماره تماس</span>
                                    <h3>{{$__about_phone}}</h3>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-us-area-end -->
@endif
