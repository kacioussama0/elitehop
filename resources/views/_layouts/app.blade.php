<!doctype html>
<html lang="{{config('app.locale')}}" dir="{{config('app.direction')}}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{Vite::asset('resources/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{Vite::asset('resources/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{Vite::asset('resources/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{Vite::asset('resources/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{Vite::asset('resources/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <title>{{config('app.name') . ' | ' }} @yield('title','الرئيسية')</title>
    @vite('resources/scss/bootstrap.rtl.css')
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>

    <header>
        @include('_layouts.navbar')
    </header>


    <main>
        @yield('content')
    </main>


    <footer class="py-5 text-light" style="background-color: #000000">

        <div class="container">

            <div class="row">
                <div class="col-md-2">
                    <img src="{{ Vite::asset('resources/imgs/logo/logo-white.svg') }}" class="img-fluid">
                </div>
                <div class="col-md-7  offset-2">
                    <p>
                        منصة تعليم وتدريب إلكترونية تهدف إلى تقديم دورات ذات أهمية في سوق العمل وبطرق مبسطة ومرنة جدا لتسهل على المتدرب المسيرة التعليمية والتدريبية. تتمحور فلكس كورسز دائما حول المتدربين لدعمهم لإنشاء مجتمع متكامل قادر على العطاء والابتكار ولتكوين القدرة على روح العمل الجماعي واكتشاف الذات عبر طرق مبتكرة تعزز من الجانب الإبداعي والاجتماعي لديهم.
                    </p>
                </div>

                <div class="col-md-12 text-center">


                    <span class="social-media mb-3 d-block">

                         <a href="#" class="text-decoration-none me-2">
                             <i class="bi bi-facebook fs-4 text-light"></i>
                         </a>

                        <a href="#" class="text-decoration-none me-2">
                             <i class="bi bi-instagram fs-4 text-light"></i>
                         </a>

                        <a href="#" class="text-decoration-none me-2">
                             <i class="bi bi-twitter  fs-4 text-light"></i>
                        </a>

                        <a href="#" class="text-decoration-none me-2">
                             <i class="bi bi-whatsapp  fs-4 text-light"></i>
                        </a>

                        <a href="#" class="text-decoration-none">
                             <i class="bi bi-tiktok  fs-4 text-light"></i>
                        </a>

                    </span>

                    <p class="mb-0 text-center">كل الحقوق محفوظة نخبة الأمل © 2024</p>


                </div>

            </div>

        </div>

    </footer>

    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @livewireScripts

</body>
</html>
