@extends('index')
@section('main')
    <div class="main-content">
        {{-- heaer --}}
        <div
            class="header min-h-[10rem] bg-gradient-to-r from-blue-600  to-pink-600 text-white px-15 py-10 flex flex-col justify-center  ">
            <div class="wrapper flex items-center mb-5 font-bold text-[11px] ">
                <div class="flex items-center gap-2 backdrop-blur-md bg-white/20 py-1 px-3 rounded-full ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-trending-up w-5 h-5">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                        <polyline points="16 7 22 7 22 13"></polyline>
                    </svg>
                    <h6>Browse All Categories</h6>
                </div>

            </div>
            <div class="title">
                <h2 class="text-[50px] font-[900] tracking-tight">Shop by Category</h2>
            </div>
            <div class="description my-2">
                <p class="text-[14px] text-gray-200">Explore our curated collection of products across different categories
                </p>
            </div>
        </div>
        <div class="categories-cards flex flex-wrap gap-5  px-15 my-10 w-full">
            @foreach ($categories as $category)
                {{-- category card --}}
                <div style=""
                    class="category-card grow max-w-[400px]  w-[350px] border border-gray-300 h-[100%] rounded-2xl p-4 flex flex-col group relative overflow-hidden transition-all duration-500 hover:shadow-2xl hover:translate-y-[-5px]"
                    onmouseover="this.style.backgroundColor='{{ $category->image_background_color }}'"
                    onmouseout="this.style.backgroundColor=''">
                    {{-- svg --}}
                    <div class=" flex justify-between items-center">
                        <div class="svg p-3 rounded-3xl transition-transform duration-500 group-hover:rotate-[10deg] group-hover:scale-105"
                            style="background: linear-gradient(to right, #2563eb, {{ $category->image_background_color ?? '#6366f1' }})">

                            <div class="text-4xl ">🎧</div>
                        </div>
                        {{-- <input type="color" name="" id=""> --}}
                        <div
                            class="right-arrow rounded-full bg-gray-300 text-gray-500 p-1 font-bold flex items-center justify-center group-hover:bg-blue-600 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-chevron-right w-6 h-6 text-gray-400 group-hover:text-white group-hover:translate-x-1 transition-all duration-300">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </div>
                    </div>
                    {{-- category-title --}}
                    <div class="category-title mt-4 group-hover:text-blue-500 transition-colors duration-300">
                        <h2 class="font-bold text-2xl">{{ $category->name }}</h2>
                    </div>
                    {{-- category description --}}
                    <div class="category-description text-[13px] my-1 text-gray-600">
                        <p>{{ $category->description }}</p>
                    </div>
                    {{-- availability and browse now btn --}}
                    <div class="availability-view-btn flex justify-between items-center my-3">
                        {{-- availability --}}
                        <div class="availability">
                            <p class="text-[11px]">{{ $categories->count() }} Products Available</p>
                        </div>
                        <div class="view-bt">
                            <a href="" class="text-[13px] text-blue-600 font-bold">Browse Now -></a>
                        </div>
                    </div>
                    <div
                        class="round-bg absolute bottom-[-2rem] right-[-2rem] w-[100px] h-[100px] bg-gray-300 group-hover:bg-white  rounded-full opacity-20 z-10 group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div class="absolute top-0 left-0 w-full h-[100%] group-hover:bg-white/80 z-[-2] transition-colors duration-500"></div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

