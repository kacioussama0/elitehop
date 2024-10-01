@extends('_layouts.app')

@section('title',$course->title)

@section('content')


    <section id="course-{{$course->slug}}" class="my-3">

        <div class="container py-5">

{{--            <h6 class="fw-bold display-2 mb-5 d-inline-block border-bottom border-5 pb-1 border-primary">دوراتنا</h6>--}}


            <section id="course-info my-5">
                <div class="card bg-primary text-light rounded-2 shadow border-0 p-3">

                    <div class="card-body">

                        <div class="d-flex justify-content-space-between align-items-center">
                            <span class="d-block rounded-1 me-3 bg-light p-3">
                                <img src="{{asset('storage/' . $course->image)}}" alt="course-{{$course->slug}}" width="100">
                            </span>
                            <span>
                                <h1 class="display-6 fw-bold">{{$course->title}}</h1>
                                <p>{{$course->short_text}}</p>
                                @auth
                                    <a href="{{url('courses/' . $course->slug . '/lessons/' . $firstLesson)}}" class="btn btn-success">الدخول للدروس</a>
                                @else
                                    <a href="{{url('courses/' . $course->slug . '/lessons/' . $firstLesson)}}" class="btn btn-danger">إشترك بالدورة</a>
                                @endauth
                            </span>
                        </div>

                    </div>
                </div>
            </section>


            <div class="row gx-5 mt-5">

                <div class="col-md-9">
                    <section id="about-course">
                        <h2 class="mt-sm-5 mb-3 fw-medium">عن الدورة</h2>

                        <div class="text-dark fw-medium">
                            {!! $course->description !!}
                        </div>
                     </section>


                    <section id="course-content">
                        <h3 class="mt-5 mb-4 fw-medium">محتوى الدورة</h3>

                        @if(count($course->sections))
                            @foreach($course->sections as $key => $section)

                                <div class="card mb-4 rounded-2 shadow border-0 px-3">

                                    <div class="card-body d-flex align-items-center">

                            <span class="counter me-4 rounded-circle fs-1 fw-bold text-primary-emphasis d-flex justify-content-center align-items-center" style="width: 50px;height: 50px">
                                {{$key + 1}}
                            </span>

                            <span class="section-info my-2">
                                <h3 class="text-dark mb-1">{{$section->name}}</h3>
                                <p class="mb-0 text-secondary">{{$section->description}}</p>
                            </span>

                                    </div>

                                </div>

                            @endforeach
                        @else
                            <div class="alert alert-warning fs-3 fw-bold">
                                المحتوى سوف يجهز قريبا
                            </div>
                        @endif
                    </section>
                </div>

                <div class="col-md-3">
                    <section id="objectives">

                        <h4 class="mt-sm-5 mb-3 fw-medium">المتطلبات</h4>
                        <p>
                            {{$course->requirements}}
                        </p>

                    </section>

                    @if(!empty($course->objectives))
                    <section id="requirements">
                        <h4 class="mt-sm-5 mb-3 fw-medium">ماذا ستتعلم ؟</h4>

                        <div class="vstack gap-3">

                            @foreach(explode("\n",$course->objectives) as $objective)

                                <div class="d-flex">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    {{$objective}}
                                </div>
                            @endforeach


                        </div>

                    </section>
                    @endif
                    <section id="teacher" class="vstack align-items-start gap-2">
                        <h4 class="mt-sm-5 mb-3 fw-medium">المدرب</h4>
                        <img src="{{Vite::asset('resources/imgs/teachers/ayoub.jpg')}}" width="80" alt="logo-teacher" class="border border-1 border-primary rounded-circle">
                        <a href="#">حريدي نورالدين</a>
                        <p class="text-dark">
                            مدرب في منصة نخبة الأمل ومعلم قرأن كريم وحاصل على إجازة.
                        </p>
                    </section>
                </div>
            </div>

        </div>




    </section>


    </div>

    </section>
@endsection
