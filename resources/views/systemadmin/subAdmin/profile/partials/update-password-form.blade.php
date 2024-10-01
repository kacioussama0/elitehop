<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('تغيير كلمة المرور') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('تأكد من اختيار كلمة مرور طويلة ومعقدة حتى يبقى حسابك آمناً .') }}
        </p>
        <small class="text-xs text-gray-600 dark:text-gray-400">
           كلمة المرور لا تقل عن 6 خانات ، تحوي حروف وأرقام ورموز
        </small>
    </header>

    <form
        method="post"
        action="{{ route('subAdmin.update',$subAdmin->id) }}"
        class="mt-6 space-y-6"
    >
        @csrf
        @method('put')

        {{--<div class="space-y-2">
            <x-form.label
                for="current_password"
                :value="__('كلمة المرور الحالية')"
            />

            <x-form.input
                id="current_password"
                name="current_password"
                type="password"
                class="block w-full"
                autocomplete="current-password"
            />

            <x-form.error :messages="$errors->updatePassword->get('current_password')" />
        </div>--}}

        <div class="space-y-2">
            <x-form.label
                for="password"
                :value="__('كلمة المرور الجديدة')"
            />

            <x-form.input
                id="password"
                name="password"
                type="password"
                class="block w-full"
                autocomplete="new-password"
            />

            <x-form.error :messages="$errors->updatePassword->get('password')" />
        </div>

        <div class="space-y-2">
            <x-form.label
                for="password_confirmation"
                :value="__('تأكيد كلمة المرور')"
            />

            <x-form.input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="block w-full"
                autocomplete="new-password"
            />

            <x-form.error :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4">
            <x-button>
                {{ __('حفظ') }}
            </x-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >
                    {{ __('تم تغيير كلمة المرور .') }}
                </p>
            @endif
        </div>
    </form>
</section>
