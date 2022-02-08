<!-- Footer Section Start -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index.html">
                            <img src="{{asset('front/everb/img/logo-two.png')}}" alt="logo">
                        </a>
                    </div>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.</p>

                    <div class="footer-social">
                        <a href="#"><i class="flaticon-facebook"></i></a>
                        <a href="#"><i class="flaticon-twitter"></i></a>
                        <a href="#"><i class="flaticon-instagram"></i></a>
                        <a href="#"><i class="flaticon-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-widget pl-75">
                    <h3>خدمات شرکت</h3>
                    <ul>
                      
                            @php 
                                $menufooters1 = \App\Models\Menu::where('name','منوی فوتر 1')->with('items')->first();
                            @endphp
                            @foreach($menufooters1->items as $menufooter1)
                            <li>
                               
                                <a href="{{route($menufooter1->link)}}">
                                    <i class="fa fa-chevron-left"></i>
                                    {{$menufooter1->label}}
                                </a>
                            </li>
                            @endforeach
                           
                      
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-widget pl-75">
                    <h3>لینکهای سریع</h3>
                    <ul>
                        @php 
                            $menufooters2 = \App\Models\Menu::where('name','منوی فوتر 2')->with('items')->first();
                        @endphp
                        @foreach($menufooters2->items as $menufooter2)
                        <li>
                           
                            <a href="{{route($menufooter2->link)}}">
                                <i class="fa fa-chevron-left"></i>
                                {{$menufooter2->label}}
                            </a>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-widget pl-75">
                    <h3>تماس بگیرید</h3>
                    <ul>
                        @php 
                        $menufooters3 = \App\Models\Menu::where('name','منوی فوتر 3')->with('items')->first();
                    @endphp
                    @foreach($menufooters3->items as $menufooter3)
                    <li>
                       
                        <a href="{{route($menufooter3->link)}}">
                            <i class="fa fa-chevron-left"></i>
                            {{$menufooter3->label}}
                        </a>
                    </li> 
                 @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 lh-1 text-left">
                    <p>کپی رایت © 1400 ای ورب. تمام حقوق قالب محفوظ است. طراحی و توسعه توسط <a href="https://www.rtl-theme.com/author/barat/?aff=barat" target="_blank">Barat Hadian</a></p>
                </div>
                <div class="col-md-6 lh-1 text-right">
                    <ul>
                        <li><a href="privacy.html">حریم خصوصی</a></li>
                        <li><a href="#">شرایط و ضوابط</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
