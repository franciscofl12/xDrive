<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="h-full bg-white shadow-md shadow-lg">

        <div class="border-b-2 block md:flex">

            <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white">
                <div class="flex justify-between">
                    <h1 class="font-semibold block">{{$user->username}}'s Profile
                        @if ($data->last_activity-strtotime(now()) < 300 && $data->last_activity-strtotime(now()) > -300)
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
                        @else
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"> Disconnected </span>
                        @endif</h1>

                </div>

                <span class="text-base text-gray-900 mb-4">All information changed here will be irreversible </span>

                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-1">
                        <p for="name" class="font-semibold text-gray-900 block pb-1">Current Avatar</p>
                        @if($user->avatar == null)
                            <img class="mx-auto rounded-full border-2 border-indigo-400"
                                 src="{{ asset('../resources/img/defaultavatar.jpg')}}" width="150px">
                        @else
                            <img class="mx-auto rounded-full border-2 border-indigo-400" src="" width="150px">
                        @endif
                    </div>
                </div>
                <div class="w-full p-8 mx-2">
                    @php
                        $totalsize = 0;
                        foreach (\App\Http\Controllers\ArchiveController::class::getAllArchives($user->id) as $archive) {
                            $totalsize =+ $archive->size;
                        }
                        $percentage = round(($totalsize/5120)*10,2);
                    @endphp
                    <p class="mb-2">{{$percentage}}%/5GB</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{$percentage}}%"></div>
                    </div>
                </div>
                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-1">
                        <p for="name" class="font-semibold text-gray-900 block pb-1">IP</p>
                        {{$data->ip_address}}
                    </div>
                </div>

                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-1">
                        <p for="name" class="font-semibold text-gray-900 block pb-1">Last Activity</p>
                        {{date("Y-m-d H:i:s", $data->last_activity)}}
                    </div>
                </div>
                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-6">
                        <label for="name" class="font-semibold text-gray-900 block pb-1">Password change</label>
                        <span
                            class="text-red-500 mb-3 block text-sm">Changing the password of a User without sending him, will loss the access of the account.</span>
                        <form action="{{route('user.update' , $user->id)}}" method="POST">
                            @csrf
                            <div class="flex mb-4">
                                <input id="password" name="password" class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="password"
                                       value=""/> <br>
                            </div>
                            <x-button class="ml-3">
                                Update password
                            </x-button>
                            @method('PUT')
                        </form>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4">
                <div class="rounded  shadow p-6">
                    <form action="{{route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <span
                            class="text-gray-600 pt-4 mb-4 block opacity-70">Personal login information of {{$user->username}} profile</span>
                        <div class="pb-6">
                            <label for="firstname" class="font-semibold text-gray-900 block pb-1">First Name</label>
                            <div class="flex">
                                <input id="firstname" class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full"
                                       type="text"
                                       value="{{$user->firstname}}"/>
                            </div>
                        </div>
                        <div class="pb-6">
                            <label for="lastname" class="font-semibold text-gray-900 block pb-1">Last Name</label>
                            <div class="flex">
                                <input id="lastname" class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="text"
                                       value="{{$user->lastname}}"/>
                            </div>
                        </div>
                        <div class="pb-6">
                            <label for="username" class="font-semibold text-gray-900 block pb-1">Username</label>
                            <div class="flex">
                                <input id="username" class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="text"
                                       value="{{$user->username}}"/>
                            </div>
                        </div>
                        <div class="pb-4">
                            <label for="email" class="font-semibold text-gray-900 block pb-1">Email</label>
                            <input id="email" class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="email"
                                   value="{{$user->email}}"/>
                        </div>
                        <div class="pb-6">
                            <label for="username" class="font-semibold text-gray-900 block pb-1">Rol</label>
                            <div class="flex">
                                <select class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full"
                                        aria-label="Rol selection">
                                    @if($user->rol == "user")
                                        <option selected>{{$user->rol}}</option>
                                        <option>admin</option>
                                    @else
                                        <option selected>{{$user->rol}}</option>
                                        <option>user</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="max-w-2xl rounded-lg bg-gray-50">
                            <div class="mb-4">
                                <label class="inline-block mb-2 text-gray-900">Avatar Upload</label>
                                <div class="flex items-center justify-center w-full">
                                    <label
                                        class="flex flex-col w-full h-32 border-4 border-gray-900 border-dashed hover:bg-gray-100 hover:border-indigo-400">
                                        <div class="flex flex-col items-center justify-center pt-7">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-8 h-8 text-gray-400 group-hover:text-gray-600"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                            </svg>
                                            <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                                Attach a photo</p>
                                        </div>
                                        <input type="file" class="opacity-0"/>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <x-button class="ml-3">
                            Update Profile
                        </x-button>
                        @method('PUT')
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="h-full bg-white shadow-md shadow-lg ">

        <div class="border-b-2 block md:flex py-5 px-4">
            Archives from {{$user->username}}
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <section
                    class="grid grid-cols-1 shadow-mg duration-700 transition rounded-lg md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-1 gap-3 p-6 bg-white border-b border-gray-200 shadow-lg">
                    @foreach(\App\Http\Controllers\ArchiveController::class::getAllArchives(auth()->user()->id) as $archive)
                        <div class="bg-gray-900 w-60 shadow-lg rounded p-2">
                            <div class="flex">
                                <a href="{{route('archive.show' , $archive->id)}}"
                                   class="text-sm text-white hover:text-indigo-400">
                                    {{$archive->name}}
                                </a>
                            </div>
                            <div class="group relative">
                                <img alt="Placeholder" class="block h-48 p-2 w-full object-fill rounded"
                                     src="{{ asset('../resources/img/'.$archive->type.'.png')}}">
                                <div
                                    class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 duration-700 transition justify-evenly">

                                    <button type="submit"
                                            class="hover:scale-110 text-white outline-none  opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                        </svg>
                                    </button>
                                    <form action="{{route('archive.destroy' , $archive->id)}}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit"
                                                class="hover:scale-110 text-white outline-none opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>

            </div>
        </div>

    </div>
    <div class="h-full bg-white shadow-md shadow-lg">

        <div class="border-b-2 block md:flex py-5 px-4">
            Archives shared with {{$user->username}}
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                 Archivos compartidos aqui
            </div>
        </div>

    </div>

</x-app-layout>
