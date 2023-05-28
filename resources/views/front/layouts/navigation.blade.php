
<nav id="header" class="w-full z-30 top-0 py-1 bg-gray-800">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    <li>
                        <a href="{{ route('front.home') }}" class="inline-block no-underline hover:text-blue-400 hover:underline py-2 px-4 @if( request()->route()->getName() === 'front.home') text-blue-700 @else text-white @endif">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('front.about') }}" class="inline-block no-underline hover:text-blue-400 hover:underline py-2 px-4 @if( request()->route()->getName() === 'front.about') text-blue-700 @else text-white @endif">About</a>
                    </li>
                    <li>
                        <a href="{{ route('front.contact') }}" class="inline-block no-underline hover:text-blue-400 hover:underline py-2 px-4 @if( request()->route()->getName() === 'front.contact') text-blue-700 @else text-white @endif">Contact</a>
                    </li>
                    <li>
                        <a href="{{ route('front.shop') }}" class="inline-block no-underline hover:text-blue-400 hover:underline py-2 px-4 @if( request()->route()->getName() === 'front.shop') text-blue-700 @else text-white @endif">Shop</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="order-1 md:order-2">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-white text-xl " href="{{ route('front.home') }}">
                <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                </svg>
                Miam miam !
            </a>
        </div>

        <div class="order-2 md:order-3 flex items-center" id="nav-content">

            <a class="inline-block no-underline hover:text-blue-400 @if( request()->route()->getName() === 'front.profile.index') text-blue-700 @else text-white @endif" href="{{ route('front.profile.index') }}">
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <circle fill="none" cx="12" cy="7" r="3" />
                    <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                </svg>
            </a>

            <a href="{{ route('front.cart.list') }}" class="pl-3 inline-block no-underline flex items-center  hover:text-blue-400">
                <svg class="w-5 h-5 @if( request()->route()->getName() === 'front.cart.list') text-blue-700 @else text-white @endif" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-red-700">{{ Cart::getTotalQuantity()}}</span>
            </a>
        </div>
    </div>
</nav>
