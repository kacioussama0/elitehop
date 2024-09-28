


@extends('_layouts.app')

@section('title','تغيير كلمة المرور')

@section('content')


    <section id="forget-password" class="my-5">

        <div class="container">


            <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg') }}" alt="Logo Elitehop" width="150" class="mx-auto d-flex">

            <div class="card border-0 shadow my-5">
                <h3 class="card-header text-bg-primary text-light display-6 fw-bold py-3  text-center">تغيير كلمة المرور</h3>
                <div class="card-body p-5">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf


                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">


                        <!-- Email Address -->
                        <x-c-input type="email" label="البريد الإلكتروني" name="email" id="email" value="{{old('email', $request->email)}}"/>


                        <!-- Password -->

                        <x-c-input type="password" label="كلمة السر" name="password" id="password" value="{{old('password')}}"/>

                        <!-- Confirm Password -->

                        <x-c-input type="password" label="تأكيد كلمة السر" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}"/>


                        <button class="btn btn-primary text-light w-100">
                            تغيير
                        </button>

                    </form>
                </div>
            </div>


        </div>

    </section>


@endsection

