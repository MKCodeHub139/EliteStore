 <div class="small-nav w-full h-[1.5rem] bg-black text-white text-[14px] px-5 sticky top-0 z-50">
    @if(auth()->guard('web')->user())
    <a href="" class="float-end">Logout</a>
    <span class="">Welcome, {{ auth()->guard('web')->user()->name }}</span>
    @else
    <a href="/login" class="float-end">Login</a>
    @endif
   

 </div>
 <div class="nav w-full h-[7rem] md:px-15 sticky top-[1.5rem] bg-white z-50 px-2">
        <nav class="md:grid grid-cols-4 h-[4rem] flex justify-between items-center">
            <div class="logo flex items-center gap-1 col-span-1">
                <div class="ham flex flex-col gap-1 cursor-pointer md:hidden mx-2">
                    <div class="w-[24px] h-[2px] bg-black"></div>
                    <div class="w-[24px] h-[2px] bg-black"></div>
                    <div class="w-[24px] h-[2px] bg-black"></div>
                </div>
                <div
                    class="bg-gradient-to-br from-blue-600 to-purple-600 text-white text- xl px-3 py-1 text-center rounded font-bold">
                    <h2>E</h2>
                </div>
                <h2
                    class="bg-gradient-to-br from-blue-600 to-purple-600 bg-clip-text text-transparent text-xl font-bold">
                    EliteStore</h2>
            </div>
            <div
                class="hidden md:flex search border w-full mx-auto rounded-full py-2 border-gray-300 col-span-2 flex px-2 items-center focus-within:border-blue-500 transition-colors duration-200 focus-within:border-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-search absolute  w-4 h-4 text-gray-400">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                <input type="text" name="" id="" class="searchbar w-full outline-0 px-7 text-[13px]"
                    placeholder="Serch for products..." value="{{ request('query') }}">
            </div>
            <div class="actions col-span-1">
                <ul class="flex items-center justify-end gap-7 ">
                   
                    <li class="flex md:hidden"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-search  w-4 h-4">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg></li>
                    <li class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-heart w-4 h-4">
                            <path
                                d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                            </path>
                        </svg></li>
                    <li class="hidden md:flex"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user w-4 h-4">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg></li>
                    <li class="relative">
                        <a href="/cart" class="cart-svg"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart w-4 h-4 {{request()->routeIs('cart')?'text-blue-700':''}}">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>
                        </a>
                        <span class="cart-count absolute top-[-10px] right-[-10px] bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">{{ auth()->guard('web')->user() ? auth()->guard('web')->user()->carts->sum('quantity') : 0 }}</span>
                    </li>
                </ul>
            </div>
        </nav>
        <hr>
        <div class="w-full md:flex hidden py-3 text-gray-600 border-b ">
            <ul class="flex gap-5 text-[13px]">
                <li class="hover:text-blue-600 font-[500] {{request()->routeIs('home')? 'text-blue-600':''}}"><a href="/">Home</a></li>
                <li class="hover:text-blue-600 font-[500] {{request()->routeIs('products')? 'text-blue-600':''}}"><a href="/products">Products</a></li>
                <li class="hover:text-blue-600 font-[500] {{request()->routeIs('categories')? 'text-blue-600':''}}"><a href="/categories">Categories</a></li>
                <li class="hover:text-blue-600 font-[500]"><a href="">Deals</a></li>
                <li class="hover:text-blue-600 font-[500]"><a href="">About</a></li>
                <li class="hover:text-blue-600 font-[500]"><a href="">Contact</a></li>
            </ul>
        </div>
    </div>
<div class="ham-list fixed hidden top-[6rem] z-[111] bg-white/95 w-full p-10 rounded-2xl shadow-xl">
    <ul class="flex flex-col gap-5 text-[13px]">
                <li class="hover:text-blue-600 font-[500] {{request()->routeIs('home')? 'bg-gradient-to-r from-blue-500 to-purple-500 text-white px-2 py-1 rounded-2xl':''}}"><a href="/">Home</a></li>
                <li class="hover:text-blue-600 font-[500]  {{request()->routeIs('products')? 'bg-gradient-to-r from-blue-500 to-purple-500 text-white px-2 py-1 rounded-2xl':''}}"><a href="/products">Products</a></li>
                <li class="hover:text-blue-600 font-[500] {{request()->routeIs('categories')? 'bg-gradient-to-r from-blue-500 to-purple-500 text-white px-2 py-1 rounded-2xl':''}}"><a href="/categories">Categories</a></li>
                <li class="hover:text-blue-600 font-[500]"><a href="">Deals</a></li>
                <li class="hover:text-blue-600 font-[500]"><a href="">About</a></li>
                <li class="hover:text-blue-600 font-[500]"><a href="">Contact</a></li>
            </ul>
</div>