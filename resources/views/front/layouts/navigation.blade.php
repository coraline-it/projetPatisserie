<nav class="border-gray-200 bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('front.home') }}" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Miam miam !</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('front.home') }}" class="block py-2 pl-3 pr-4 rounded md:border-0 hover:text-blue-700 md:p-0 @if( request()->route()->getName() === 'front.home') text-blue-700 @else text-white @endif">Home</a>
                </li>
                <li>
                    <a href="{{ route('front.about') }}" class="block py-2 pl-3 pr-4 rounded md:border-0 hover:text-blue-700 md:p-0 @if( request()->route()->getName() === 'front.about') text-blue-700 @else text-white @endif">About</a>
                </li>
                <li>
                    <a href="{{ route('front.contact') }}" class="block py-2 pl-3 pr-4 rounded md:border-0 hover:text-blue-700 md:p-0 @if( request()->route()->getName() === 'front.contact') text-blue-700 @else text-white @endif">Contact</a>
                </li>
                <li>
                    <a href="{{ route('front.shop') }}" class="block py-2 pl-3 pr-4 rounded md:border-0 hover:text-blue-700 md:p-0 @if( request()->route()->getName() === 'front.shop') text-blue-700 @else text-white @endif">Shop</a>
                </li>
                <li>
                    <a href="{{ route('front.cart.list') }}" class="flex items-center">
                        <svg class="w-5 h-5 @if( request()->route()->getName() === 'front.cart.list') text-blue-700 @else text-white @endif" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="text-red-700">{{ Cart::getTotalQuantity()}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
