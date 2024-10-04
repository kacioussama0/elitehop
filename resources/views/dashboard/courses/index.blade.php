@extends('_layouts.app')

@section('title','إضافة دورة')

@section('content')

    <section id="show-all-courses" class="bg-secondary-subtle">

        <div class="container py-5">

            <div class="card  shadow position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">قائمة الدورات</h3>
                </span>
                <div class="card-body px-4 py-5">


                    <a href="{{route('courses.create')}}" class="btn btn-lg mb-3 btn-outline-primary">إضافة دورة</a>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('success')" />

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered text-center">

                            <thead>

                                <tr class="align-middle">
                                    <th>إسم الدورة</th>
                                    <th>الإسم اللطيف</th>
                                    <th>الصورة</th>
                                    <th>عدد الأقسام</th>
                                    <th>السعر</th>
                                    <th>وصف قصير للدورة</th>
                                    <th>حالة الدورة</th>
                                    <th>الإجراءات</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($courses as $course)

                                    <tr class="align-middle">

                                        <td>{{$course->title}}</td>
                                        <td>{{$course->slug}}</td>
                                        <td>
                                            <img src="{{asset('storage/'. $course->image)}}" alt="logo-{{$course->slug}}" width="60">
                                        </td>

                                        <td>{{$course->sections->count()}}</td>

                                        <td>{{$course->basic_price . ' دج'}}</td>

                                        <td>{{$course->short_text}}</td>

                                        <td>{{$course->arabic_status}}</td>

                                        <td>
                                            <span class="d-flex">

                                                <a href="{{route('sections.index',$course->slug)}}" class="btn btn-outline-primary me-1">الأقسام</a>
                                                <a href="{{route('courses.edit',$course)}}" class="btn btn-outline-warning me-1">تعديل</a>

                                                <form action="{{route('courses.destroy',$course)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ؟')">
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
