<!-- brand-start -->
<div class="brand-area">
    <div class="container">
        <div class="brand-bg white-bg">
            <div class="row brand-active">
                @for($ix = 0;$ix <= 10;$ix++)
                    @if(!empty($brn = __stg('__brand_'.$ix)))
                        <div class="col-12">
                            <div class="single-brand">
                                <img src="{{$brn}}" alt="">
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
</div>
<!-- brand-end -->
