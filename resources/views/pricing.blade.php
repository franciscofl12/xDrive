<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            <p class="mb-4">Free Plan</p>
            @php
                $totalsize = 0;
                foreach (\App\Http\Controllers\ArchiveController::class::getAllArchives(auth()->user()->id) as $archive) {
                    $totalsize =+ $archive->size;
                }
                $percentage = round(($totalsize/5120)*10,2);
            @endphp
            <p class="mb-2">{{$percentage}}%/5GB</p>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{$percentage}}%"></div>
            </div>
            @if(session('error')==1)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">Database error, contact with an admin.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"><title>Close</title><path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                  </span>
                </div>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white py-4 overflow-hidden sm:rounded-lg grid grid-cols-3 shadow-mg md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-1">
                <div class="shadow-lg rounded-2xl w-64 bg-white dark:bg-gray-800 p-4">
                    <p class="text-gray-800 dark:text-gray-50 text-xl font-medium mb-4">
                        Free
                    </p>
                    <p class="text-gray-900 dark:text-white text-3xl font-bold">
                        $0
                        <span class="text-gray-300 text-sm">
            / month
        </span>
                    </p>
                    <p class="text-gray-600 dark:text-gray-100  text-xs mt-4">
                        For all registered users.
                    </p>
                    <ul class="text-sm text-gray-600 dark:text-gray-100 w-full mt-6 mb-6">
                        <li class="mb-3 flex items-center ">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                 stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                <path
                                    d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            5GB Cloud Storage
                        </li>
                        <li class="mb-3 flex items-center ">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                 stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                <path
                                    d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            Security from virus
                        </li>
                        <li class="mb-3 flex items-center opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red"
                                 viewBox="0 0 1792 1792">
                                <path
                                    d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            High speed uploading
                        </li>
                        <li class="mb-3 flex items-center opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red"
                                 viewBox="0 0 1792 1792">
                                <path
                                    d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            Unlimited shares
                        </li>
                    </ul>
                    <button type="button"
                            class="py-2 px-4  bg-indigo-500 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Choose plan
                    </button>
                </div>
                <div class="shadow-lg rounded-2xl w-64 bg-white dark:bg-gray-800 p-4">
                    <p class="text-gray-800 dark:text-gray-50 text-xl font-medium mb-4">
                        Deluxe
                    </p>
                    <p class="text-gray-900 dark:text-white text-3xl font-bold">
                        $5
                        <span class="text-gray-300 text-sm">
            / month
        </span>
                    </p>
                    <p class="text-gray-600 dark:text-gray-100  text-xs mt-4">
                        For those who wants an extra.
                    </p>
                    <ul class="text-sm text-gray-600 dark:text-gray-100 w-full mt-6 mb-6">
                        <li class="mb-3 flex items-center ">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                 stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                <path
                                    d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            20GB Cloud Storage
                        </li>
                        <li class="mb-3 flex items-center ">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                 stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                <path
                                    d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            Security from virus
                        </li>
                        <li class="mb-3 flex items-center ">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                 stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                <path
                                    d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            High speed uploading
                        </li>
                        <li class="mb-3 flex items-center opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red"
                                 viewBox="0 0 1792 1792">
                                <path
                                    d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            Unlimited shares
                        </li>
                    </ul>
                    <button type="button"
                            class="py-2 px-4  bg-indigo-500 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Choose plan
                    </button>
                </div>
                <div class="shadow-lg rounded-2xl w-64 bg-white dark:bg-gray-800 p-4">
                    <p class="text-gray-800 dark:text-gray-50 text-xl font-medium mb-4">
                        Free
                    </p>
                    <p class="text-gray-900 dark:text-white text-3xl font-bold">
                        $10
                        <span class="text-gray-300 text-sm">
            / month
        </span>
                    </p>
                    <p class="text-gray-600 dark:text-gray-100  text-xs mt-4">
                        For those who wants ALL.
                    </p>
                    <ul class="text-sm text-gray-600 dark:text-gray-100 w-full mt-6 mb-6">
                        <li class="mb-3 flex items-center ">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                 stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                <path
                                    d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            Unlimited Cloud Storage
                        </li>
                        <li class="mb-3 flex items-center ">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                 stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                <path
                                    d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            Security from virus
                        </li>
                        <li class="mb-3 flex items-center ">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                 stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                <path
                                    d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            High speed uploading
                        </li>
                        <li class="mb-3 flex items-center ">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                 stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                <path
                                    d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                </path>
                            </svg>
                            Unlimited shares
                        </li>
                    </ul>
                    <button type="button"
                            class="py-2 px-4  bg-indigo-500 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Choose plan
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
