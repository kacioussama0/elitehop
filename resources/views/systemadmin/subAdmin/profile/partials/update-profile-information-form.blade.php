<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('معلومات الحساب') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("تحديث معلومات الحساب والبريد الإلكتروني .") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('subAdmin.update', $subAdmin->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- name -->
        <div class="space-y-2">
            <x-form.label for="name" :value="__('الاسم')" />

            <x-form.input id="name" name="name" type="text" class="block w-full" :value="old('name', $subAdmin->name)"
                required autofocus autocomplete="name" />

            <x-form.error :messages="$errors->get('name')" />
        </div>

        <!-- email -->
        <div class="space-y-2">
            <x-form.label for="email" :value="__('البريد')" />

            <x-form.input id="email" name="email" type="email" class="block w-full" :value="old('email', $subAdmin->email)" required autocomplete="email" />

            <x-form.error :messages="$errors->get('email')" />

            <!-- @if ($subAdmin instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $subAdmin->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-300">
                        {{ __('بريدك الإلكتروني غير مفعل .') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  dark:text-gray-400 dark:hover:text-gray-200 dark:focus:ring-offset-gray-800">
                            {{ __('انقر هنا ، لإعادة ارسال رابط التفعيل .') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('تم ارسال رابط التفعيل الجديد على بريدك الإلكتروني .') }}
                        </p>
                    @endif
                </div>
            @endif -->
        </div>

        <!-- branch -->
        <div class="space-y-2">
            <x-form.label for="branch" :value="__('الفرع')" />

            <select id="branch" name="branch"
                class="block w-full py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">

                @foreach (config('constants.BRANCHS') as $key => $branch)
                    @if ($key == $subAdmin->branch)
                        <option selected="{{ $key }}" value="{{ $key }}">{{ $branch }}</option>
                    @else
                        <option value="{{ $key }}">{{ $branch }}</option>
                    @endif
                @endforeach

            </select>

            <x-form.error :messages="$errors->get('branch')" />
        </div>


        <!-- role -->
        <div class="space-y-2">
            <x-form.label for="role" :value="__('الوظيفة')" />

            <x-form.input-with-icon-wrapper>
                <x-slot name="icon">
                    <x-heroicon-o-user class="w-5 h-5 hidden" aria-hidden="true" />
                </x-slot>

                <div id="role" class=" block w-full z-10  bg-white rounded-lg shadow dark:bg-gray-700">
                    <ul
                        class=" text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach ($roles as $key => $role)
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="role-{{ $role->id }}" type="radio" name="role" value="{{ $role->name }}"
                                        {{ in_array($role->name, $subAdminRoles) ? 'checked' : '' }}
                                        class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="role-{{ $role->id }}"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <x-form.error :messages="$errors->get('role')" />
            </x-form.input-with-icon-wrapper>
        </div>

        <!-- permissions -->
        <div class="space-y-2">
            <x-form.label for="permissions" :value="__('الصلاحيات')" />

            <x-form.input-with-icon-wrapper>
                <x-slot name="icon">
                    <x-heroicon-o-user class="w-5 h-5 hidden" aria-hidden="true" />
                </x-slot>

                <div id="permissions" class=" block w-full z-10  bg-white rounded-lg shadow dark:bg-gray-700">
                    <ul
                        class=" text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach ($permissions as $permission)
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="permission-{{ $permission->id }}" type="checkbox" name="permissions[]"
                                        value="{{ $permission->name }}" 
                                        {{ in_array($permission->name, $subAdminPermissions) ? 'checked' : '' }}
                                        class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="permission-{{ $permission->id }}"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <x-form.error :messages="$errors->get('permission')" />
            </x-form.input-with-icon-wrapper>
        </div>


        <div class="flex items-center gap-4">
            <x-button>
                {{ __('حفظ') }}
            </x-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('تم الحفظ.') }}
                </p>
            @endif
        </div>
    </form>
</section>