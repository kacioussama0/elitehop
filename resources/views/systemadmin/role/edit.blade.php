@extends('_layouts.app')

@section('title','تعديل وظيفة')

@section('content')

    <section id="edit-section" class="bg-secondary-subtle">

        <div class="container py-5">

            <div class="card  shadow w-50 mx-auto position-relative">
                <h3 class="card-header bg-primary py-4"></h3>
                <span class="w-100 d-flex flex-column align-items-center justify-content-center px-5 position-absolute start-50  translate-middle" style="background-image: url('{{ Vite::asset('resources/imgs/home/clip.svg')}}');background-repeat: no-repeat;background-position: center;top: 27px">
                    <h3 class="text-dark fw-bold my-5 display-6 text-center">تعديل وظيفة</h3>
                </span>
                <div class="card-body px-4 py-5">


                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="edit-role">


                        <form method="POST" action="{{ route('role.update',$role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row gy-3">

                                <div class="col-md-12">
                                    <x-c-input type="text" label="الوظيفة" name="role" id="role" value="{{old('role',$role->name)}}"/>
                                </div>

                                <div class="col-md-12">

                                    <label for="permissions" class="mb-3">الصلاحيات</label>

                                    <div class="d-flex flex-wrap">

                                        @foreach($permissions as $key => $permission)
                                            <div class="form-check me-4">
                                                <input class="form-check-input" type="checkbox" value="{{$permission->name}}" id="permission-{{$key+1}}" name="permissions[]" @checked(in_array($permission->name,$rolePermissions))>
                                                <label class="form-check-label" for="permission-{{$key+1}}">
                                                    {{$permission->name}}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <button class="btn btn-primary text-light mb-3 w-100">
                                        تعديل
                                    </button>

                                </div>

                            </div>

                        </form>
                    </div>



                </div>
            </div>


        </div>

    </section>
@endsection
