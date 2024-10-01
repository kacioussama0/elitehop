@extends('_layouts.app')

@section('title','')

@section('content')

    <style>

        .video-js .vjs-big-play-button,
        .video-js .vjs-control-bar{
            background-color: var(--bs-primary) !important;
            border: none !important;
        }
        .vjs-poster img {
            width: 100%;
            height: 100%;
        }

    </style>

    <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet" />


    <section id="lessons">



            <div class="row g-0 overflow-hidden ">

                <div class="col-lg-4">
                    <div class="card rounded-0 bg-transparent border-0 border-end border-3 border-dark vh-100">

                        <h4 class="card-header  rounded-0 bg-primary text-light">الأقسام</h4>


                        <div class="card-body p-0">
                            <div class="accordion rounded-0" id="course-sections">
                                @foreach($course->sections as $sectionKey => $section)
                                    <div class="accordion-item rounded-0 border-dark-subtle">
                                        <h2 class="accordion-header  rounded-0">
                                            <button class="accordion-button fs-5 fw-bold  rounded-0 @if($sectionKey != 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#section-{{$section->id}}" aria-expanded="true" aria-controls="section-{{$section->id}}">
                                                {{$sectionKey + 1 . ' . ' . $section->name}}
                                            </button>
                                        </h2>
                                        <div id="section-{{$section->id}}" class="accordion-collapse @if($sectionKey == 0) collapse show @endif" data-bs-parent="#course-sections">
                                            <div class="accordion-body p-0">
                                                @foreach($section->lessons as $lessonKey => $lesson)
                                                    <div class="card  rounded-0 border-0 @if($lesson->slug == $currentLesson->slug) bg-dark shadow-lg py-2 @else text-dark @endif">
                                                        <div class="card-body">
                                                            <a href="{{url('/courses/' . $course->slug . '/lessons/' .$lesson->slug)}}" class="stretched-link @if($lesson->slug == $currentLesson->slug)  text-light shadow-lg @else text-dark @endif text-decoration-none">
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


                <div class="col-lg-8">
                    <video
                        id="my-video"
                        class="video-js vjs-default-skin d-block mx-auto "
                        style="height: 80vh"
                        controls
                        poster="https://academy.hsoub.com/learn/assets/images/courses/front-end-web-development.png"
                        data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$currentLesson->video_link}}" }] }'
                    ></video>

                    </video>

                    <div class="mx-3">
                        <h3 class="mt-4 fw-bold">{{$currentLesson->title}}</h3>
                        <p>
                            {{$currentLesson->short_text}}
                        </p>
                    </div>

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
            fluid: true,
            responsive: true,
            aspectRatio: '9:16',
            youtube: {
                modestbranding: 1,
                rel: 0,
                iv_load_policy: 3,
            },
        });
        player.fill(true);

    </script>

@endsection
