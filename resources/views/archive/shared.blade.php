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
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <h1 class="p-4">Shared Archives</h1>
                <section
                    class="grid grid-cols-1 shadow-mg duration-700 transition rounded-lg md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-1 gap-3 p-6 bg-white border-b border-gray-200 shadow-lg">
                    @foreach(\App\Http\Controllers\SharedArchiveController::class::getAllArchiveShared(auth()->user()->id) as $archive)
                        <div class="bg-gray-900 w-60 shadow-lg rounded p-2">
                            <div class="flex">
                                <a href="{{route('archive.show' , $archive->id)}}"
                                   class="text-sm text-white hover:text-indigo-400">
                                    {{$archive->name}}
                                </a>
                            </div>
                            <div class="group relative">
                                <img alt="Archive Image" class="block z-0 h-48 p-2 w-full object-fill rounded"
                                     src="{{ asset('../resources/img/'.$archive->type.'.png')}}">
                                <div
                                    class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 duration-700 transition justify-evenly">
                                    <a href="{{url('download/'.$archive->id)}}">
                                        <button type="submit"
                                                class="hover:scale-110 text-white outline-none  opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>

</x-app-layout>
