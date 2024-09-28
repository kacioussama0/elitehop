@extends('_layouts.app')

@section('title','حساب جديد')

@section('content')
    <section id="register" class="my-5">

        <div class="container">

            <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg') }}" alt="Logo Elitehop" width="150" class="mx-auto d-flex">

            <div class="card border-0 shadow my-5">
                <h3 class="card-header text-bg-primary text-light display-6 fw-bold py-3  text-center">حساب جديد</h3>
                <div class="card-body p-5">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <!-- Email Address -->


                        <div class="row">

                            <div class="col-md-6">
                                <x-c-input type="text" label="اللقب" name="first_name" id="first_name" value="{{old('first_name')}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="text" label="الإسم" name="last_name" id="last_name" value="{{old('last_name')}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="email " label="البريد الإلكتروني" name="email" id="email" value="{{old('email')}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="text" label="رقم الهاتف" name="phone" id="phone" value="{{old('phone')}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="date" label="تاريخ الميلاد" name="date_of_birth" id="date_of_birth" value="{{old('date_of_birth')}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="text" label="مكان الميلاد" name="place_of_birth" id="place_of_birth" value="{{old('place_of_birth')}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-select :options="[ 'ذكر' => 'male', 'أنثى' => 'female']" label="الجنس" name="gender" id="gender" value="{{old('gender')}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-select label="المستوى الدراسي" :options="[ 'التحضيري' => 'التحضيري','الابتدائي' => 'الابتدائي','المتوسط' => 'المتوسط','الثانوي' => 'الثانوي','جامعي' => 'جامعي','تكوين' => 'تكوين']" name="school_level" id="school_level" value="{{old('school_level')}}"/>
                            </div>


                            <div class="col-md-6">
                                <x-c-input type="password" label="كلمة السر" name="password" id="password" value="{{old('password')}}"/>
                            </div>

                            <div class="col-md-6">
                                <x-c-input type="password" label="تأكيد كلمة السر" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}"/>
                            </div>

                            <div class="col-md-12">
                                <x-c-input type="file" label="صورة" name="avatar" id="avatar" value="{{old('avatar')}}"/>
                            </div>

                        </div>


                        <span class="d-block mb-3">
                            هل لديك حساب من قبل ؟
                            <a class="link-dark mb-3" href="{{ route('login') }}">
                                سجل الدخول
                            </a>
                        </span>


                        <button class="btn btn-primary text-light w-100">
                            سجل
                        </button>

                    </form>
                </div>
            </div>


        </div>

    </section>
@endsection
