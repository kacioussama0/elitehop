@extends('_layouts.app')

@section('title','قائمة الطلبات')

@section('content')

    <section id="show-all-orders" class="bg-secondary-subtle">

        <div class="container-fluid py-5">

            <div class="card  shadow position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">قائمة الطلبات</h3>
                </span>
                <div class="card-body px-4 py-5">


                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('success')" />

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered text-center">

                            <thead>

                                <tr class="align-middle">
                                    <th>رقم الطلب</th>
                                    <th>الطالب</th>
                                    <th>الدورة</th>
                                    <th>الحالة</th>
                                    <th>الوصل</th>
                                    <th>الإجراءات</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($orders as $order)

                                    <tr class="align-middle">

                                        <td>{{$order->id}}#</td>
                                        <td>{{$order->user->full_name}}</td>
                                        <td>{{$order->course->title}}</td>
                                        <td>{{$order->arabic_status}}</td>
                                        <td>
                                            @empty(!$order->receipt)
                                             <a href="{{asset('storage/' . $order->receipt)}}">تحميل</a>
                                            @else
                                             <span>لا يوجد وصل</span>
                                            @endempty
                                        </td>

                                        <td>
                                            <span class="d-flex">

                                                <a href="{{route('orders.edit',$order)}}" class="btn btn-warning me-1">تعديل</a>

{{--                                                <form action="{{route('sections.destroy',[$course->slug,$section])}}" method="POST" onsubmit="return confirm('هل أنت متأكد ؟')">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" class="btn btn-outline-danger">حذف</button>--}}
{{--                                                </form>--}}

{{--                                            </span>--}}

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
