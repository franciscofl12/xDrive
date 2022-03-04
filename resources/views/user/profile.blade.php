<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="h-full bg-white shadow-md shadow-lg">

        <div class="border-b-2 block md:flex">

            <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white">
                <div class="flex justify-between">
                    <h1 class="font-semibold block">{{$user->username}}'s Profile</h1>
                </div>

                <span class="text-base text-gray-900 mb-4">All information changed here will be irreversible </span>

                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-1">
                        <p for="name" class="font-semibold text-gray-900 block pb-1">Current Avatar</p>
                        @if($user->avatar == null)
                            <img class="h-20 w-20 rounded-full border-2 border-indigo-400"
                                 src="{{ asset('../resources/img/defaultavatar.jpg')}}" width="150px">
                        @else
                            <img class="h-20 w-20 rounded-full border-2 border-indigo-400"
                                 src="{{asset('storage/profilepictures/' . auth()->user()->avatar)}}" width="150px">
                        @endif
                    </div>
                </div>
                <div class="w-full p-8 mx-2 flex">
                    <div class="pb-6">
                        <span class="font-semibold text-gray-900 block">Password change</span>
                        <span class="text-base text-gray-900 py-4 mb-6">An email will be send to your account with the steps to follow.</span>
                        <a href="{{ route('password.request') }}">
                            <button
                                class="bg-gray-900 hover:bg-gray-400 text-white font-semibold py-2 px-4 border hover:border-indigo-400 rounded shadow">
                                Send request for password update
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4">
                <div class="rounded  shadow p-6">
                    <form action="{{route('user.update',\Illuminate\Support\Facades\Auth::user()->id)}}"
                          enctype="multipart/form-data" method="POST">
                        @csrf
                        <span
                            class="text-gray-600 pt-4 mb-4 block opacity-70">Personal login information of {{$user->username}} profile</span>
                        <div class="pb-6">
                            <label for="firstname" class="font-semibold text-gray-900 block pb-1">First Name</label>
                            <div class="flex">
                                <input id="firstname" name="firstname"
                                       class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full"
                                       type="text"
                                       value="{{$user->firstname}}" required/>
                            </div>
                        </div>
                        <div class="pb-6">
                            <label for="lastname" class="font-semibold text-gray-900 block pb-1">Last Name</label>
                            <div class="flex">
                                <input id="lastname" name="lastname"
                                       class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="text"
                                       value="{{$user->lastname}}" required/>
                            </div>
                        </div>
                        <div class="pb-6">
                            <label for="username" class="font-semibold text-gray-900 block pb-1">Username</label>
                            <div class="flex">
                                <input id="username" name="username" disabled
                                       class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="text"
                                       value="{{$user->username}}"/>
                            </div>
                        </div>
                        <div class="pb-4">
                            <label for="email" class="font-semibold text-gray-900 block pb-1">Email</label>
                            <input id="email" disabled name="email"
                                   class="border-1 bg-gray-100 rounded-r px-4 py-2 w-full" type="email"
                                   value="{{$user->email}}"/>
                        </div>
                        <div id="overlay" class="m-4">
                            <label class="inline-block mb-2 text-gray-500">Avatar Upload</label>
                            <div class="flex items-center justify-center w-full">
                                <label
                                    class="flex flex-col w-full h-40 border-4 border-gray-900 border-dashed hover:bg-gray-100 hover:border-indigo-400">
                                    <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                        <li id="empty"
                                            class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                            <img class="w-28 py-2"
                                                 src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                                 alt="no data"/>
                                            <span class="text-small text-gray-500">No photo selected</span>
                                        </li>
                                    </ul>
                                    <input name="file" type="file" multiple id="hidden-input" class="opacity-0"/>
                                </label>

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
    </div>
    </div>
    </div>

</x-app-layout>

