@if(isset($breadcrumb) && $breadcrumb->count() > 0)
<!-- breadcrumb-area-start -->
<div class="breadcrumb-area pt-230 pb-200" style="background-image:url({{asset('front/carly/assets/img/bg/02.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-text text-center">
                    <h1>{{isset($pageTitle)?$pageTitle}}</h1>
                    <ul class="breadcrumb-menu">
                        @foreach($breadcrumb as $key => $value)
                            @if(empty($value))
                                <li><span>{{$key}}</span></li>
                            @else
                                <li><a href="{{$value}}">{{$key}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->
@endif
