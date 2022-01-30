@extends('front.everb.inner.master')

@section('head')
    <style>
        ul.service-list ul {
            margin-right: 10px;
            margin-top: 7px;
        }
    </style>
@endsection

@section('inner_content')
    <!-- blog-area start -->
    <section class="blog-area pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @foreach($posts as $post)
                        <article class="postbox post format-image mb-40">
                            <div class="postbox__thumb">
                                <a href="{{__page_url($post)}}">
                                    <img src="{{__feature_photo($post, asset('front/carly/assets/img/noimage770x520.png'))}}" alt="{{$post->title}}">
                                </a>
                            </div>
                            <div class="postbox__text p-50">
                                <div class="post-meta mb-15">
                                    <span><i class="far fa-calendar-check"></i>{{__page_date($post)}}</span>
                                    <span><a href="{{__author_url($post)}}"><i class="far fa-user"></i>توسط {{__author($post)}}</a></span>
                                    @if($post->comments_count > 0)
                                        <span><a href="#"><i class="far fa-comments"></i> {{ $post->comments_count }} نظر</a></span>
                                    @endif
                                </div>
                                <h3 class="blog-title">
                                    <a href="{{__page_url($post)}}">{{$post->title}}</a>
                                </h3>
                                <div class="post-text mb-20">
                                    {!! __page_excerpt($post) !!}
                                </div>
                                <div class="read-more mt-30">
                                    <a class="c-btn" href="{{__page_url($post)}}" tabindex="0">بیشتر <i class="far fa-long-arrow-left"></i></a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    {{--
                    <article class="postbox post format-video mb-40">
                        <div class="postbox__video">
                            <img src="assets/img/blog/b2.jpg" alt="blog image">
                            <a class="popup-video video-btn" href="https://www.youtube.com/watch?v=Y6MlVop80y0"><i
                                    class="fas fa-play"></i></a>
                        </div>
                        <div class="postbox__text p-50">
                            <div class="post-meta mb-15">
                                <span><i class="far fa-calendar-check"></i> 15 اسفند , 1399 </span>
                                <span><a href="#"><i class="far fa-user"></i> مدیریت سایت</a></span>
                                <span><a href="#"><i class="far fa-comments"></i> 23 نظر</a></span>
                            </div>
                            <h3 class="blog-title">
                                <a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ.</a>
                            </h3>
                            <div class="post-text mb-20">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                            </div>
                            <div class="read-more mt-30">
                                <a class="c-btn" href="blog-details.html" tabindex="0">بیشتر <i class="far fa-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </article>
                    <article class="postbox post format-gallery mb-40">
                        <div class="postbox__gallery">
                            <img src="assets/img/blog/b3.jpg" alt="blog image">
                            <img src="assets/img/blog/b2.jpg" alt="blog image">
                            <img src="assets/img/blog/b1.jpg" alt="blog image">
                        </div>
                        <div class="postbox__text p-50">
                            <div class="post-meta mb-15">
                                <span><i class="far fa-calendar-check"></i> 15 اسفند , 1399 </span>
                                <span><a href="#"><i class="far fa-user"></i> مدیریت سایت</a></span>
                                <span><a href="#"><i class="far fa-comments"></i> 23 نظر</a></span>
                            </div>
                            <h3 class="blog-title">
                                <a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ.</a>
                            </h3>
                            <div class="post-text mb-20">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                            </div>
                            <div class="read-more mt-30">
                                <a class="c-btn" href="blog-details.html" tabindex="0">بیشتر <i class="far fa-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </article>
                    <article class="postbox post format-audio mb-40">
                        <div class="postbox__audio embed-responsive embed-responsive-16by9">
                            <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/693822901&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                        </div>
                        <div class="postbox__text p-50">
                            <div class="post-meta mb-15">
                                <span><i class="far fa-calendar-check"></i> 15 اسفند , 1399 </span>
                                <span><a href="#"><i class="far fa-user"></i> مدیریت سایت</a></span>
                                <span><a href="#"><i class="far fa-comments"></i> 23 نظر</a></span>
                            </div>
                            <h3 class="blog-title">
                                <a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ.</a>
                            </h3>
                            <div class="post-text mb-20">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                            </div>
                            <div class="read-more mt-30">
                                <a class="c-btn" href="blog-details.html" tabindex="0">بیشتر <i class="far fa-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </article>
                    --}}


                    <div class="basic-pagination basic-pagination-2 mb-40">
                        {{$posts->onEachSide(2)->links('front.carly.paginator')}}

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 mb-30">
                    {{--Search--}}
                    <div class="widget mb-40">
                        <form method="GET" action="{{request()->url()}}" class="search-form">
                            <input type="text" name="q" placeholder="جستجو ...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    {{--./Search--}}
                        <div class="widget mb-40">
                            <h3 class="widget-title">مطالب محبوب</h3>
                            <ul class="recent-posts">
                                @foreach(\App\Models\Page::getPopulars(4) as $pp)
                                    <li>
                                        <div class="widget-posts-image">
                                            <a href="{{__page_url($pp)}}"><img src="{{__feature_photo($pp,asset('front/carly/assets/img/noimage100x100.png'))}}" alt=""></a>
                                        </div>
                                        <div class="widget-posts-body">
                                            <h6 class="widget-posts-title"><a href="{{__page_url($pp)}}">{{\Illuminate\Support\Str::limit($pp->title,70)}}</a></h6>
                                            <div class="widget-posts-meta">{{__page_date($pp)}}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    <div class="widget mb-40">
                        <h3 class="widget-title">دسته بندی ها</h3>
                        @php
                            require_once base_path('resources/views/front/carly/setting/functions.php');
                            echo get_sidebar_categories();
                        @endphp
                    </div>

{{--

                    <div class="widget mb-40">
                        <h3 class="widget-title">شبکه های اجتماعی</h3>
                        <div class="social-profile">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
--}}

                    <div class="widget mb-40">
                        <h3 class="widget-title">برچسب های محبوب</h3>
                        <div class="tag">
                            @foreach($tags as $tag)
                                <a href="{{__tag_url($tag['tag'])}}">{{$tag['tag']}}</a>
                            @endforeach
                        </div>
                    </div>


                    {{--<div class="widget widget-2 p-0 b-0">
                        <div class="banner-widget">
                            <a href="blog-details.html"><img src="assets/img/blog/details/banner.jpg" alt=""></a>
                        </div>
                    </div>--}}


                </div>
            </div>
        </div>
    </section>
    <!-- blog-area end -->
@endsection
