@extends('front.carly.inner.master')

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
                <div class="col-lg-8 col-lg-8">
                    <article class="postbox post format-image mb-30">
                        <div class="postbox__thumb mb-35">
                            <img src="{{__stg($post,asset('/front/carly/assets/img/noimage770x520.png'))}}" alt="{{$post->title}}">
                        </div>
                        <div class="postbox__text bg-none">
                            <div class="post-meta mb-15">
                                <span><i class="far fa-calendar-check"></i>{{__page_date($post)}}</span>
                                <span><a href="#"><i class="far fa-user"></i>{{__author($post)}}</a></span>
                                @if($post->comments_count > 0)
                                    <span><a href="#"><i class="far fa-comments"></i> {{ $post->comments_count }} نظر</a></span>
                                @endif

                            </div>
                            <h3 class="blog-title">
                                {{__page_title($post)}}
                            </h3>
                            <div class="post-text mb-20">
                                {!! __page_content($post) !!}
                            </div>
                            <div class="row mt-50">
                                <div class="col-xl-8 col-lg-8 col-md-8 mb-15">
                                    <div class="blog-post-tag">
                                        <span>برچسب های مرتبط</span>
                                        @foreach($tags as $tag)
                                            <a href="{{__tag_url($tag['tag'])}}">{{$tag['tag']}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 mb-15">
                                    <div class="blog-share-icon text-right text-md-left">
                                        <span>اشتراک گذاری: </span>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="navigation-border pt-50 mt-40"></div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    @if(!is_null($prev))
                                        <div class="bakix-navigation b-next-post text-right mb-30">
                                            <span><a href="{{__page_url($prev)}}">قبلی</a></span>
                                            <h4><a href="{{__page_url($prev)}}">{{\Illuminate\Support\Str::limit($prev->title,50)}}</a></h4>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    @if(!is_null($next))
                                        <div class="bakix-navigation b-next-post text-right text-md-left mb-30">
                                            <span><a href="{{__page_url($next)}}">بعدی</a></span>
                                            <h4><a href="{{__page_url($next)}}">{{\Illuminate\Support\Str::limit($next->title,50)}}</a></h4>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="b-author mt-40 mb-60">
                            <div class="author-img">
                                <img src="{{empty($post->writer->avatar)?asset('front/carly/assets/img/author.png'):$post->writer->avatar}}" alt="">
                            </div>
                            <div class="author-text">
                                <h3>{{__author($post, 'nickname')}}</h3>
                                <p>{{$post->writer->about}}</p>
                                <div class="author-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-behance-square"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="post-comments">
                            <div class="blog-coment-title mb-30">
                                <h2>{{$post->comments_count}} نظر</h2>
                            </div>
                            <div class="latest-comments">
                                <ul>
                                    @foreach($post->comments as $comment)
                                        <li>
                                            <div class="comments-box">
                                                <div class="comments-avatar">
                                                    @if(empty($comment->user_id))
                                                        <img src="{{url($comment->user->avatar ?? asset('front/carly/assets/img/author.png'))}}" alt="">
                                                    @else
                                                        <img src="{{asset('front/carly/assets/img/author.png')}}" alt="">
                                                    @endif
                                                </div>
                                                <div class="comments-text">
                                                    <div class="avatar-name">
                                                        <h5>{{!empty($comment->user_id) ? $comment->user->name . ' ' .$comment->user->last_name : $comment->name}}</h5>
                                                        <span>{{__comment_date($comment)}}</span>
                                                        {{--                                                    <a class="reply" href="#"><i class="fas fa-reply"></i>پاسخ</a>--}}
                                                    </div>
                                                    <div>
                                                        {!! html_entity_decode($comment->body) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        @if(auth()->check() || __stg('guest_can_write_comment', false) === true)
                            <div class="post-comments-form">
                                <div class="post-comments-title">
                                    <h2>ارسال نظرات</h2>
                                </div>
                                <form enctype="multipart/form-data" id="contacts-form" class="conatct-post-form" method="POST" action="{{route('front.comments.store')}}">
                                    @csrf
                                    <div class="row">
                                        @if(!auth()->check())
                                            <div class="col-xl-12">
                                                <div class="contact-icon contacts-name">
                                                    <input type="text" name="name" value="{{old('name')}}" placeholder="نام شما">
                                                    @error('name')
                                                    <span class="text-muted">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="contact-icon contacts-email">
                                                    <input type="email" name="email" value="{{old('email')}}" placeholder="ایمیل شما">
                                                    @error('email')
                                                    <span class="text-muted">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-xl-12">
                                            <div class="contact-icon contacts-message">
                                                <textarea name="body" id="comments" cols="30" rows="10" placeholder="نظرات شما">{{old('value')}}</textarea>
                                                @error('value')
                                                <span class="text-muted">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <input type="hidden" name="reply_to" value="0">
                                            <input type="hidden" name="page_id" value="{{$post->id}}">
                                            <button class="c-btn" type="submit"> ارسال نظر <i class="far fa-long-arrow-left"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </article>
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
                            @foreach(\App\Models\Tag::getMostPopularAllOver(24) as $tag)
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
