@extends('_layouts.app')

@section('title','طلباتي')

@section('content')


    <section id="user-orders" class="my-3">

        <div class="container-fluid py-5">




                    <div class="card">

                        <h3 class="card-header bg-transparent">طلباتي</h3>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-striped align-middle text-center">

                                    <thead>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>تاريخ الإنشاء</th>
                                            <th>الحالة</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($orders as $order)
                                            <tr>
                                                <td>#{{$order->id}}</td>
                                                <td>{{date('d/m/Y',$order->created_at->timestamp)}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>
                                                    <a href="{{url('orders/' . $order->id)}}" class="btn btn-outline-primary">عرض</a>
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
