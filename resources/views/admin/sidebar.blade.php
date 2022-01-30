<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{url('/admin')}}"><img src="{{asset('admins/mazer/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                @foreach($laravelAdminMenus as $sections)

                    @canany($sections['permissions'])

                        <li class="sidebar-title">{{$sections['title']}}</li>

                        @foreach($sections['parts'] as $part)

                            @canany($part['permissions'])

                                <li class="sidebar-item {{__active_links($part['active'])?'active':''}} {{$part['class']}} @if(!empty($part['items'])) has-sub @endif">
                                    <a href="@if(empty($part['items'])) {{$part['url']}} @else # @endif" class='sidebar-link'>
                                        <i class="{{$part['icon']}}"></i>
                                        <span>{{$part['title']}}</span>
                                    </a>
                                    <ul class="submenu {{__active_links($part['active'])?'active':''}}">
                                        @foreach($part['items'] as $item)

                                            @canany($item['permissions'])
                                                <li class="submenu-item {{__active_links($item['active'])?'active':''}}">
                                                    <a href="{{$item['url']}}"><i class="{{$item['icon']}}"></i> {{$item['title']}}</a>
                                                </li>
                                            @endcanany

                                        @endforeach
                                    </ul>
                                </li>

                            @endcanany

                        @endforeach

                    @endcanany

                @endforeach
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
