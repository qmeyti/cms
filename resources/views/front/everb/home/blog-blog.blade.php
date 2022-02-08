
<!-- Blog Section Start -->
<section class="blog-section blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="blog-search">
                    <form>
                        <input type="text" placeholder="جستجو">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>

                <div class="recent-blog">
                    <h3>پست های اخیر</h3>

                    @foreach($lastposts as $item)

                    <article class="recent-post">
                        <a href="{{ route('front.single.id',$item->id) }}"><img src="{{ __feature_photo($item) }}" alt="recent post image"></a>
                        <h3><a href="{{ route('front.single.id',$item->id) }}">{{ $item->title}}</a></h3>
                        <ul>
                            <li>
                                <i class="icofont-user-alt-3"></i>
                                {{  $item->writer->getFullName()  }}
                            </li>
                            <li>
                                <i class="icofont-user-alt-3"></i>
                                {{__page_date($item)}}
                            </li>
                        </ul>
                    </article>
                    @endforeach
                </div>

                <div class="blog-category">
                    <h3>دسته بندی ها</h3>

                    <ul>
                        <li>
                            <a href="#">
                                استراتژی تجارت
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                امنیت کامل
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                حریم خصوصی
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                توسعه نرم افزار
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                زمان صرفه جویی
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                طراحی جذاب
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tags">
                    <h3>برچسب ها</h3>
                    <a href="#">رابط کاربر</a>
                    <a href="#">وب</a>
                    <a href="#">برنامه</a>
                    <a href="#">طراحی</a>
                    <a href="#">تجارت</a>
                    <a href="#">رابط</a>
                    <a href="#">طراح</a>
                    <a href="#">وب</a>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row">

                    @foreach($posts as $post)

                    {{-- @dd($post) --}}
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-card">
                            <div class="blog-img">
                                {{-- @dd(__feature_photo($post) ) --}}
                                <a href="blog-details.html"><img src="{{ __feature_photo($post) }}" alt="blog image"></a>
                                <div class="blog-date">
                                    <span>{{__page_date($post)}}</span>
                                </div>
                            </div>
                            <div class="blog-text">

                                <h3><a href="blog-details.html">{{ $post->title}}</a></h3>

{{--                                <p>{{ $post->meta_description}}</p>--}}
                                <div class="post-info">
                                    <img src="{{asset('front/everb/img/blog/author-1.png')}}" alt="blog author">
                                    {{-- @dd($post->writer()) --}}
                                    <a href="#"><p>{{  $post->writer->getFullName()  }}</p></a>
                                    <a href="{{ route('front.single.id',$post->id) }}" class="blog-btn">
                                        ادامه خواندن
                                        <i class="fa fa-chevron-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
