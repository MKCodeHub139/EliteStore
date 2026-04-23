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

                            <div class="text-4xl "><img src="{{asset($category->image)}}" alt="" class="w-[50px] h-[50px]"></div>
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
                            <p class="text-[11px]">{{ $category->products->count() }} Products Available</p>
                        </div>
                        <div class="btns flex gap-2 text-blue-600 text-[13px] z-[11111]">
                            {{-- <button class="underline cursor-pointer">view</button> --}}
                            <button class="underline cursor-pointer edit-category">edit</button>
                            <button class="underline cursor-pointer">delete</button>
                        </div>
                    </div>
                    <div
                        class="round-bg absolute bottom-[-2rem] right-[-2rem] w-[100px] h-[100px] bg-gray-300 group-hover:bg-white  rounded-full opacity-20 z-10 group-hover:scale-150 transition-transform duration-500">
                    </div>
                                        <div class="absolute top-0 left-0 w-full h-[100%] group-hover:bg-white/80 z-[-2] transition-colors duration-500"></div>

                </div>
            @endforeach