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
             src="../resources/img/defaultavatar.jpg" width="150px">
        <?php
        } else {
        ?>
        <img class="mx-auto rounded-full border-2 border-indigo-400 mb-4" src="" width="150px">
        <?php
        }
        ?>
        <button class="bg-indigo-400 hover:bg-white hover:text-gray-900 mb-4 text-white font-bold py-2 px-4 rounded"
                type="button" data-modal-toggle="defaultModal">
            Edit profile
        </button>
        <?php
        if (auth()->user()->rol == "admin") {
        ?>
        <button class="bg-orange-400 hover:bg-white hover:text-gray-900 text-gray-900 font-bold py-2 px-4 rounded">
            Admin Panel
        </button>
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
</div>
<!-- Modal Start -->
<div id="defaultModal" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
    <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-white">
                    Edit Profile
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
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
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its
                        citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25
                        and is meant to ensure a common set of data rights in the European Union. It requires
                        organizations to notify users as soon as possible of high-risk data breaches that could
                        personally affect them.
                    </p>
                    <button data-modal-toggle="defaultModal" type="button"
                            class="text-white bg-gray-900 hover:bg-gray-800 hover:text-white focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                        Save
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
