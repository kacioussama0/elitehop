<!-- Create modal -->
<div id="createSubAdminModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">إضـافة مديرة فرع</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-target="createSubAdminModal" data-modal-toggle="createSubAdminModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form method="POST" action="{{ route('subAdmin.store') }}">
            @csrf 

            <div class="grid gap-6">
                <!-- Name -->
                <div class="space-y-2">
                    <x-form.label
                        class="rtl"
                        for="name"
                        :value="__('الاسم')"
                    />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input
                            withicon
                            id="name"
                            class="block w-full rtl"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            placeholder="{{ __('الاسم') }}"
                        />
                    <x-form.error :messages="$errors->get('name')" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-form.label
                        class="rtl"
                        for="email"
                        :value="__('الايميل')"
                    />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input
                            withicon
                            id="email"
                            class="block w-full rtl"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            placeholder="{{ __('الايميل') }}"
                        />
                    <x-form.error :messages="$errors->get('email')" />
                    </x-form.input-with-icon-wrapper>
                </div>
           
                <!-- branch -->
                <div class="space-y-2">
                    <x-form.label
                        class="rtl"
                        for="branch"
                        :value="__('الفرع')"
                    />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-home class="w-5 h-5" aria-hidden="true" />
                        </x-slot>

                     @include('loops.branch')
                      
                     <x-form.error :messages="$errors->get('branch')" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- role -->
                <div class="space-y-2">
                    <x-form.label
                        class="rtl"
                        for="role"
                        :value="__('الوظيفة')"
                    />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user class="w-5 h-5 hidden" aria-hidden="true" />
                        </x-slot>

                        <div id="role" class="rtl block w-full z-10  bg-white rounded-lg shadow dark:bg-gray-700">
                        <ul
                            class=" text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @foreach ($roles as $key => $role)
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="role-{{ $role->id }}" type="radio"
                                            name="role"
                                            value="{{ $role->name }}"
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
                
                <!-- Password -->
                <div class="space-y-2">
                    <x-form.label
                        class="rtl"
                        for="password"
                        :value="__('كلمة المرور')"
                    />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input
                            withicon
                            id="password"
                            class="block w-full rtl"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="{{ __('كلمة المرور') }}"
                        />
                    <x-form.error :messages="$errors->get('password')" />  
                    </x-form.input-with-icon-wrapper>
                   <small class="block rtl text-xs " style="margin-top: 0;"> 
                   يفضل استخدام كلمة مرور قوية ، كلمة مرور مقترحة :
                    <br>
                    {{ str()->password(8) }}
                  </small>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <x-form.label
                        class="rtl"
                        for="password_confirmation"
                        :value="__('تأكيد كلمة المرور')"
                    />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input
                            withicon
                            id="password_confirmation"
                            class="block w-full rtl"
                            type="password"
                            name="password_confirmation"
                            required
                            placeholder="{{ __('تأكيد كلمة المرور') }}"
                        />
                    <x-form.error :messages="$errors->get('password_confirmation')" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <div>
                    <x-button class="justify-center w-full gap-2">
                        <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />

                        <span>إضـافة</span>
                    </x-button>
                </div>

            </div>
        </form>
        </div>
    </div>
</div>