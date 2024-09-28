@extends('_layouts.app')

@section('title','إضافة درس')

@section('content')

    <!-- Insert the blade containing the TinyMCE configuration and source script -->
    <x-head.tinymce-config id="description"/>

    <section id="create-lesson" class="bg-secondary-subtle">

        <div class="container py-5">

            <div class="card  shadow w-50 mx-auto position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">إنشاء درس</h3>
                </span>
                <div class="card-body px-4 py-5">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('lessons.store',[$course,$section]) }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <div class="col-md-6">
                                <x-c-input type="text" label="إسم الدرس" name="title" id="title" value="{{old('title')}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="text" label="الإسم اللطيف" name="slug" id="slug" value="{{old('slug')}}"/>
                            </div>

                            <div class="col-md-12">
                                <x-c-input type="text" label="وصف قصير للدرس" name="short_text" id="short_text" value="{{old('short_text')}}"/>
                            </div>

                            <div class="col-md-12">
                                <x-c-input type="textarea" label="وصف الدرس" name="description" id="description" value="{{old('description')}}"/>
                            </div>

                            <div class="col-md-12">
                                <x-c-input type="text" label="رابط الفيديو المسجل" name="video_link" id="video_link" value="{{old('video_link')}}"/>
                            </div>

                        </div>

                        <button class="btn btn-primary text-light mt-2 w-100">
                            إنشاء
                        </button>

                    </form>
                </div>
            </div>


        </div>

    </section>
@endsection
