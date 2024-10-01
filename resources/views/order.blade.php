@extends('_layouts.app')

@section('title','إكمال الطلب')

@section('content')


    <section id="order-{{$order->id}}" class="my-3">

        <div class="container-fluid mx-4 py-5">


            <h3> عرض الطلب {{$order->id}}</h3>

            <div class="row gy-5">

                <div class="col-md-8">
                    <div class="card">
                        <h5 class="card-header  bg-transparent">
                            إكمال الطلب بواسطة
                        </h5>
                        <div class="card-body">

                            <div class="alert alert-primary">
                                <h6>قم بالدفع للحساب التالي :</h6>
                                <ul>
                                    <li>CCP 42303946 Clé 10</li>
                                    <li>Baridi 00799999004230394664</li>
                                    <li>الإسم الكامل M.KACI OUSSAMA</li>
                                </ul>
                            </div>

                            @empty($order->receipt)
                                <form action="{{url('/orders/' . $order->id . '/upload')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <x-c-input type="file" label="وصل الدفع" name="receipt" id="receipt" value="{{old('receipt')}}"/>
                                    <button class="btn btn-primary text-light mb-3 w-100">
                                        رفع الوصل
                                    </button>
                                </form>
                            @else
                                <div class="alert alert-warning">
                                    <h5>تم رفع الوصل سوف تصلك رسالة بعد الموافقة على الطلب ...</h5>
                                </div>
                            @endempty

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100">

                        <h5 class="card-header bg-transparent">
                            تفاصيل الطلب
                        </h5>

                        <div class="card-body text-dark">

                            <div class="d-flex justify-content-center flex-column align-items-center">
                                <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg') }}" alt="logo-elite-hope" class="mx-auto mb-3" width="150">
                                <h6>باقي هذي الخطوة وتبدأ رحلة التعلم</h6>
                            </div>

                            <ul class="list-unstyled">
                                <li><b>السعر الأساسي :</b> 1000 دج</li>
                                <li><b>الإجمالي :</b> 1000 دج</li>
                                <li><b>الحالة:</b> {{$order->arabic_status}}</li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header bg-transparent">
                            عناصر الطلب
                        </h5>
                        <div class="card-body">


                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>
                                        <tr>
                                            <th>الدورة</th>
                                            <th>السعر</th>
                                            <th>السعر الأساسي</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>{{$order->course->title}}</td>
                                            <td>{{$order->course->price}}</td>
                                            <td>{{$order->course->price}}</td>
                                        </tr>
                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

@endsection
