@extends('_layouts.app')

@section('title','')

@section('content')

    <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet" />


    <section id="lessons" class="bg-secondary-subtle">




            <div class="row g-0">

                <div class="col-md-4">
                    <div class="card rounded-0">

                        <h4 class="card-header  rounded-0 bg-primary text-light">الأقسام</h4>


                        <div class="card-body p-0">
                            <div class="accordion rounded-0" id="course-sections">
                                @foreach($course->sections as $sectionKey => $section)
                                    <div class="accordion-item rounded-0">
                                        <h2 class="accordion-header  rounded-0">
                                            <button class="accordion-button fs-5 fw-bold  rounded-0 @if($sectionKey != 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#section-{{$section->id}}" aria-expanded="true" aria-controls="section-{{$section->id}}">
                                                {{$sectionKey + 1 . ' . ' . $section->name}}
                                            </button>
                                        </h2>
                                        <div id="section-{{$section->id}}" class="accordion-collapse @if($sectionKey == 0) collapse show @endif" data-bs-parent="#course-sections">
                                            <div class="accordion-body p-0">
                                                @foreach($section->lessons as $lessonKey => $lesson)
                                                    <div class="card  rounded-0 bg-dark shadow-lg">
                                                        <div class="card-body ">
                                                            <a href="" class="stretched-link text-light text-decoration-none">
                                                                <span class="lesson-number">
                                                                    {{$sectionKey + 1 .  '.'  . $lessonKey + 1}}
                                                                </span>
                                                                {{$lesson->title}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-md-8">
                    <video
                        id="my-video"
                        class="video-js vjs-default-skin w-100 "
                        style="height: 80vh"
                        controls

                        poster="https://i.vimeocdn.com/video/1473104394-1978004676fd6195a346dae363c968905da01c87e6c5bd5f571935450a345bd6-d?mw=1700&mh=956"
                        data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/watch?v=Adj5vC9YnmQ" }] }'
                    ></video>

                    </video>

                    <h3 class="my-5">Introduction to the course</h3>

                </div>

            </div>



    </section>

    <script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/videojs-youtube@latest/dist/Youtube.min.js"></script>

    <style>
        .vjs-poster img  {
            object-fit: cover;
        }
    </style>

    <script>
        var player = videojs('my-video', {
            techOrder: ['youtube'],
            autoplay: false,
            controls: true,
            loop: true,
            youtube: {
                modestbranding: 1,
                rel: 0,
                iv_load_policy: 3,
            },
        });
    </script>

@endsection
