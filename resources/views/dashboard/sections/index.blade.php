@extends('_layouts.app')

@section('title',' أقسام ' . $course->title)

@section('content')

    <section id="show-all-courses" class="bg-secondary-subtle">

        <div class="container py-5">

            <div class="card  shadow position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">قائمة الأقسام</h3>
                </span>
                <div class="card-body px-4 py-5">


                    <span class="d-flex align-items-center mb-4">
                        <img src="{{asset('storage/'. $course->image)}}" class="me-3" alt="logo-{{$course->slug}}" width="100">
                        <div>
                             <h4 class="mb-3 fw-bold">{{$course->title}}</h4>
                             <p class="mb-0">{{$course->short_text}}</p>
                        </div>
                    </span>


                    <div class="create-section">

                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('sections.store',$course->slug) }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-12">
                                    <x-c-input type="text" label="إسم القسم" name="name" id="name" value="{{old('name')}}"/>
                                </div>

                                <div class="col-md-12">
                                    <x-c-input type="textarea" label="وصف القسم" name="description" id="description" value="{{old('description')}}"/>
                                </div>

                               <div class="col-md-12">

                                   <button class="btn btn-primary text-light my-3 w-100">
                                       إنشاء
                                   </button>

                               </div>

                            </div>

                        </form>
                    </div>



                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('success')" />

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered text-center">

                            <thead>

                                <tr class="align-middle">
                                    <th>إسم القسم</th>
                                    <th>وصف القسم</th>
                                    <th>الإجراءات</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($sections as $section)

                                    <tr class="align-middle">

                                        <td>{{$section->name}}</td>
                                        <td>{{$section->description}}</td>

                                        <td>
                                            <span class="d-flex">

                                                <a href="{{route('lessons.index',[$course,$section])}}" class="btn btn-outline-success me-1">الدروس</a>
                                                <a href="{{route('sections.edit',[$course->slug,$section])}}" class="btn btn-outline-warning me-1">تعديل</a>

                                                <form action="{{route('sections.destroy',[$course->slug,$section])}}" method="POST" onsubmit="return confirm('هل أنت متأكد ؟')">
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
