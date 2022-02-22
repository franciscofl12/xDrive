<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="h-full bg-white shadow-md shadow-lg">

        <div class="border-b-2 block md:flex">

            <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white">
                <div class="flex justify-between">
                    <h1 class="font-semibold block">{{$user->username}}'s Profile
                        @if ($data[0]->last_activity-strtotime(now()) < 300 && $data[0]->last_activity-strtotime(now()) > -300)
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
                             src="../../resources/img/defaultavatar.jpg" width="150px">
                        @else
                        <img class="mx-auto rounded-full border-2 border-indigo-400" src="" width="150px">
                        @endif
                    </div>
                </div>
                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-1">
                        <p for="name" class="font-semibold text-gray-900 block pb-1">IP</p>
                            {{$data[0]->ip_address}}
                    </div>
                </div>

                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-1">
                        <p for="name" class="font-semibold text-gray-900 block pb-1">Last Activity</p>
                        {{date("Y-m-d H:i:s", $data[0]->last_activity)}}
                    </div>
                </div>
                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-6">
                        <label for="name" class="font-semibold text-gray-900 block pb-1">Password change</label>
                        <span
                            class="text-red-500 mb-3 block text-sm">Changing the password of a User without sending him, will loss the access of the account.</span>
                        <form action="" method="POST">
                            @csrf
                            <div class="flex mb-4">
                                <input id="pwd" class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="password"
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
                    <form action="" method="POST">
                        @csrf

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

</x-app-layout>
