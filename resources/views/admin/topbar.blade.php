<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="fas fa-align-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link" title="مشاهده صفحه اصلی" target="_blank" href="{{url('/')}}" aria-expanded="false">
                            <i class='far fa-eye bi-sub fs-4 text-gray-600'></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown ms-1">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class='fa fa-language bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header"></h6>
                            </li>
                            @foreach($languages as $language)
                            <li><a class="dropdown-item" href='{{ route('locale',[$language->code]) }}'>{{ $language->language_name }}</a></li>

                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown ms-1">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class='far fa-envelope bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header"></h6>
                            </li>
                            <li><a class="dropdown-item" href="#"></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class='far fa-bell bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header"></h6>
                            </li>
                            <li><a class="dropdown-item"></a></li>
                        </ul>
                    </li>

                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-start ms-3">
                                <h6 class="mb-0 text-gray-600">{{auth()->user()->name . ' ' . auth()->user()->family }} </h6>
                                <p class="mb-0 text-sm text-gray-600">مدیر کل</p>
                            </div>

                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{asset('admins/mazer/assets/images/faces/1.jpg')}}">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-right" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">
                                سلام،
                                {{auth()->user()->name}}
                            </h6>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="icon-mid fas fa-user ms-2"></i>
                                مدیریت پروفایل
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="icon-mid fas fa-cogs ms-2"></i></a></li>
                        <li><a class="dropdown-item" href="#"><i class="icon-mid fas fa-wallet ms-2"></i></a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <button onclick="document.getElementById('LOGOUT_FORM').submit();" class="dropdown-item"><i class="icon-mid fas fa-sign-out-alt ms-2"></i>خروج کاربر</button>
                            <form id="LOGOUT_FORM" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
