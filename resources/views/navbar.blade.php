<nav id="header" class="fixed w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
            <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="/">
                OPAL HOME
            </a>
        </div>
        <div class="block lg:hidden pr-4">
            <button id="nav-toggle" class="flex items-center p-1 text-orange-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a href="{{ route('magasin') }}" class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#">Magasin</a>
                </li>
              
            @auth
            
                
                <a href="{{ route('profile.show') }}"  id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Mon compte
                    </a>
                @else
                
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="{{ route('login') }}">Login</a>
                    </li>
               
                @if (Route::has('register'))
                <a href="{{ route('register') }}" id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Register
                </a>
                @endif
            
            @endif

            <li class="mr-3 ml-2 mt-1">
                <a href="{{ route('panier.index') }}" class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#"><svg class="w-6 h-6" fill="none" stroke="rgb(31 41 55)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></a>
            </li>

        </ul>
        </div>

    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>