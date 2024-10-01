@php

    $navLists = [
        [
            'name' => 'الرئيسية',
            'link' => '/',
            'icon' => 'bi-house'
        ],


        [
            'name' => 'المحتوى التعليمي',
            'link' => '/courses',
            'icon' => 'bi-book'
        ],


        [
            'name' => 'من نحن',
            'link' => '/about-us',
            'icon' => 'bi-book'
        ],




        [
        'name' => 'المدربين',
        'link' => '/teachers',
        'icon' => 'bi-book'
        ],



         [
            'name' => 'أسئلة شائعة',
            'link' => '/faq',
            'icon' => 'bi-book'
        ],

    ]

@endphp

<style>

    .navbar-nav .nav-item .active:before {
        content: "";
        width: 100%;
        height: 4px;
        background-color: var(--bs-primary);
        position: absolute;
        left: 0;
        bottom: 0px;

    }

</style>

<nav class="navbar navbar-expand-lg py-0 navbar-dark px-4 sticky-top" style="background-color: #000000">
    <div class="container-fluid">
        <a class="navbar-brand me-5" href="#">
            <img src="{{ Vite::asset('resources/imgs/logo/logo-white.svg') }}" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-center align-items-center mx-auto  mb-lg-0">

                @foreach($navLists as $key => $item)
                    <li class="nav-item p-3 mx-2 position-relative">
                        <a class="nav-link  {{url()->current() == url($item['link']) ? 'active' : ''}}" aria-disabled="true" href="{{$item['link']}}">{{$item['name']}}</a>
                    </li>
                @endforeach



            </ul>

            <ul class="navbar-nav justify-content-center align-items-center   mb-lg-0">

                @auth

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill me-1"></i> {{Auth::user()->first_name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-mortarboard-fill"></i> دوراتي</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-dropbox"></i> طلباتي</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-bell-fill"></i> الإشعارات</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-key-fill"></i> حسابي</a></li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="bi bi-mortarboard-fill"></i> خروج</a></li>
                            </form>
                        </ul>
                    </li>

                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{url()->current() == url('login') ? 'active' : ''}}" aria-disabled="true" href="{{url('/login')}}">دخول</a>
                    </li>

                    <li class="nav-item btn btn-primary rounded-pill py-0 px-3 ms-3">
                        <a class="nav-link text-light {{url()->current() == url('register') ? 'active' : ''}}" aria-disabled="true" href="{{url('/register')}}">تسجيل</a>
                    </li>
                @endguest

            </ul>


        </div>


        </div>

    </div>
</nav>
