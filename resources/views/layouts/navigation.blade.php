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
             s src="{{ asset('../resources/img/defaultavatar.jpg')}}" width="150px">
        <?php
        } else {
        ?>
        <img class="mx-auto rounded-full border-2 border-indigo-400 mb-4" src="" width="150px">
        <?php
        }
        ?>
        <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                class="text-white hover:bg-gray-800 font-medium rounded-lg text-sm px-4 mb-4 py-2.5 text-center inline-flex items-center"
                type="button">{{auth()->user()->username}}
            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <br>

        <!-- Dropdown menu -->
        <div id="dropdownDivider"
             class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
            <div class="py-1">
                <a href="{{route('profile')}}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Edit
                    Profile</a>
            </div>
            <div class="py-1">
                <a href="{{route('logout')}}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>

        <?php
        if (auth()->user()->rol == "admin") {
        ?>
        <a href="{{route('admin')}}">
            <button
                class="bg-orange-400 hover:bg-white transition duration-200 hover:text-gray-900 text-gray-900 font-bold py-2 px-4 rounded">
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
            Shared Archives
        </a>
        <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-400 hover:text-white">
            Pricing
        </a>
    </nav>
    <div class="text-indigo-400 text-center p-4" style="background-color: rgba(0, 0, 0, 0.3);">
        © 2022 Copyright: xDrive , made by
        <a class="text-gray-200" href="https://franciscofl.dev/">franciscofl12</a>
    </div>
</div>
