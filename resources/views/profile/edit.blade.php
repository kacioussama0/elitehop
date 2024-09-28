@extends('_layouts.app')

@section('title','حسابي')

@section('content')

    <style>

        .avatar {
            width: 150px;
            height: 150px;
            background-size: contain;
            margin: auto;
            background-repeat: no-repeat;
        }

    </style>

    <section id="profile" class="my-5">

        <div class="container">

{{--            <img src="{{ Vite::asset('resources/imgs/logo/logo-min.svg') }}" alt="Logo Elitehop" width="150" class="mx-auto d-flex">--}}


            <div class="row">

                <div class="col-md-6">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <h6 class="card-header bg-transparent text-primary fw-light">معلومات الشخصية</h6>
                                <div class="card-body p-3">
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->

                                        <x-c-input type="email" label="البريد الإلكتروني" name="email" id="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"/>
                                        <x-c-input type="text" label="اسم المستخدم" name="username" id="username" value="{{\Illuminate\Support\Facades\Auth::user()->username}}"/>
                                        <x-c-input type="date" label="تاريخ الميلاد" name="date_of_birth" id="date_of_birth" value="{{\Illuminate\Support\Facades\Auth::user()->date_of_birth}}"/>
                                        <x-c-select :options="[ 'ذكر' => 'male', 'أنثى' => 'female']" label="الجنس" name="gender" id="gender" value="{{\Illuminate\Support\Facades\Auth::user()->gender}}"/>
                                        <x-c-input type="text" label="رقم الهاتف" name="phone" id="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}"/>

                                        <button class="btn btn-primary text-light w-100 mt-3">
                                            تحديث حسابي
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card shadow">
                                <h6 class="card-header bg-transparent text-primary fw-light">كلمة المرور</h6>
                                <div class="card-body p-3">
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                            <x-c-input type="password" label="كلمة السر الحالية" name="old_password" id="old_password" value="{{old('old_password')}}"/>
                                            <x-c-input type="password" label="كلمة السر الجديدة" name="new_password" id="new_password" value="{{old('new_password')}}"/>
                                            <x-c-input type="password" label="تأكيد كلمة السر الجديدة" name="new_password_confirmation" id="new_password_confirmation" value="{{old('new_password_confirmation')}}"/>


                                        <button class="btn btn-primary text-light w-100 mt-3">
                                            تغيير كلمة المرور
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                   <div class="row g-4">

                       <div class="col-md-12">
                           <div class="card shadow">
                               <h6 class="card-header bg-transparent text-primary fw-light">الصورة الشخصية</h6>
                               <div class="card-body p-3">
                                   <!-- Session Status -->
                                   <x-auth-session-status class="mb-4" :status="session('status')" />

                                   <form method="POST" action="{{ route('login') }}">

                                       @csrf


                                       <div style="background-image: url('{{ Vite::asset('resources/imgs/logo/logo-min.svg') }}')" class="avatar"></div>

                                       <x-c-input type="file" label="الصورة" name="avatar" id="avatar" value="{{old('avatar')}}"/>



                                       <button class="btn btn-primary text-light w-100 mt-3">
                                           رفع الصورة
                                       </button>

                                   </form>
                               </div>
                           </div>
                       </div>

                       <div class="col-md-12">
                           <div class="card shadow">
                               <h6 class="card-header bg-transparent text-primary fw-light">معلومات إضافية</h6>
                               <div class="card-body p-3">
                                   <!-- Session Status -->
                                   <x-auth-session-status class="mb-4" :status="session('status')" />

                                   <form method="POST" action="{{ route('login') }}">
                                       @csrf

                                       <!-- Email Address -->

                                       <x-c-input type="email" label="البريد الإلكتروني" name="email" id="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"/>
                                       <x-c-input type="text" label="اسم المستخدم" name="username" id="username" value="{{\Illuminate\Support\Facades\Auth::user()->username}}"/>
                                       <x-c-input type="date" label="تاريخ الميلاد" name="date_of_birth" id="date_of_birth" value="{{\Illuminate\Support\Facades\Auth::user()->date_of_birth}}"/>
                                       <x-c-select :options="[ 'ذكر' => 'male', 'أنثى' => 'female']" label="الجنس" name="gender" id="gender" value="{{\Illuminate\Support\Facades\Auth::user()->gender}}"/>
                                       <x-c-input type="text" label="رقم الهاتف" name="phone" id="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}"/>


                                       <button class="btn btn-primary text-light w-100 mt-3">
                                           تحديث حسابي
                                       </button>

                                   </form>
                               </div>
                           </div>
                       </div>

                   </div>

                </div>



            </div>


        </div>

    </section>
@endsection

