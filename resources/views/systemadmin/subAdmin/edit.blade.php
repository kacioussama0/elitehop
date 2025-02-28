<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
        تعديل بيانات مديرة الفرع
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                @include('systemadmin.subAdmin.profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                @include('systemadmin.subAdmin.profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                @include('systemadmin.subAdmin.profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
