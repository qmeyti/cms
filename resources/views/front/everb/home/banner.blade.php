<!-- Banner Section Start -->
<div class="main-banner">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="banner-text">
                            <h1>{{ $mainPage->title }}</h1>
                            <p>{{ $mainPage->excerpt }}</p>
                            <div class="theme-button">
                                <a href="{{ route('front.single.id',$mainPage->id) }}" class="default-btn">شروع کار</a>
                                <a href="{{__stg('__main_page_video_page_link')}}" class="video-btn popup-vimeo">
                                    <i class="flaticon-play"></i>
                                    مشاهده ویدیو
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="banner-image">
                            <img src="{{__stg('__main_page_image')}}" alt="banner image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- Banner Section End -->
