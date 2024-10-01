@extends('_layouts.app')

@section('title','الصلاحيات')

@section('content')

    <section id="show-all-courses" class="bg-secondary-subtle">

        <div class="container py-5">

            <div class="card  shadow position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">قائمة الصلاحية</h3>
                </span>
                <div class="card-body px-4 py-5">


                    <div class="create-permission">


                        <form method="POST" action="{{ route('permission.store') }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-12">
                                    <x-c-input type="text" label="الصلاحية" name="permission" id="permission" value="{{old('permission')}}"/>
                                </div>

                                <div class="col-md-12">

                                    <button class="btn btn-primary text-light mb-3 w-100">
                                        إضـافة
                                    </button>

                                </div>

                            </div>

                        </form>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered text-center">

                            <thead>

                                <tr class="align-middle">
                                    <th>المعرف</th>
                                    <th>الصلاحية</th>
                                    <th>الإجراءات</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($permissions as $permission)

                                    <tr class="align-middle">

                                        <td>{{$permission->id }}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>

                                            <span class="d-inline-flex">

{{--                                                <a href="{{route('sections.index',$course->slug)}}" class="btn btn-outline-primary me-1">الأقسام</a>--}}
                                                <a href="{{route('permission.edit',$permission)}}" class="btn btn-outline-warning me-1">تعديل</a>

                                                <form action="{{route('permission.destroy',$permission->id)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ؟')">
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
