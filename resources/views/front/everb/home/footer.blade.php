<!-- Footer Section Start -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index.html">
                            <img src="{{__stg('__footer_logo')}}" alt="logo">
                        </a>
                    </div>
                    {{-- <p>{{ __stg('__footer_description')}}</p> --}}
                    <p>{{ __tr('__footer_description' ) ? __tr('__footer_description' ):__stg('__footer_description') }}</p>


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
                                $menufooters1 = __get_footer_menu('__footer_menu_services');
                            @endphp
                            @foreach($menufooters1 as $menufooter1)
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
                                $menufooters2 = __get_footer_menu('__footer_menu_suitable');
                        @endphp
                        @foreach($menufooters2 as $menufooter2)
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
                                $menufooters3 = __get_footer_menu('__footer_menu_contact');
                    @endphp
                    @foreach($menufooters3 as $menufooter3)
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
