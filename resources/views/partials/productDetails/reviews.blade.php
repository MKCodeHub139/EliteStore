<div class="customer-reviews p-5">
    <h2 class="text-xl font-bold">Customer Reviews</h2>
    <div class="rating-and-range md:grid grid-cols-7 flex flex-col gap-5 mt-5 text-black my-5">
        <div class="ratings flex flex-col items-center gap-2 ">
            <h1 class="text-4xl font-bold ">{{ round($product->average_rating, 1) }}</h1>
            <div class="stars flex gap-1 items-center">
                @for ($i = 1; $i <= 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="{{ $product->average_rating >= $i ? 'currentColor' : 'none' }}" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-yellow-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.218 3.602a.563.563 0 00-.162.556l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.523 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.385a.562.562 0 00-.162-.556L3.25 9.988a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                @endfor
            </div>
            <div class="reviews">
                <p class="text-gray-500 text-[11px]">{{ $product->reviews->count() }} Reviews</p>
            </div>

        </div>
        <div class="rating-range col-span-6 text-[12px]">
            <div class="5stars flex items-center gap-2">
                <p>5★</p>
                <div class="w-full bg-gray-300 rounded-lg h-[6px] relative">
                    <div class="bg-yellow-400 h-full rounded-lg" style="width: {{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 5)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%"></div>
                </div>
                <p class="text-gray-500 ">{{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 5)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%</p>
            </div>
            <div class="4stars flex items-center gap-2">
                <p>4★</p>
                <div class="w-full bg-gray-300 rounded-lg h-[6px] relative">
                    <div class="bg-yellow-400 h-full rounded-lg" style="width: {{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 4)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%"></div>
                </div>
                <p class="text-gray-500 ">{{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 4)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%</p>
            </div>
            <div class="3stars flex items-center gap-2">
                <p>3★</p>
                <div class="w-full bg-gray-300 rounded-lg h-[6px] relative">
                    <div class="bg-yellow-400 h-full rounded-lg" style="width: {{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 3)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%"></div>
                </div>
                <p class="text-gray-500 ">{{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 3)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%</p>
            </div>
            <div class="2stars flex items-center gap-2">
                <p>2★</p>
                <div class="w-full bg-gray-300 rounded-lg h-[6px] relative">
                   <div class="bg-yellow-400 h-full rounded-lg" style="width: {{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 2)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%"></div>
                </div>
                <p class="text-gray-500 ">{{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 2)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%</p>
            </div>
            <div class="1stars flex items-center gap-2">
                <p>1★</p>
                <div class="w-full bg-gray-300 rounded-lg h-[6px] relative">
                    <div class="bg-yellow-400 h-full rounded-lg" style="width: {{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 1)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%"></div>
                </div>
                <p class="text-gray-500 ">{{ $product->reviews->count() > 0 
    ? round(($product->reviews->where('rating', 1)->count() / $product->reviews->count()) * 100, 1) 
    : 0 }}%</p>
            </div>
        </div>
    </div><hr>

       <div class="my-5 w-full flex justify-end">
                    <button class="bg-blue-500 hover:bg-blue-600 rounded-lg px-3 py-2 text-white text-[12px] font-bold"  onclick="openReviewModal()">+ Give Your Review</button>
                </div>
    
                <div class="all-reviews my-5 flex flex-col gap-10">
        {{-- card --}}
        @if($reviews->count() > 0)
        @foreach ($reviews as $review)
        <div class="review-card bg-blue-50/60 p-5 rounded-2xl">
            <div class="user-details flex justify-between items-center ">
                <div class="user  flex gap-3 items-center">
                    <div class="img bg-blue-400 rounded-full overflow-hidden px-3 py-1 flex justify-center items-center text-white font-bold text-2xl">
                        <h2>{{ strtoupper(substr($review->user->name, 0, 1)) }}</h2>
                    </div>
                    <div class="name-rating">
                        <h3 class="text-[12px] font-bold">{{ $review->user->name }}</h3>
                        <div class="stars flex gap-1 items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $i <= $review->rating ? 'currentColor' : 'none' }}"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-yellow-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.218 3.602a.563.563 0 00-.162.556l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.523 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.385a.562.562 0 00-.162-.556L3.25 9.988a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="date">
                    <p class="text-[11px] text-gray-500">Reviewed on {{ $review->created_at->format('M j, Y') }}</p>
                </div>
            </div>
            <div class="review-content my-3">
                <div class="title font-bold text-[12px]">
                    {{$review->title}}
                </div>
                <div class="description">
                    <p class="text-[11px] text-gray-500">{{ $review->comment }}</p>
                </div>
            </div>
            <div class="actions flex gap-5 text-[11px] text-gray-500">
                <button class="cursor-pointer hover:text-gray-700">Helpful (10)</button>
                <button class="cursor-pointer hover:text-gray-700">Report</button>
            </div>
        </div>
            
        @endforeach
        @else
        <p class="text-gray-500 text-center">No reviews yet. Be the first to review this product!</p>
       @endif
    </div>
</div>
