<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="h-full bg-white shadow-md shadow-lg">

        <div class="border-b-2 block md:flex">

            <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white">
                <div class="flex justify-between">
                    <h1 class="font-semibold block">{{$user->username}}'s Profile


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

                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-6">
                        <label for="name" class="font-semibold text-gray-900 block pb-1">Password change</label>
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
                                <input id="username" disabled class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="text"
                                       value="{{$user->username}}"/>
                            </div>
                        </div>
                        <div class="pb-4">
                            <label for="email" class="font-semibold text-gray-900 block pb-1">Email</label>
                            <input id="email" disabled class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="email"
                                   value="{{$user->email}}"/>
                        </div>
                        <div class="max-w-2xl rounded-lg bg-gray-50">
                            <div class="mb-4">
                                <label class="inline-block mb-2 text-gray-900">Avatar Upload</label>
                                <div class="flex items-center justify-center w-full">
                                    <label
                                        class="flex flex-col w-full h-40 border-4 border-gray-900 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                        <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                            <li id="empty"
                                                class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                                <img class="w-28 py-2"
                                                     src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                                     alt="no data"/>
                                                <span class="text-small text-gray-500">No photo selected</span>
                                            </li>
                                        </ul>
                                        <input name="file" type="file" id="hidden-input" class="opacity-0"/>
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
