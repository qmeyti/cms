<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            @if(isset($pageTitle) )
                <h3>{{$pageTitle}}</h3>
                <p class="text-subtitle text-muted">{{isset($pageSubtitle) ? $pageSubtitle : ''}}</p>
            @endif
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-end float-lg-start">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
                    @if(isset($breadcrumb))
                        @foreach($breadcrumb as $bciKey => $bciValue)
                            <li class="breadcrumb-item"><a href="{{$bciKey}}">{{$bciValue}}</a></li>
                        @endforeach
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{isset($pageBc) ? $pageBc : '' }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
