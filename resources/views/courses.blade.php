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

    <section id="our-courses">

        <div class="container py-5">



                    <h6 class="fw-bold display-2 mb-5 d-inline-block border-bottom border-5 pb-1 border-primary">دوراتنا</h6>

                    <div class="row gy-5 align-items-center">

                       @foreach($courses as $course)
                           <div class="col-12">
                               <div class="card position-relative border-0 ">
                                   <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg') }}" alt="logo-elite-hope" width="40" class="opacity-25 position-absolute end-0 top-0 m-3 ">
                                   <div class="card-body px-5 py-3">

                                       <div class="d-flex align-items-center mb-3">

                                           <div class="me-3 rounded-circle bg-primary-subtle d-flex justify-content-center align-items-center" style="border: 1px solid var(--bs-primary);width: 190px;height: 190px">
                                                <img src="{{asset('storage/' . $course->image)}}" alt="logo-{{$course->slug}}" class="img-fluid" width="190" height="190">
                                           </div>

                                           <div class="flex-grow-1">
                                               <h6 class="text-dark display-5">{{$course->title}}</h6>
                                                <p class="text-secondary truncate" style="height: 50px">{{$course->short_text}}</p>
                                                <div class="specifications w-100 align-items-center d-flex justify-content-between">

                                                       <span class="text-dark fw-bold">
                                                           <i class="bi bi-coin me-1"></i>
                                                           {{$course->price}} دج
                                                       </span>

                                                       <span class="text-dark fw-bold">
                                                           <i class="bi bi-play-btn  me-1"></i>
                                                           0 درس
                                                        </span>


                                                        <span class="flex-1">
                                                            @if($course->status == 'open')
                                                                <form action="{{url('/create-order/' . $course->slug)}}" method="POST">
                                                                    @csrf
                                                                    <a href="#" onclick="event.preventDefault();this.closest('form').submit();" class="btn btn-lg btn-success">إشترك الأن</a>
                                                                </form>
                                                            @elseif($course->status == 'closed')
                                                                <a href="{{url('courses/' . $course->slug)}}" class="btn btn-lg btn-danger">التسجيل مغلق</a>

                                                            @elseif($course->status == 'soon')
                                                                <a href="{{url('courses/' . $course->slug)}}" class="btn btn-lg btn-warning">قريبا</a>

                                                            @endif
                                                        </span>


                                                </div>
                                           </div>

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
