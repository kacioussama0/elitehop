<x-app-layout>
    <x-slot name="header">
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 T-center">
            منسوبات الفروع + 
            مديرة الموقع/الفرع
            </div>
    </x-slot>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    @include('systemadmin.subAdmin.status')


    <!-- ____________________________________________Start block_________________________________________________ -->

    <section class="bg-gray-50 dark:bg-dark-eval-1 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-dark-eval-1 relative shadow-md sm:rounded-lg overflow-hidden">


                <!-- ____________________________________________ADD AND FILTER BUTTONS_________________________________________________ -->
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div
                    
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" id="createSubAdminModalButton" data-modal-target="createSubAdminModal"
                            data-modal-toggle="createSubAdminModal"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            إضافة منسوبات
                        </button>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <div id="actionsDropdown"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                            Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                        all</a>
                                </div>
                            </div>
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                تصفية
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>

                            <div id="filterDropdown"
                                class="z-10 hidden w-auto p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white text-center">اختاري:
                                </h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                    @foreach (config('constants.BRANCHS') as $key => $branch)
                                        <li class="flex items-center">
                                            <input id="{{ $branch }}" type="checkbox"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="{{ $branch }}"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $branch }}
                                                ({{ $key }})</label>
                                        </li>
                                    @endforeach
                                </ul>

                                <div>
                                    <button type="button" id="filterButton"
                                        class="mt-3 flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                            class="h-4 w-4 mr-2 text-white-400" viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <small>تصفية</small>
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ____________________________________________TABLE'S ROWS_________________________________________________ -->
                <div class="overflow-x-auto">
                    <table class="text-center w-full mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                                <th scope="col" class="px-4 py-3">الفرع</th>
                                <th scope="col" class="px-4 py-3">الصلاحيات</th>
                                <th scope="col" class="px-4 py-3">الوظيفة</th>
                                <th scope="col" class="px-4 py-3">الايميل</th>
                                <th scope="col" class="px-4 py-3">الاسـم</th>
                                <td class="px-4 py-3">م</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($subAdmins as $subAdmin)
                                <tr  class="hover:bg-gray-50 dark:hover:bg-gray-600 odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700 border-b dark:border-gray-700">
                                    <!-- edit and delet buttons -->
                                    <td class="px-4 py-3 flex items-center justify-end">

                                        <!-- the action dotes (...)  -->
                                        <button id="{{ $subAdmin->id }}-dropdown-button"
                                            data-dropdown-toggle="action-{{ $subAdmin->id}}-dropdown"
                                            class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <!-- END the action dotes (...)  -->

                                        <div id="action-{{ $subAdmin->id }}-dropdown"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm" aria-labelledby="{{ $subAdmin->id}}-dropdown-button">
                                                <li>
                                                    <a href="{{ route('subAdmin.edit', $subAdmin->id) }}">
                                                        <button type="button" data-modal-target="updateProductModal"
                                                            data-modal-toggle="updateProductModal"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                                viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path
                                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                            </svg>
                                                            تعديل
                                                        </button>
                                                    </a>
                                                </li>
                                                <li>
                                                    <button type="button"
                                                        data-modal-target="deleteModal-{{ $subAdmin->id }}"
                                                        data-modal-toggle="deleteModal-{{ $subAdmin->id }}"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                                        <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                fill="currentColor"
                                                                d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                                        </svg>
                                                        حذف
                                                    </button>

                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <!-- END edit and delet buttons -->

                                    <!-- rows content -->
                                    <td class="px-4 py-3">
                                        {{ branch_name($subAdmin->branch) }}
                                    </td>
                                    
                                    <td class="px-4 py-2 ">
                                        @foreach ($subAdmin->getPermissionNames() as $subAdminPermission)
                                                <div
                                                    class="inline bg-teal-100 text-teal-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-teal-400 border border-teal-400">
                                                     {{ $subAdminPermission }}
                                                </div>
                                         @endforeach
                                    </td>
                                    <td class="px-4 py-3 max-w-[12rem] truncate">
                                        @foreach ($subAdmin->getRoleNames() as $subAdminRoles)
                                            <div
                                                class="inline bg-teal-100 text-teal-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-teal-400 border border-teal-400">
                                                {{ $subAdminRoles }}
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-3">{{ $subAdmin->email}}</td>
                                    <td class="px-4 py-3">{{ $subAdmin->name}}</td>
                                    <td class="px-4 py-3">
                                    {{ $loop->iteration }}
                                    </td>
                                    <!-- END rows content -->

                                </tr>
                                <!-- ____________________________________________DELETE SUBADMIN_________________________________________________ -->
                                <!-- Delete modal -->

                                @include('systemadmin.subAdmin.delete')
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- ____________________________________________PAGINATION_________________________________________________ -->

                @include('systemadmin.subAdmin.pagination')

            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- ____________________________________________CREATE NEW  SUBADMIN_________________________________________________ -->

    @include('systemadmin.subAdmin.create')



</x-app-layout>