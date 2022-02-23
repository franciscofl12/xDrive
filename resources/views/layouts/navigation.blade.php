<!-- mobile menu bar -->
<div class="bg-gray-900 text-indigo-400 flex justify-between md:hidden">
    <!-- logo -->
    <a href="#" class="block p-4 text-white font-bold">xDrive</a>

    <!-- mobile menu button -->
    <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</div>

<!-- sidebar -->
<div
    class="sidebar bg-gray-900 text-indigo-400 w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">

    <!-- logo -->
    <a href="{{route('dashboard')}}" class="text-white flex items-center space-x-2 px-4">
        <span class="text-2xl font-extrabold mb-4">xDrive</span>
    </a>

    <div class="content-center items-center text-center justify-center justify-items-center">
        <?php
        if(auth()->user()->avatar == null) {
        ?>
        <img class="mx-auto rounded-full border-2 border-indigo-400 mb-4"
        s     src="../resources/img/defaultavatar.jpg" width="150px">
        <?php
        } else {
        ?>
        <img class="mx-auto rounded-full border-2 border-indigo-400 mb-4" src="" width="150px">
        <?php
        }
        ?>
        <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white hover:bg-gray-800 font-medium rounded-lg text-sm px-4 mb-4 py-2.5 text-center inline-flex items-center" type="button">{{auth()->user()->username}} <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button><br>

        <!-- Dropdown menu -->
        <div id="dropdownDivider" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
            <div class="py-1">
                <a href="{{route('logout')}}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>

        <button class="bg-indigo-400 hover:bg-white hover:text-gray-900 transition duration-200 mb-4 text-white font-bold py-2 px-4 rounded"
                type="button" data-modal-toggle="defaultModal">
            Edit profile
        </button>
        <?php
        if (auth()->user()->rol == "admin") {
        ?>
        <a href="{{route('admin')}}">
            <button class="bg-orange-400 hover:bg-white transition duration-200 hover:text-gray-900 text-gray-900 font-bold py-2 px-4 rounded">
                Admin Panel
            </button>
        </a>
        <?php
        }
        ?>
    </div>

    <!-- nav -->
    <nav>
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-400 hover:text-white">
            Home
        </a>
        <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-400 hover:text-white">
            About
        </a>
        <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-400 hover:text-white">
            Features
        </a>
        <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-400 hover:text-white">
            Pricing
        </a>
    </nav>
    <div class="flex w-full items-center justify-center bg-grey-lighter">
        <label
            class="w-64 flex flex-col border-indigo-400  items-center px-4 py-6 bg-white text-indigo-400 transition duration-700 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-indigo-400 hover:text-white">
            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
            </svg>
            <span class="mt-2 text-base leading-normal">Upload a File</span>
            <input type='file' class="hidden"/>
        </label>
    </div>
</div>
<!-- Modal Start -->
<div id="defaultModal" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
    <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-5 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl">
                    Edit Profile
                </h3>
                <button type="button"
                        class="text-gray-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="defaultModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" action="#">
                    <p class="text-base leading-relaxed text-gray-500 ">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its
                        citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25
                        and is meant to ensure a common set of data rights in the European Union. It requires
                        organizations to notify users as soon as possible of high-risk data breaches that could
                        personally affect them.
                    </p>
                    <button data-modal-toggle="defaultModal" type="button"
                            class="text-white bg-gray-900 hover:bg-gray-800 hover:text-white focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">
                        Save
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
