<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="{{__stg('__logo')}}" alt="logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img src="{{__stg('__logo')}}" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    @php
                    require_once base_path('resources/views/front/everb/setting/functions.php');
                   @endphp
                    <ul class='navbar-nav m-auto'>
                    {!! get_main_menu() !!}
                    </ul>
                    <div class="other-option">
                        <div class="search-bar">
                            <i class="flaticon-search search-icon"></i>
                            <div class="search-form">
                                <form>
                                    <input type="text" placeholder="جستجو" class="search-input">
                                    <button type="submit">
                                        <i class="flaticon-search search-btn"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-toggle dropdown">
                            <button type="button" class="btn btn-demo toggle-button navbar-toggle" id="CHANGE_LANGUAGE" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-language"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="CHANGE_LANGUAGE">

                                @foreach(\App\Models\Language::all() as $language)

                                <li><a class="dropdown-item" href="{{route('locale' ,$language->code) }}">{{ $language->language_name }}</a></li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
