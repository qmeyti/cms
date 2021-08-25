<!-- case start  -->
<div class="case-area grey-bg pt-115 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                <div class="section-title text-center mb-90">
                    <h5><span></span>{{__stg('__case_title_1')}}</h5>
                    <h2>{{__stg('__case_title_2')}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row case-active">

            @for($csi = 0;$csi <= 8; $csi++)

                @if(!empty($csp = __stg('__case_page_' . $csi)))

                    @php
                        if (!empty($csp)) $csp = \App\Models\Page::find($csp);
                    @endphp
                    @if(!is_null($csp))
                        <div class="col-xl-4">
                            <div class="case-wrap">
                                <div class="case-thumb">
                                    <img src="{{$csp->feature_photo}}" alt="">
                                </div>
                                <div class="case-content case-pos">
                                    <h6><span></span></h6>
                                    <h3><a href="{{route('front.page.show',['page' => $csp->id])}}">{{$csp->title}}</a></h3>
                                    <p>{{$csp->excerpt}}</p>
                                    <a class="c-btn" href="{{route('front.page.show',['page' => $csp->id])}}"><i class="far fa-long-arrow-left"></i>بیشتر </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

            @endfor

        </div>
    </div>
</div>
<!-- case end  -->
