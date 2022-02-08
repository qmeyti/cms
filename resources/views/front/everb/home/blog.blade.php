<!-- Blog Section Start -->
<section class="blog-section pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>وبلاگ ما</span>
            <h2>آخرین اخبار وبلاگ</h2>
        </div>

        <div class="row">
            @foreach($posts as $post)

            <div class="col-lg-4 col-md-6">


                <div class="blog-card">

                    <div class="blog-img">
                        <a href="blog-details.html"><img src="{{ __feature_photo($post) }}" alt="blog image"></a>
                        <div class="blog-date">
                            <span>{{__page_date($post)}}</span>
                        </div>
                    </div>
                    <div class="blog-text">

                        <h3><a href="{{ route('front.single.id',$post->id) }}">{{ $post->title}}</a></h3>

                        <div class="post-info">
                            <img src="{{asset('front/everb/img/blog/author-1.png')}}" alt="blog author">
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
</section>
<!-- Blog Section End -->
