@php
    require_once base_path('resources/views/front/carly/setting/functions.php');
@endphp

<!-- blog-area-start -->
<div class="blog-area blog-padding pt-235 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                <div class="section-title text-center mb-90">
                    <h5><span></span>{{__stg('__blog_title_1')}}</h5>
                    <h2>{{__stg('__blog_title_2')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if(!is_null($blogSidePost = \App\Models\Page::where('type','post')->where('status','published')->where('is_translation',0)->orderBy('id','DESC')->first()))
                <div class="col-xl-4 col-lg-4 col-md-6 d-none d-lg-block">
                    <div class="blog-wrapper mb-30">
                        <div class="blog-img">
                            <a href="{{__page_url($blogSidePost)}}">

                                <img src="{{__feature_photo($blogSidePost,asset('front/carly/assets/img/noimage370x650.png'))}}" alt="">

                            </a>
                            <div class="blog-date">
                                <a href="{{__page_url($blogSidePost)}}">اخبار</a>
                            </div>
                            <div class="blog-text">
                                <div class="blog-meta">
                                    <span><a href="{{__page_url($blogSidePost)}}"> <i class="far fa-calendar-alt"></i>{{jdate($blogSidePost->creatd_at ?? now())->format('d F , Y')}}</a></span>
                                    <span> <a href="{{__page_url($blogSidePost)}}"> <i class="far fa-user-alt"></i>توسط {{$blogSidePost->writer->name}} {{$blogSidePost->writer->family}}</a></span>
                                </div>
                                <h4><a href="{{__page_url($blogSidePost)}}">{{$blogSidePost->title}}</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @php
                $lastPosts = \App\Models\Page::with('writer')
                    ->where('is_translation',0)
                    ->where('type', 'post')
                    ->where('status', 'published')
                    ->orderBy('id','DESC')
                    ->limit(4);
                    if (!is_null($blogSidePost))
                        $lastPosts->where('id','!=',$blogSidePost->id);
                    $lastPosts = $lastPosts->get();
            @endphp
            <div class="col-xl-8 col-lg-8">
                <div class="row">
                    @foreach($lastPosts as $blog)
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="blog-wrapper mb-40">
                                <div class="blog-img">
                                    <a href="{{__page_url($blog)}}"><img src="{{__feature_photo($blog,asset('front/carly/assets/img/noimage370x250.png'))}}" alt=""></a>
                                    <div class="blog-date">
                                        <a href="{{__page_url($blog)}}">اخبار</a>
                                    </div>
                                    <div class="blog-text">
                                        <div class="blog-meta">
                                            <span><a href="{{__page_url($blog)}}"> <i class="far fa-calendar-alt"></i>{{__page_date($blog)}}</a></span>
                                            <span> <a href="{{__page_url($blog)}}"> <i class="far fa-user-alt"></i>توسط {{__author($blog)}}</a></span>
                                        </div>
                                        <h4><a href="{{__page_url($blog)}}">مشاوران عملی</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
<!-- blog-area-end -->
