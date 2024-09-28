@extends('_layouts.app')

@section('title','تعديل دورة')

@section('content')

    <section id="edit-course" class="bg-secondary-subtle">

        <div class="container py-5">

            <div class="card  shadow w-50 mx-auto position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">تعديل دورة</h3>
                </span>
                <div class="card-body px-4 py-5">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('courses.update',$course) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6">
                                <x-c-input type="text" label="إسم الدورة" name="title" id="title" value="{{old('title',$course->title)}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="text" label="الإسم اللطيف" name="slug" id="slug" value="{{old('slug',$course->slug)}}"/>
                            </div>

                            <div class="col-md-12">
                                <x-c-input type="text" label="وصف قصير للدورة" name="short_text" id="short_text" value="{{old('short_text',$course->short_text)}}"/>
                            </div>

                            <div class="col-md-12">
                                <x-c-input type="file" label="صورة" name="image" id="image" value="{{old('image')}}"/>
                                <img src="{{asset('storage/' . $course->image)}}" width="80 alt="logo-{{$course->slug}}">
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="number" label="السعر الأصلي" name="basic_price" id="basic_price" value="{{old('basic_price',$course->basic_price)}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="number" label="السعر النهائي" name="price" id="price" value="{{old('price',$course->price)}}"/>
                            </div>

                            <div class="col-md-12">
                                <x-c-input type="textarea" label="وصف الدورة" name="description" id="description" value="{{old('description',$course->description)}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="textarea" label="متطلبات الدورة" name="requirements" id="requirements" value="{{old('requirements',$course->requirements)}}"/>
                            </div>


                            <div class="col-md-6">
                                <x-c-input type="textarea" label="أهداف الدورة" name="objectives" id="objectives" value="{{old('objectives',$course->objectives)}}"/>
                            </div>

                            <div class="col-md-12">
                                <x-c-select :options="[ 'مفتوح' => 'open', 'مغلق' => 'closed','قريبا'=> 'soon','مخفي'=>'hidden']" label="حالة الدورة" name="status" id="status" value="{{old('status',$course->status)}}"/>

                            </div>


                        </div>

                        <button class="btn btn-primary text-light mt-2 w-100">
                            تعديل
                        </button>

                    </form>
                </div>
            </div>


        </div>

    </section>
@endsection
