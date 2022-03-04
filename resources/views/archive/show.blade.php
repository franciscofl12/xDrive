<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-gray-900 leading-tight">
            {{$archive->name}}
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
        </h1>
    </x-slot>

    <div class="h-full bg-white shadow-md shadow-lg mb-4">

        <div class="border-b-2 block md:flex">

            <div class="w-full md:w-2/5 p-4 sm:p-6 lg:px-8 bg-white">
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <section
                        class="grid grid-cols-1 shadow-mg duration-700 transition rounded-lg md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-1 gap-3 p-6 bg-white border-b border-gray-200 shadow-lg">
                        <div class="w-60 p-2">
                            <div class="group relative">
                                <img alt="Archive Image"
                                     class="block h-48 p-2 w-full object-fill border-gray-100 rounded"
                                     src="{{ asset('../resources/img/'.$archive->type.'.png')}}">
                                <span class="text-sm">Upload at: {{$archive->created_at}}.</span>
                            </div>
                        </div>
                    </section>
                    <a href="{{url('download/'.$archive->id)}}">
                        <button type="submit"
                                class="hover:scale-110 hover:text-gray-900 text-indigo-500 outline-none transform translate-y-3 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                        </button>
                    </a>
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $archive->owner)
                        <form action="{{route('archive.destroy' , $archive->id)}}" method="POST">
                            @csrf
                            @method('Delete')
                            <button type="submit"
                                    class="hover:scale-110 hover:text-gray-900 text-indigo-500 outline-none transform translate-y-3 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    @endif
                    <br>
                </div>
            </div>

            <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                    Archive Information
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">

                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="text-md text-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            Owner:
                                        </td>
                                        <td class="text-md text-left text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{\App\Models\User::findOrFail($archive->owner)->username}}
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="text-md text-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            Type:
                                        </td>
                                        <td class="text-md text-left text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$archive->type}}
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="text-md text-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            Size:
                                        </td>
                                        <td class="text-md text-left text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$archive->size}} MB
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $archive->owner)
                    <form action="{{route('sharedarchive.store')}}" method="POST"
                          class="w-full content-center items-center">
                        @csrf
                        <div class="flex items-center content-center border-b border-indigo-500 py-2">
                            <input
                                class="appearance-none bg-transparent border-none w-full text-indigo-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                type="text" placeholder="username" name="username" id="username"
                                value="{{ old('username') }}" aria-label="username">
                            <input type="hidden" name="id" value="{{$archive->id}}">
                            <button type="submit"
                                    class="flex-shrink-0 bg-indigo-500 hover:bg-gray-900 border-indigo-500 hover:border-gray-900 text-sm border-4 text-white py-1 px-2 rounded"
                                    type="button">
                                Share With
                            </button>
                            <button
                                class="flex-shrink-0 border-transparent border-4 text-indigo-500 hover:text-gray-900 text-sm py-1 px-2 rounded"
                                type="button" onclick="ClearFields();">
                                Cancel
                            </button>
                            <script>
                                function ClearFields() {
                                    document.getElementById("username").value = "";
                                }
                            </script>
                        </div>
                    </form>
                    @error('username')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{$message}}.</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"><title>Close</title><path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                  </span>
                    </div>
                    @enderror
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col bg-white">
        <span class="mb-4 text-gray-900">Archive shared with:</span>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Name
                            </th>
                            <th scope="col"
                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Email
                            </th>
                            <th scope="col"
                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Username
                            </th>
                            @if(\Illuminate\Support\Facades\Auth::user()->id == $archive->owner)
                                <th scope="col" class="p-4">
                                    <span class="sr-only">Remove access</span>
                                </th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @for($i = 0; $i < count($sharedWith); $i++)
                            <form action="{{route('sharedarchive.destroy',$sharedWith[$i]->id)}}" method="POST">
                                @csrf
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{App\Models\User::findOrFail($sharedWith[$i]->sharedID)->firstname . " " . App\Models\User::findOrFail($sharedWith[$i]->sharedID)->lastname}}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                        {{App\Models\User::findOrFail($sharedWith[$i]->sharedID)->email}}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{App\Models\User::findOrFail($sharedWith[$i]->sharedID)->username}}
                                    </td>
                                    @method('Delete')
                                    @if(\Illuminate\Support\Facades\Auth::user()->id == $archive->owner)
                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                            <button type="submit"
                                                    class="text-indigo-500 dark:text-blue-500 hover:underline">
                                                Remove access
                                            </button>
                                        </td>
                                    @endif
                                </tr>
                            </form>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
