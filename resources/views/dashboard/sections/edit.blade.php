@extends('_layouts.app')

@section('title','تعديل قسم')

@section('content')

    <section id="edit-section" class="bg-secondary-subtle">

        <div class="container py-5">

            <div class="card  shadow w-50 mx-auto position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">تعديل القسم</h3>
                </span>
                <div class="card-body px-4 py-5">


                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('sections.update',[$course->slug,$section]) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-md-12">
                                    <x-c-input type="text" label="إسم القسم" name="name" id="name" value="{{old('name',$section->name)}}"/>
                                </div>

                                <div class="col-md-12">
                                    <x-c-input type="textarea" label="وصف القسم" name="description" id="description" value="{{old('description',$section->description)}}"/>
                                </div>

                                <div class="col-md-12">

                                    <button class="btn btn-primary text-light my-3 w-100">
                                        تعديل
                                    </button>

                                </div>

                            </div>

                        </form>


                </div>
            </div>


        </div>

    </section>
@endsection
