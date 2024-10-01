@extends('_layouts.app')

@section('title','المحتوى التعليمي')

@section('content')

    <style>

        .card {
            transition: .2s ease-in-out;
        }

        .card:hover {
            box-shadow: var(--bs-box-shadow-lg);
        }



    </style>

    <section id="our-courses" class="bg-secondary-subtle">

        <div class="container py-5">



                    <h6 class="fw-bold display-2 mb-5 d-inline-block border-bottom border-5 pb-1 border-primary">دوراتنا</h6>

                    <div class="row g-4 align-items-center">

                       @foreach($courses as $course)
                           <div class="col-md-6 col-lg-4">
                               <div class="card position-relative">
                                   <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg') }}" alt="logo-elite-hope" width="40" class="opacity-25 position-absolute end-0 top-0 m-3">
                                   <div class="card-body p-4">

                                       <div class="d-flex align-items-center mb-3">
                                           <span class="p-2 me-3 rounded-2" style="border: 1px solid var(--bs-primary)">
                                                <img src="{{asset('storage/' . $course->image)}}" alt="logo-{{$course->slug}}" width="60" height="60">
                                           </span>
                                           <h6 class="fw-bold text-primary">{{$course->title}}</h6>
                                       </div>

                                       <p class="text-secondary truncate" style="height: 50px">{{$course->short_text}}</p>

                                       <div class="specifications align-items-center d-flex justify-content-between">
                                           <span class="text-dark fw-bold">
                                               <i class="bi bi-coin me-1"></i>
                                               {{$course->price}} دج
                                           </span>

                                           <span class="text-dark fw-bold">
                                               <i class="bi bi-play-btn me-1"></i>
                                               0 درس
                                           </span>


                                           @if($course->status == 'open')
                                               <a href="{{url('courses/' . $course->slug)}}" class="btn btn-success">إشترك الأن</a>
                                           @elseif($course->status == 'closed')
                                               <a href="{{url('courses/' . $course->slug)}}" class="btn btn-danger">التسجيل مغلق</a>

                                           @elseif($course->status == 'soon')
                                               <a href="{{url('courses/' . $course->slug)}}" class="btn btn-warning">قريبا</a>

                                           @endif
                                       </div>

                                   </div>
                               </div>
                           </div>
                       @endforeach

                    </div>

                </div>

            </section>


        </div>

    </section>
@endsection
