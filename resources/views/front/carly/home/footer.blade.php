@php
    require_once base_path('resources/views/front/carly/setting/functions.php');
@endphp
<!-- footer-area-start -->
<footer>
    <div class="footer-top-area black-bg pt-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="footer-logo mb-30">
                        @if(!empty($fl = __stg('__footer_logo')))
                            <a href="{{url('/')}}"><img src="{{$fl}}" alt=""></a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9  col-md-8 mb-30">
                    <div class="footer-top-wrapper">
                        <ul class="footer-top-link f-left">
                            @if(!empty($fMenu=__stg('__footer_menu')) && !is_null($footerMenu=\App\Models\Menu::with('items')->where('id',$fMenu)->first()))
                                @foreach($footerMenu->items as $mItem)
                                    <li><a href="{{getMenuLink($mItem->toArray())}}">{{$mItem->label}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-middle-area mt-30 pb-30 pt-60">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <h3 class="footer-title">درباره ما</h3>
                            <div class="footer-text">
                                @php
                                    $aboutPage = \App\Models\Page::find(__stg('__about_page'));
                                @endphp
                                @if(!is_null($aboutPage))
                                    <p>
                                        {{\Illuminate\Support\Str::limit($aboutPage->excerpt)}}
                                    </p>
                                @endif
                            </div>
                            <div class="footer-icon">
                                @if(!empty($sc=__stg('__footer_facebook')))
                                    <a href="{{$sc}}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if(!empty($sc=__stg('__footer_twitter')))
                                    <a href="{{$sc}}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if(!empty($sc=__stg('__footer_telegram')))
                                    <a href="{{$sc}}"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if(!empty($sc=__stg('__footer_whatsapp')))
                                    <a href="{{$sc}}"><i class="fab fa-whatsapp"></i></a>
                                @endif
                                @if(!empty($sc=__stg('__footer_instagram')))
                                    <a href="{{$sc}}"><i class="fab fa-telegram"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper ml-30 mb-30">
                            <h3 class="footer-title">خدمات</h3>
                            <div class="footer-link">
                                <ul>
                                    @if(!empty($fMenu=__stg('__footer_menu_services')) && !is_null($footerMenu=\App\Models\Menu::with('items')->where('id',$fMenu)->first()))
                                        @foreach($footerMenu->items as $mItem)
                                            <li><a href="{{getMenuLink($mItem->toArray())}}">{{$mItem->label}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <h3 class="footer-title">لینک های مفید</h3>
                            <div class="footer-link">
                                <ul>
                                    @if(!empty($fMenu=__stg('__footer_menu_suitable')) && !is_null($footerMenu=\App\Models\Menu::with('items')->where('id',$fMenu)->first()))
                                        @foreach($footerMenu->items as $mItem)
                                            <li><a href="{{getMenuLink($mItem->toArray())}}">{{$mItem->label}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <h3 class="footer-title">اشتراک</h3>
                            <div class="subscribes-form">
                                <form method="POST" action="{{route('front.newsletter.store')}}">
                                    @csrf
                                    <input name="identifier" placeholder="ایمیل را وارد کنید " type="email">
                                    <button type="submit" class="c-btn">اشتراک</button>
                                </form>
                            </div>
                            <div class="footer-info">
                                <p>آخرین به روز رسانی ها را توسط ایمیل دریافت کنید. هر زمان که می توانید مشترک شوید</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-area pt-25 pb-25">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="copyright">
                            <p>کپی رایت <i class="far fa-copyright"></i> 2020 <a href="haavir.com">هاویر</a>. کلیه حقوق محفوظ است</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="footer-bottom-link f-left">
                            <ul>
                                @if(!empty($fMenu=__stg('__footer_menu_last')) && !is_null($footerMenu=\App\Models\Menu::with('items')->where('id',$fMenu)->first()))
                                    @foreach($footerMenu->items as $mItem)
                                        <li><a href="{{getMenuLink($mItem->toArray())}}">{{$mItem->label}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->

