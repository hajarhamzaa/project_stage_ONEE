<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-blue-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-line="round"></path>
            </svg>
        </button>

        <div class="relative mx-4 lg:mx-0">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
             <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.1 1.9-.7-.7m5.6 5.6-.7-.7m-4.2 0-.7.7m5.6-5.6-.7.7M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
            <p><b>
                    @foreach(auth()->user()->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </b></p>
            </span>


        </div>
    </div>

    <div class="flex items-center">
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = ! dropdownOpen"
                class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                <img class="h-full w-full object-cover"
                    src="/images/{{ auth()->user()->profile }}"
                    alt="Your avatar">
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                style="display: none;"></div>

            <div x-show="dropdownOpen"
                class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                style="display: none;">
                <a href="{{ route('admin.profile') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-600 hover:text-white">Profile</a>

                <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-600 hover:text-white">Deconnecter</a>
                </form>
            </div>
        </div>
    </div>
</header>
