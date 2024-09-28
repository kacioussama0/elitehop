@extends('_layouts.app')

@section('title','صفحة غير موجودة')

@section('content')

    <section id="404" class="my-5">

        <div class="container text-center">

            <img src="{{ Vite::asset('resources/imgs/errors/404-error.svg') }}" alt="error 404" class="img-fluid w-50">

            <h3 class="display-5 text-dark fw-bolder mb-5">لم يتم العثور على الصفحة</h3>

            <a href="{{url('/')}}" class="btn btn-outline-dark">الذهاب للصفحة الرئيسية</a>

        </div>



    </section>
@endsection
