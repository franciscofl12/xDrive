<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            <p class="mb-4">Admin Panel</p>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                @if(session('error')==1)
                                    <div
                                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold">Error!</strong>
                                        <span class="block sm:inline">No data session from user, this user has been created automatically?.</span>
                                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                             xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20"><title>Close</title><path
                                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                        </span>
                                    </div>
                                @endif
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Storage
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Email Verified
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Role
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <?php
                                                        if($user->avatar == null) {
                                                        ?>
                                                        <img class="h-10 w-10 rounded-full border-indigo-400"
                                                             src="{{asset('../resources/img/defaultavatar.jpg')}}"
                                                             alt="">
                                                        <?php
                                                        } else {
                                                        ?>
                                                        <img class="h-10 w-10 rounded-full border-indigo-400"
                                                             src="{{asset('storage/profilepictures/' . $user->avatar)}}"
                                                             alt="">
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div
                                                            class="text-sm font-medium text-gray-900">{{$user->firstname}} {{$user->lastname}}</div>
                                                        <div class="text-sm text-gray-500">{{$user->email}}</div>
                                                        <div class="text-sm text-gray-500">{{$user->username}}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            @php
                                                $totalsize = 0;
                                                foreach (\App\Http\Controllers\ArchiveController::class::getAllArchives($user->id) as $archive) {
                                                    $totalsize =+ $archive->size;
                                                }
                                                $percentage = round(($totalsize/5120)*10,2);
                                            @endphp
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{$percentage}}%/5GB
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                    <div class="bg-blue-600 h-2.5 rounded-full"
                                                         style="width: {{$percentage}}%"></div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @for ($i= 0; $i < count($data); $i++ )
                                                    @if ($data[$i]->user_id == $user->id)
                                                        @if ($data[$i]->last_activity-strtotime(now()) < 300 && $data[$i]->last_activity-strtotime(now()) > -300)
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
                                                            @endif</h1>
                                                            @if ($data[$i]->last_activity-strtotime(now()) > 300 || $data[$i]->last_activity-strtotime(now()) < -300)
                                                                <span
                                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"> Inactive </span>
                                                                @endif</h1>
                                                            @endif
                                                            @endfor
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($user->email_verified_at != null)
                                                    <div class="text-sm text-green-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="text-sm text-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$user->rol}}</td>
                                            <td class="py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{url('edit/'.$user->id)}}"
                                                   class="text-indigo-600 hover:text-indigo-900 inline-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </a>
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900 inline-flex"
                                                   data-modal-toggle="popup-modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Product Modal -->
    <div
        class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
        id="popup-modal">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-toggle="popup-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 pt-0 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                        delete this account?</h3>
                    <button data-modal-toggle="popup-modal" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-toggle="popup-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</x-app-layout>
