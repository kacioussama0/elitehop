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
    <div class="container">
        <a class="navbar-brand me-5" href="#">
            <img src="{{ Vite::asset('resources/imgs/logo/logo-white.svg') }}" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-center align-items-center w-100  mb-lg-0">
                @foreach($navLists as $key => $item)
                    <li class="nav-item p-3 mx-2 position-relative">
                        <a class="nav-link  {{url()->current() == url($item['link']) ? 'active' : ''}}" aria-disabled="true" href="{{$item['link']}}">{{$item['name']}}</a>
                    </li>
                @endforeach

                    @auth

                        <li class="nav-item">
                            <a class="nav-link {{url()->current() == url('login') ? 'active' : ''}}" aria-disabled="true" href="{{url('/dashboard')}}"><i class="bi bi-person-fill me-1"></i> {{Auth::user()->first_name}}</a>
                        </li>

                        <form method="POST" action="{{ route('logout') }}" id="">
                            @csrf
                            <li class="nav-item">
                                <a class="nav-link {{url()->current() == url('login') ? 'active' : ''}}" aria-disabled="true" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();"><i class="bi bi-box-arrow-left me-1"></i>خروج</a>
                            </li>
                        </form>

                    @else
                        <li class="nav-item ms-auto">
                            <a class="nav-link {{url()->current() == url('login') ? 'active' : ''}}" aria-disabled="true" href="{{url('/login')}}">دخول</a>
                        </li>

                        <li class="nav-item btn btn-primary rounded-pill py-0 px-3 ms-3">
                            <a class="nav-link text-light {{url()->current() == url('register') ? 'active' : ''}}" aria-disabled="true" href="{{url('/register')}}">تسجيل</a>
                        </li>
                    @endauth

            </ul>


        </div>

        <div class="collapse" id="collapseExample">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            @auth

                <li class="nav-item">
                    <a class="nav-link {{url()->current() == url('login') ? 'active' : ''}}" aria-disabled="true" href="{{url('/dashboard')}}"><i class="bi bi-person-fill me-1"></i> {{Auth::user()->first_name}}</a>
                </li>

                <form method="POST" action="{{ route('logout') }}" id="">
                    @csrf
                    <li class="nav-item">
                        <a class="nav-link {{url()->current() == url('login') ? 'active' : ''}}" aria-disabled="true" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();"><i class="bi bi-box-arrow-left me-1"></i>خروج</a>
                    </li>
                </form>

            @else
                <li class="nav-item">
                    <a class="nav-link {{url()->current() == url('login') ? 'active' : ''}}" aria-disabled="true" href="{{url('/login')}}">دخول</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{url()->current() == url('register') ? 'active' : ''}}" aria-disabled="true" href="{{url('/register')}}">تسجيل</a>
                </li>
            @endauth




        </ul>
        </div>

    </div>
</nav>
