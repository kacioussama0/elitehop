@extends('_layouts.app')


@section('content')

    <style>

        .holder {
            background-color: rgba(0,0,0,.5);
            /*border-start-end-radius: 100%;*/
            height: 100%;
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            z-index: -1;
        }

        .intro {
            z-index: 9999;
        }



        .bg {
            /*background-image: url('https://www.flexcourses.com/imgs/wave.png');*/
            background-repeat: no-repeat;
            background-size: 110% 100%;
            bottom: -30px;
            height: 180px;
            position: absolute;
            right: 0;
            width: 100%;

        }

        .home-page {
            height: calc(100vh - 72px);
            background-image: url("{{ Vite::asset('resources/imgs/home/landing-bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter: blur(150px);
        }

        .about {
            min-height: 600px;
            background-image: url("{{ Vite::asset('resources/imgs/home/wind-turbine.svg') }}");
            background-repeat: no-repeat;
            background-position: 80% center;
            background-size: contain;
        }


    </style>

    <section class="home-page text-light">

        <div class="container d-flex flex-column h-100 justify-content-center align-items-center">


                    <div class="holder"></div>

                    <h1 class="display-1 fw-bolder mb-4">منصة نخبة الأمل</h1>
                    <p class="fs-3 mb-1">تسعى إلى إنشاء جيل هادف يتخلق بالأخلاق الإسلامية السامية</p>
                    <p class="fs-3">مع تحقيق التقدم و التطور العلمي والمعرفي</p>

                    <span>
                        <a href="#" class="btn btn-lg btn-outline-light  me-2 my-3 rounded-pill px-5">دخول</a>
                        <a href="#" class="btn btn-lg btn-primary text-light my-3  rounded-pill px-5">سجل معنا</a>
                    </span>

                    <div class="bg"></div>

                </div>

        </div>


    </section>


    <section class="our-message py-5">

        <div class="container">

            <div class="row gx-5 align-items-center">

                <div class="col-md-7">
                  <div class="mb-5">
                      <h6 class="fw-bold display-6 mb-4 d-inline-block border-bottom border-5 pb-1 border-primary">رسالتنا</h6>
                      <p class="fs-5">بناء شخصية مسلم معاصر على أساس القرآن و الكريم، وصاحب فكر سليم ومتجدد، يخدم به دينه ووطنه من خلال الاستثمار فيه، من أجل تحقيق النهوض الحضاري.</p>
                  </div>
                  <div>
                     <h6 class="fw-bold display-6 mb-4 d-inline-block border-bottom border-5 pb-1 border-primary">الرؤية</h6>
                     <p class="fs-5">الرقي والتميز في تعليم القرآن الكريم بمفهومه الشامل، والإبداع في غرس قيمه لجميع شرائح المجتمع بكفاءات متميزة، و برامج نوعيو وبيئة محفظة وبتقنيات حديثة.</p>
                  </div>

                </div>

                <div class="col-md-4">

                    <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg')}}" class="img-fluid w-75 d-block ms-auto">

                </div>

            </div>

        </div>

    </section>

    <section class="features mt-5 py-5 position-relative text-bg-dark">

        <div class="container">


            <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                <h3 class="text-dark fw-bold my-5 display-6 text-center">مميزاتنا</h3>
            </span>

            <div class="row my-5 g-4">

               @foreach($features as $feature)

                    <div class="col-md-6">
                        <div class="card border-0 shadow p-2">
                            <div class="card-body d-flex align-items-center">
                                <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg')}}" width="40">
                                <span class="ms-4">
                                <h4 class="text-primary">{{$feature['title']}}</h4>
                                <p class="text-secondary  mb-0">{{$feature['description']}}</p>
                            </span>
                            </div>
                        </div>
                    </div>
               @endforeach

            </div>

        </div>

    </section>


    <section class="teachers py-5 text-center">


        @php

            $teachers = [
                ['name' => 'نورالدين حريدي','image' => Vite::asset('resources/imgs/teachers/ayoub.jpg')],
                ['name' => 'أمين شهاب','image' => Vite::asset('resources/imgs/teachers/amine.jpg')],
                ['name' => 'أسامة قاسي','image' => Vite::asset('resources/imgs/teachers/oussama.jpg')],
            ]

        @endphp

        <div class="container">

            <h6 class="fw-bold display-6 mb-5 d-inline-block border-bottom border-5 pb-1 border-primary">المدرسين</h6>


            <div class="row g-5 align-items-center justify-content-center">

                @foreach($teachers as $teacher)
                    <div class="col-md-2">
                        <img src="{{$teacher['image']}}" alt="" class="img-fluid rounded-circle mb-3 shadow-lg" style="border: 4px solid var(--bs-primary)">
                        <h6 class="fw-bold">{{$teacher['name']}}</h6>
                    </div>
                @endforeach

            </div>

        </div>

    </section>


@endsection
