@extends('_layouts.app')

@section('title','استعادة كلمة المرور')

@section('content')


    <section id="forget-password" class="my-5">

        <div class="container">


            <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg') }}" alt="Logo Elitehop" width="150" class="mx-auto d-flex">

            <div class="card border-0 shadow my-5">
                <h3 class="card-header text-bg-primary text-light display-6 fw-bold py-3  text-center">استعادة كلمة المرور</h3>
                <div class="card-body p-5">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->

                        <x-c-input type="email" label="البريد الإلكتروني" name="email" id="email" value="{{old('email')}}"/>


                        <button class="btn btn-primary text-light w-100">
                            استعادة كلمة المرور
                        </button>

                    </form>
                </div>
            </div>


        </div>

    </section>


@endsection
