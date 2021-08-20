<div class="col-md-3">
    @foreach($laravelAdminMenus['menus'] as $section)
        @if(isset($section['items']))
            <div class="card">
                <div class="card-header">
                    <i class="{{$section['icon']}}"></i>
                    {{ $section['section'] }}
                </div>

                <div class="card-body">
                    <ul class="nav flex-column" role="tablist">
                        @foreach($section['items'] as $menu)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ url($menu['url']) }}">
                                    <i class="{{$menu['icon']}}"></i>
                                    {{ $menu['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br/>
        @endif
    @endforeach
</div>
