<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('حذف الحساب') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('تنبيه : اذا تم حذف الحساب ، ستُحذف جميع المعلومات المتعلقة به .') }}
        </p>
    </header>

    <x-button
        variant="danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('حذف الحساب') }}
    </x-button>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >
        <form
            method="post"
            action="{{ route('subAdmin.destroy',$subAdmin->id) }}"
            class="p-6"
        >
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">
                {{ __('هل تريدين بالفعل حذف الحساب ؟') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('تنبيه : اذا تم حذف الحساب ، ستُحذف جميع المعلومات المتعلقة به .') }}
            </p>

            <!-- <div class="mt-6 space-y-6">
                <x-form.label
                    for="delete-user-password"
                    value="Password"
                    class="sr-only"
                />

                <x-form.input
                    id="delete-user-password"
                    name="password"
                    type="password"
                    class="block w-3/4"
                    placeholder="Password"
                />

                <x-form.error :messages="$errors->userDeletion->get('password')" />
            </div> -->

            <div class="mt-6 flex justify-end">
                <x-button
                    type="button"
                    variant="secondary"
                    x-on:click="$dispatch('close')"
                >
                    {{ __('إلغاء') }}
                </x-button>

                <x-button
                    variant="danger"
                    class="ml-3"
                >
                    {{ __('حذف الحساب') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</section>
