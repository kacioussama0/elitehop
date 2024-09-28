@extends('_layouts.app')

@section('title','تسجيل الدخول')

@section('content')
    <section id="login" class="my-5">

        <div class="container">

            <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg') }}" alt="Logo Elitehop" width="150" class="mx-auto d-flex">

            <div class="card border-0 shadow my-5">
                <h3 class="card-header text-bg-primary text-light display-6 fw-bold py-3  text-center">تسجيل الدخول</h3>
                <div class="card-body p-5">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <!-- Email Address -->

                        <x-c-input type="email" label="البريد الإلكتروني" name="email" id="email" value="{{old('email')}}"/>
                        <x-c-input type="password" label="كلمة السر" name="password" id="password" value="{{old('password')}}"/>


                        @if (Route::has('password.request'))
                            <a class="link-dark d-block mb-3" href="{{ route('password.request') }}">
                                هل نسيت كلمة المرور؟
                            </a>
                        @endif

                        <button class="btn btn-primary text-light w-100">
                            دخول
                        </button>

                    </form>
                </div>
            </div>


        </div>

    </section>
@endsection
