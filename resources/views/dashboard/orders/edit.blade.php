@extends('_layouts.app')

@section('title','تعديل الطلب')

@section('content')

    <section id="edit-section" class="bg-secondary-subtle">

        <div class="container py-5">

            <div class="card  shadow w-50 mx-auto position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">تعديل الطلب</h3>
                </span>
                <div class="card-body px-4 py-5">


                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('orders.update',$order) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-md-6">
                                    <x-c-input type="text" label="رقم الطلب" name="name" id="name" value="{{old('id',$order->id)}}" :disabled="true"/>
                                </div>

                                <div class="col-md-6">
                                    <x-c-input type="text" label="الطالب" name="name" id="name" value="{{old('id',$order->user->full_name)}}" :disabled="true"/>
                                </div>


                                <div class="col-md-12">
                                    <x-c-input type="text" label="الدورة" name="course" id="course" value="{{old('id',$order->course->title)}}" :disabled="true"/>
                                </div>

                                <div class="col-md-12">
                                    <x-c-select :options="[ 'مكتمل' => 'completed', 'ملغي' => 'canceled', 'قيد المعالجة' => 'processing','قيد الانتظار'=> 'pending','غير مدفوع'=>'unpaid']" label="حالة الطلب" name="status" id="status" value="{{old('status',$order->status)}}"/>
                                </div>


                                <div class="col-md-12">
                                    <x-c-input type="textarea" label="ملاحظة الطلب" name="name" id="name" value="{{old('note',$order->note)}}" />
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
