 @if($products->isEmpty())
     <p class="text-center text-gray-500 col-span-3">No products found.</p>
 @endif

 @foreach ($products as $product)
 
     <div
         class="product-card group max-w-[450px] min-w[200px] border border-gray-200 shadow hover:shadow-2xl rounded-2xl overflow-hidden cursor-pointer">
         <div class="img  relative h-[250px] w-[100%] overflow-hidden">
             <a href="/products/{{ $product->slug }}"> <img src="{{ asset($product->main_image) }}" alt=""
                     class="h-[100%] w-full object-cover group-hover:scale-105 transition-transform duration-300"></a>
             {{-- on image --}}
             <div
                 class="left absolute top-0 flex justify-between m-2 flex flex-col gap-1  font-bold text-[11px] text-center">
                 <div class="discount  text-white bg-red-500 px-1 rounded-full">
                     <p>{{ $product->old_price ? number_format((('-'.$product->old_price - $product->price) / $product->old_price) * 100, 0).'%' : '' }}
                     </p>
                 </div>
                 <div class="is_new  text-white bg-green-500 px-1 rounded-full">
                     <p>{{ $product->is_new ? 'New' : '' }}</p>
                 </div>
                 <div class="type text-white bg-purple-500 px-1 rounded-full">
                     <p>{{ $product->is_hot ? 'Hot' : '' }}</p>
                 </div>
             </div>
             <div
                 class="right translate-x-6 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all absolute top-0 right-0 justify-between px-5 flex flex-col gap-1 my-3">
                 <div class="wishlist bg-white rounded-full p-1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round"
                         class="lucide lucide-heart w-4 h-4 hover:stroke-red-500 transition-colors">
                         <path
                             d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                         </path>
                     </svg>
                 </div>
                 <div class="view bg-white rounded-full p-1 ">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round"
                         class="lucide lucide-eye w-4 h-4 hover:stroke-blue-500 transition-colors">
                         <path
                             d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0">
                         </path>
                         <circle cx="12" cy="12" r="3"></circle>
                     </svg>
                 </div>
             </div>
         </div>
         <div class="details p-2">
             {{-- category and rating --}}
             <div class="flex justify-between text-[9px]">
                 <div class="category">
                     <p class="text-blue-500 font-[500]">{{ $product->category->name ?? 'Category' }}</p>
                 </div>
                 <div class="ratings flex gap-1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="lucide lucide-star w-3 h-3 fill-yellow-400 text-yellow-400">
                         <path
                             d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                         </path>
                     </svg>
                     <p class="font-bold">{{ $product->average_rating ? number_format($product->average_rating,1) : 'N/A' }}</p> <span
                         class="text-gray-400">({{ $product->total_reviews ?? '0' }})</span>
                 </div>
             </div>
             {{-- title --}}
             <div class="title my-2">
                 <h2 class="text-[12px] font-[700] hover:text-blue-500">{{ $product->name }}</h2>
             </div>
             {{-- descrition --}}
             <div class="description mt-7">
                 <p class="text-[10px] text-gray-700">{{ $product->short_description ?? '' }}</p>
             </div>
             {{-- pricing and cart --}}
             <div class="price-and-cart flex justify-between items-center my-2">
                 <div class="price">
                     <div class="current-price flex gap-1">
                         <h2 class="text-[18px] font-bold">${{ round($product->price, 2) }}</h2> <del
                             class="text-[10px] text-gray-400 mt-2">{{ $product->old_price ? '$' . $product->old_price : '' }}</del>
                     </div>
                     <div class="save">
                         <p class="text-[9px] text-green-500 font-[500]">
                             {{ $product->discount_price && $product->old_price ? 'Save $' . ($product->old_price - $product->discount_price) : '' }}
                         </p>
                     </div>
                 </div>
                 <div class="cart-btn bg-blue-500 p-2 rounded-xl hover:bg-blue-600 hover:p-3 transition-all"
                     data-id="{{ $product->id }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="lucide lucide-shopping-cart w-4 h-4 stroke-white">
                         <circle cx="8" cy="21" r="1"></circle>
                         <circle cx="19" cy="21" r="1"></circle>
                         <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                         </path>
                     </svg>
                 </div>
             </div>
         </div>
     </div>
 @endforeach
