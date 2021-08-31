<!-- breadcrumb-area-start -->
<div class="breadcrumb-area pt-230 pb-200" style="background-image:url({{__stg('__inner_header_breadcrumb_image', asset('/front/carly/assets/img/slider-01.jpg'))}})">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-text text-center">

                    @if(isset($pageTitle))
                        <h1>{{isset($pageTitle)?$pageTitle:''}}</h1>
                    @endif
                    @if(isset($breadcrumb) && is_array($breadcrumb) && __is_linear($breadcrumb))
                        <ul class="breadcrumb-menu">
                            @foreach($breadcrumb as $key => $value)
                                @if(empty($value))
                                    <li><span>{{$key}}</span></li>
                                @else
                                    <li><a href="{{$value}}">{{$key}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->
