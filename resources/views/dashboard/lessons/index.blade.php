@extends('_layouts.app')

@section('title',' دروس قسم ' . $section->name)

@section('content')

    <section id="show-all-courses" class="bg-secondary-subtle">

        <div class="container py-5">

            <div class="card  shadow position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">قائمة الدروس</h3>
                </span>
                <div class="card-body px-4 py-5">


                    <span class="d-flex align-items-center mb-4">
                        <img src="{{asset('storage/'. $course->image)}}" class="me-3" alt="logo-{{$course->slug}}" width="100">
                        <div>
                             <h4 class="mb-3 fw-bold">{{$course->title}}</h4>
                             <p class="mb-0">{{$course->short_text}}</p>
                        </div>
                    </span>

                    <h3 class="mb-4">قسم {{$section->name}}</h3>

                    <a href="{{route('lessons.create',[$course,$section])}}" class="btn btn-lg mb-3 btn-outline-primary">إضافة درس</a>


                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('success')" />

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered text-center">

                            <thead>

                                <tr class="align-middle">
                                    <th>إسم الدرس</th>
                                    <th>وصف الدرس</th>
                                    <th>نوع الدرس</th>
                                    <th>الإجراءات</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($lessons as $lesson)

                                    <tr class="align-middle">

                                        <td>{{$lesson->title}}</td>
                                        <td>{{$lesson->short_text}}</td>
                                        <td>{{$lesson->lesson_type}}</td>

                                        <td>
                                            <span class="d-flex">

                                                <a href="{{route('lessons.index',[$course,$section,$lesson])}}" class="btn btn-outline-success me-1">إظهار</a>
                                                <a href="{{route('lessons.edit',[$course,$section,$lesson])}}" class="btn btn-outline-warning me-1">تعديل</a>

                                                <form action="{{route('lessons.destroy',[$course,$section,$lesson])}}" method="POST" onsubmit="return confirm('هل أنت متأكد ؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">حذف</button>
                                                </form>

                                            </span>

                                        </td>

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>

    </section>
@endsection
