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
                                <img alt="Archive Image" class="block h-48 p-2 w-full object-fill rounded"
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
                <form action="{{route('archive.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div id="overlay" class="m-4">
                        <label class="inline-block mb-2 text-gray-500">File Upload</label>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="flex flex-col w-full h-40 border-4 border-gray-900 border-dashed hover:bg-gray-100 hover:border-indigo-400">
                                <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                    <li id="empty"
                                        class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                        <img class="w-28 py-2"
                                             src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                             alt="no data"/>
                                        <span class="text-small text-gray-500">No files selected</span>
                                    </li>
                                </ul>
                                <input name="uploadfiles" type="file" multiple id="hidden-input" class="opacity-0"/>
                            </label>

                        </div>
                    </div>
                    <div class="flex justify-center p-2">
                        <button class="w-full px-4 py-2 text-white bg-gray-900 hover:bg-indigo-400 rounded shadow-xl">
                            Upload Files
                        </button>
                    </div>
                </form>
                <!-- using two similar templates for simplicity in js code -->
                <template id="file-template">
                    <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                        <article tabindex="0"
                                 class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                            <img alt="upload preview"
                                 class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed"/>

                            <section
                                class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                <div class="flex">
              <span class="p-1 text-blue-800">
                <i>
                  <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24"
                       height="24" viewBox="0 0 24 24">
                    <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z"/>
                  </svg>
                </i>
              </span>
                                    <p class="p-1 size text-xs text-gray-700"></p>
                                    <button
                                        class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24">
                                            <path class="pointer-events-none"
                                                  d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z"/>
                                        </svg>
                                    </button>
                                </div>
                            </section>
                        </article>
                    </li>
                </template>

                <template id="image-template">
                    <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                        <article tabindex="0"
                                 class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                            <img alt="upload preview"
                                 class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed"/>

                            <section
                                class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                <h1 class="flex-1"></h1>
                                <div class="flex">
                                      <span class="p-1">
                                        <i>
                                          <svg class="fill-current w-4 h-4 ml-auto pt-"
                                               xmlns="http://www.w3.org/2000/svg" width="24"
                                               height="24" viewBox="0 0 24 24">
                                            <path
                                                d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z"/>
                                          </svg>
                                        </i>
                                      </span>

                                    <p class="p-1 size text-xs"></p>
                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24">
                                            <path class="pointer-events-none"
                                                  d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z"/>
                                        </svg>
                                    </button>
                                </div>
                            </section>
                        </article>
                    </li>
                </template>
            </div>
        </div>
    </div>
    <script>
        const fileTempl = document.getElementById("file-template"),
            imageTempl = document.getElementById("image-template"),
            empty = document.getElementById("empty");

        // use to store pre selected files
        let FILES = {};

        // check if file is of type image and prepend the initialied
        // template to the target element
        function addFile(target, file) {
            const isImage = file.type.match("image.*"),
                objectURL = URL.createObjectURL(file);

            const clone = isImage
                ? imageTempl.content.cloneNode(true)
                : fileTempl.content.cloneNode(true);

            clone.querySelector("h1").textContent = file.name;
            clone.querySelector("li").id = objectURL;
            clone.querySelector(".delete").dataset.target = objectURL;
            clone.querySelector(".size").textContent =
                file.size > 1024
                    ? file.size > 1048576
                        ? Math.round(file.size / 1048576) + "mb"
                        : Math.round(file.size / 1024) + "kb"
                    : file.size + "b";

            isImage &&
            Object.assign(clone.querySelector("img"), {
                src: objectURL,
                alt: file.name
            });

            empty.classList.add("hidden");
            target.prepend(clone);

            FILES[objectURL] = file;
        }

        const gallery = document.getElementById("gallery"),
            overlay = document.getElementById("overlay");

        // click the hidden input of type file if the visible button is clicked
        // and capture the selected files
        const hidden = document.getElementById("hidden-input");
        hidden.onchange = (e) => {
            for (const file of e.target.files) {
                addFile(gallery, file);
            }
        };

        // event delegation to caputre delete events
        // fron the waste buckets in the file preview cards
        gallery.onclick = ({target}) => {
            if (target.classList.contains("delete")) {
                const ou = target.dataset.target;
                document.getElementById(ou).remove(ou);
                gallery.children.length === 1 && empty.classList.remove("hidden");
                delete FILES[ou];
            }
        };


    </script>

</x-app-layout>
