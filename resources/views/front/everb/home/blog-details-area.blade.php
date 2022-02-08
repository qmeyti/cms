        <!-- Blog Destails Area Start -->
        <div class="blog-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-description">
                            <div class="article-image">
                                <img src="{{ __feature_photo($post) }}" alt="blog image">

                                {{-- @dd($post) --}}
                                <div class="blog-date">
                                    <span>{{__page_date($post)}}</span>
                                </div>
                            </div>
                            <div class="article-info">
                                <ul>
                                    <li>
                                        <i class="icofont-user-alt-2"></i>
                                        {{  $post->writer->getFullName()  }}
                                    </li>
                                    <li>
                                        <i class="icofont-user-alt-2"></i>
                                        {{__page_date($post)}}
                                    </li>
                                    <li>
                                        <i class="icofont-user-alt-2"></i>
                                        @foreach($post->categories as $category)
                                        {{$category->title}}
                                        @endforeach
                                    </li>
                                </ul>
                            </div>

                            <h3 class="article-title">{{$post->title}}</h3>


                           <p>{{__page_content($post)}}</p>
                            


                            <div class="blog-nav">
                                <div class="prev-btn">
                                    <a href="#">قبلی</a>
                                </div>
                                <div class="next-btn text-right">
                                    <a href="#">بعدی</a>
                                </div>
                            </div>

                            <div class="blog-comment">
                                <h3>نظر بدهید</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="نام و نام خانوادگی">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="ایمیل شما">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="موضوع">
                                        </div>
                                    </div>
                                
                                    <div class=" col-md-12">
                                        <div class="form-group">
                                            <textarea class="message-field" cols="30" rows="5" placeholder="پیام شما"></textarea>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12">
                                        <button type="submit" class="default-btn contact-btn">
                                            ارسال نظر
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-search">
                            <form>
                                <input type="text" placeholder="جستجو">
                                <button><i class="flaticon-search"></i></button>
                            </form>
                        </div>

                        <div class="recent-blog">
                            <h3>پست های اخیر</h3>

                            <article class="recent-post">
                                <a href="#"><img src="assets/img/blog/recent-3.png" alt="recent post image"></a>
                                <h3><a href="#">تقاضای نوشتن محتوا روز به روز در محتوای سایت ها افزایش می یابد</a></h3>
                                <ul>
                                    <li>
                                        <i class="icofont-user-alt-3"></i>
                                        مدیر
                                    </li>
                                    <li>
                                        <i class="icofont-user-alt-3"></i>
                                        03 دی 1398
                                    </li>
                                </ul>
                            </article>

                            <article class="recent-post">
                                <a href="#"><img src="assets/img/blog/recent-2.png" alt="recent post image"></a>
                                <h3><a href="#">تقاضای نوشتن محتوا روز به روز در محتوای سایت ها افزایش می یابد</a></h3>
                                <ul>
                                    <li>
                                        <i class="icofont-user-alt-3"></i>
                                        مدیر
                                    </li>
                                    <li>
                                        <i class="icofont-user-alt-3"></i>
                                        03 دی 1398
                                    </li>
                                </ul>
                            </article>

                            <article class="recent-post">
                                <a href="#"><img src="assets/img/blog/recent-3.png" alt="recent post image"></a>
                                <h3><a href="#">تقاضای نوشتن محتوا روز به روز در محتوای سایت ها افزایش می یابد</a></h3>
                                <ul>
                                    <li>
                                        <i class="icofont-user-alt-3"></i>
                                        مدیر
                                    </li>
                                    <li>
                                        <i class="icofont-user-alt-3"></i>
                                        03 دی 1398
                                    </li>
                                </ul>
                            </article>
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
                        
                        <div class="photo-gallery">
                            <h3>گالری عکس</h3>
                            
                            <a href="assets/img/blog/photo-1.jpg" class="popup-gallery">
                                <img src="assets/img/blog/photo-1.jpg" alt="photo-gallery">
                            </a>
                            <a href="assets/img/blog/photo-2.jpg" class="popup-gallery">
                                <img src="assets/img/blog/photo-2.jpg" alt="photo-gallery">
                            </a>
                            <a href="assets/img/blog/photo-3.jpg" class="popup-gallery">
                                <img src="assets/img/blog/photo-3.jpg" alt="photo-gallery">
                            </a>
                            <a href="assets/img/blog/photo-4.jpg" class="popup-gallery">
                                <img src="assets/img/blog/photo-4.jpg" alt="photo-gallery">
                            </a>
                            <a href="assets/img/blog/photo-5.jpg" class="popup-gallery">
                                <img src="assets/img/blog/photo-5.jpg" alt="photo-gallery">
                            </a>
                            <a href="assets/img/blog/photo-6.jpg" class="popup-gallery">
                                <img src="assets/img/blog/photo-6.jpg" alt="photo-gallery">
                            </a>
                            <a href="assets/img/blog/photo-7.jpg" class="popup-gallery">
                                <img src="assets/img/blog/photo-7.jpg" alt="photo-gallery">
                            </a>
                            <a href="assets/img/blog/photo-8.jpg" class="popup-gallery">
                                <img src="assets/img/blog/photo-8.jpg" alt="photo-gallery">
                            </a>
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
                </div>
            </div>
        </div>
        <!-- Blog Destails Area End -->
