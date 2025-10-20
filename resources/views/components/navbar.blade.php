<nav class="bg-white border-gray-200 border-b sticky top-0 w-full z-50 shadow-md">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        
        {{-- Logo dan Nama --}}
        <span class="flex items-center justify-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/main_logo.png') }}" class="h-8" alt="Main Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900">HANDAL</span>
        </span>

        {{-- Tombol Toggle Menu (Mobile) --}}
        <button data-collapse-toggle="navbar-default" type="button" 
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" 
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        {{-- Menu Navbar --}}
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            
            @php
                $activeClass = 'text-blue-700 font-bold';
                $defaultClass = 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700';
            @endphp

            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 
                       md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">

                {{-- Home --}}
                <li>
                    <a href="{{ route('home') }}" 
                       class="block py-2 px-3 rounded-sm md:border-0 md:p-0 
                       {{ request()->routeIs('home') ? $activeClass : $defaultClass }}">
                        Home
                    </a>
                </li>

                {{-- About --}}
                <li>
                    <a href="{{ route('about') }}" 
                       class="block py-2 px-3 rounded-sm md:border-0 md:p-0 
                       {{ request()->routeIs('about') ? $activeClass : $defaultClass }}">
                        About
                    </a>
                </li>

                {{-- Daftar (Only Admin/School) --}}
                @auth
                    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'school')
                        <li>
                            <a href="{{ route('daftar') }}" 
                               class="block py-2 px-3 rounded-sm md:border-0 md:p-0 
                               {{ request()->routeIs('daftar') ? $activeClass : $defaultClass }}">
                                Daftar
                            </a>
                        </li>
                    @endif
                @endauth

                {{-- Informasi Publik --}}
                <li>
                    <a href="{{ route('data') }}" 
                       class="block py-2 px-3 rounded-sm md:border-0 md:p-0 
                       {{ request()->routeIs('data') ? $activeClass : $defaultClass }}">
                        Informasi Publik
                    </a>
                </li>

                {{-- Login / Logout --}}
                @guest  
                    <li>
                        <a href="{{ route('login') }}" 
                           class="block py-2 px-3 rounded-sm md:border-0 md:p-0 
                           {{ request()->routeIs('login') ? $activeClass : $defaultClass }}">
                            Login
                        </a>
                    </li>
                @else
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block py-2 px-3 text-left w-full rounded-sm md:border-0 md:p-0 
                                       {{ request()->routeIs('logout') ? $activeClass : $defaultClass }}">
                                Logout
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
