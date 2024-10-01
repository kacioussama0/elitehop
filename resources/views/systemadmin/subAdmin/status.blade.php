@if (session('status') === 'new-subadmin')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
            class="text-sm text-teal-600 dark:text-teal-400">
            تم إضافة مديرة فرع جديدة
        </p>
    @elseif (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                class="text-sm text-teal-600 dark:text-teal-400">
                تم تعديل البيانات
            </p>
        @elseif (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                class="text-sm text-teal-600 dark:text-teal-400">
                تم تغيير كلمة المرور .
            </p>
    @elseif (session('status') === 'subadmin-deleted')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
            class="text-sm text-teal-600 dark:text-teal-400">
            تم حذف الحساب.
        </p>
@endif