
<!-- mobile menu bar -->
<div class="bg-gray-900 text-indigo-400 flex justify-between md:hidden">
    <!-- logo -->
    <a href="#" class="block p-4 text-white font-bold">xDrive</a>

    <!-- mobile menu button -->
    <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</div>

<!-- sidebar -->
<div class="sidebar bg-gray-900 text-indigo-400 w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">

    <!-- logo -->
    <a href="{{route('dashboard')}}" class="text-white flex items-center space-x-2 px-4">
        <span class="text-2xl font-extrabold mb-4">xDrive</span>
    </a>

    <div class="content-center items-center text-center justify-center justify-items-center">
        <img class="mx-auto rounded-full mb-4" src="https://marlaw.se/wp-content/uploads/2016/03/profile-img.jpg" width="150px">
        <button class="bg-indigo-400 hover:bg-white hover:text-gray-900 text-white font-bold py-2 px-4 rounded">
            Edit profile
        </button>
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
</div>
