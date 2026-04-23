 @extends('index')
 @section('main')
     @if (session('success'))
         <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
             <strong class="font-bold">Success!</strong>
             <span class="block sm:inline">{{ session('success') }}</span>
         </div>
     @endif
     <div class="wrapper w-full">
         <div
             class="crousel md:max-w-[85vw] md:w-[75vw] w-[95vw] md:h-[22rem] min-h-[17rem] bg-white border border-gray-300 mx-auto md:my-5 rounded-2xl overflow-hidden relative shadow-xl overflow-x-auto scroll-smooth ">
             <div class="carousel w-full">
                 <div id="item1"
                     class="carousel-item w-full h-[100%]  py-5 relative bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white overflow-hidden">
                     <div class="md:grid grid-cols-2 md:px-10 md:py-5 p-2 w-full">
                         <div class="text flex flex-col md:gap-5 gap-2">
                             <div
                                 class="product-status px-3 py-1 bg-white/30 backdrop-blur-md self-start border border-white rounded-full">
                                 <h6 class="text-[10px] font-bold">MEGA SALE</h6>
                             </div>
                             <div class="title">
                                 <h2 class="md:text-[50px] text-[40px] font-extrabold leading-16">Mega Electronics Sale</h2>
                             </div>
                             <div class="description">
                                 <p class="text-[17px] font-bold text-gray-200">Up to 50% OFF on Premium Headphones</p>
                             </div>
                             <div class="btns flex items-center gap-3  text-[12px] font-bold h-[3rem] ">
                                 <button
                                     class="bg-white text-black rounded-xl py-2 px-5 cursor-pointer hover:scale-105 hover:shadow-lg shadow-white/20 transition-transform ">Shop
                                     now -></button>
                                 <button
                                     class="border border-white rounded-xl py-2 px-5 cursor-pointer hover:scale-105 hover:bg-white/20 transition-transform ">Explore
                                     Deals</button>
                             </div>
                         </div>
                         <div class="img md:flex hidden items-center justify-center">
                             <div
                                 class="img-div  border border-white bg-white/20 h-[250px] w-[300px] rounded-3xl p-5 hover:scale-105 transition-transform duration-500 relative">
                                 <img src="{{ asset($dealOfTheDay->main_image) }}" alt=""
                                     class="w-full h-[100%] object-cover rounded-2xl border border-white">
                                 <div
                                     class="hot-badge absolute top-[-10px] right-0 rotate-[5deg] bg-amber-400 font-bold text-[15px] text-black px-5 py-1 rounded-xl ">
                                     <h5>Hot</h5>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- <img src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp" class="w-full" /> --}}
                 </div>
                 <div id="item2"
                     class="carousel-item w-full h-max py-5 relative bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 text-white overflow-hidden">
                     <div class="md:grid grid-cols-2 md:px-10 md:py-5 p-2 w-full">
                         <div class="text flex flex-col md:gap-5 gap-2">
                             <div
                                 class="product-status px-3 py-1 bg-white/30 backdrop-blur-md self-start border border-white rounded-full">
                                 <h6 class="text-[10px] font-bold">NEW</h6>
                             </div>
                             <div class="title">
                                 <h2 class="md:text-[50px] text-[40px] font-extrabold leading-16">New Arrivals</h2>
                             </div>
                             <div class="description">
                                 <p class="text-[17px] font-bold text-gray-200">Latest Tech Gadgets Just Landed</p>
                             </div>
                             <div class="btns flex items-center gap-3  text-[12px] font-bold h-[3rem] ">
                                 <button
                                     class="bg-white text-black rounded-xl py-2 px-5 cursor-pointer hover:scale-105 hover:shadow-lg shadow-white/20 transition-transform ">Shop
                                     now -></button>
                                 <button
                                     class="border border-white rounded-xl py-2 px-5 cursor-pointer hover:scale-105 hover:bg-white/20 transition-transform ">Explore
                                     Deals</button>
                             </div>
                         </div>
                         <div class="img md:flex hidden items-center justify-center ">
                             <div
                                 class="img-div  border border-white bg-white/20 h-[250px] w-[300px] rounded-3xl p-5 hover:scale-105 transition-transform duration-500 relative">
                                 <img src="{{ asset($products->where('is_new', true)->first()->main_image ??'')  }}" alt=""
                                     class="w-full h-[100%] object-cover rounded-2xl border border-white">
                                 <div
                                     class="hot-badge absolute top-[-10px] right-0 rotate-[5deg] bg-amber-400 font-bold text-[15px] text-black px-5 py-1 rounded-xl ">
                                     <h5>Hot</h5>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- <img src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp" class="w-full" /> --}}
                 </div>
                 <div id="item3"
                     class="carousel-item w-full h-max py-5 relative bg-gradient-to-r from-rose-600 via-orange-600 to-amber-600 text-white overflow-hidden">
                     <div class="md:grid grid-cols-2 md:px-10 md:py-5 p-2 w-full">
                         <div class="text flex flex-col md:gap-5 gap-2">
                             <div
                                 class="product-status px-3 py-1 bg-white/30 backdrop-blur-md self-start border border-white rounded-full">
                                 <h6 class="text-[10px] font-bold">Trending</h6>
                             </div>
                             <div class="title">
                                 <h2 class="md:text-[50px] text-[40px] font-extrabold leading-16">Best Sellers</h2>
                             </div>
                             <div class="description">
                                 <p class="text-[17px] font-bold text-gray-200">Most Loved Products by Customers</p>
                             </div>
                             <div class="btns flex items-center gap-3  text-[12px] font-bold h-[3rem] ">
                                 <button
                                     class="bg-white text-black rounded-xl py-2 px-5 cursor-pointer hover:scale-105 hover:shadow-lg shadow-white/20 transition-transform ">Shop
                                     now -></button>
                                 <button
                                     class="border border-white rounded-xl py-2 px-5 cursor-pointer hover:scale-105 hover:bg-white/20 transition-transform ">Explore
                                     Deals</button>
                             </div>
                         </div>
                         <div class="img md:flex hidden items-center justify-center">
                             <div
                                 class="img-div  border border-white bg-white/20 h-[250px] w-[300px] rounded-3xl p-5 hover:scale-105 transition-transform duration-500 relative">
                                 <img src="{{ asset($topSeller->first()->products->main_image) }}" alt=""
                                     class="w-full h-[100%] object-cover rounded-2xl border border-white">
                                 <div
                                     class="hot-badge absolute top-[-10px] right-0 rotate-[5deg] bg-amber-400 font-bold text-[15px] text-black px-5 py-1 rounded-xl ">
                                     <h5>Hot</h5>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- <img src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp" class="w-full" /> --}}
                 </div>

             </div>
             <div class="absolute md:left-[45%] left-[40%] md:right-[45%] right-[40%] bottom-[15px] px-3 rounded-full flex justify-center gap-1 py-1 bg-gray-400"
                 id="carousel-btns">
                 <a href="#item1" class="dot h-[9px] w-[9px] bg-gray-300 rounded-full transition-all"></a>
                 <a href="#item2" class="dot h-[9px] w-[9px] bg-gray-300 rounded-full transition-all"></a>
                 <a href="#item3" class="dot h-[9px] w-[9px] bg-gray-300 rounded-full transition-all"></a>
             </div>
         </div>
         <hr>
         {{-- category --}}
         <div class="category md:px-15 px-2 py-5">
             <div class="header flex justify-between items-center">
                 <div class="title">
                     <h2 class="text-2xl font-bold">Shop by Category</h2>
                     <p class="text-[12px] text-gray-600">Explore our wide range of products</p>
                 </div>
                 <div class="add-product-btn product-modal-btn">
                     <button class="text-blue-700 text-[13px] font-bold">See All ></button>
                 </div>

             </div>
             <div class="cartegory-cards py-5 flex flex-wrap justify-center gap-5">
                 @foreach ($categories as $category)
                     <div
                         class="category-card  relative w-[200px] h-[150px] border border-gray-300 rounded-xl hover:bg-blue-50 flex justify-center items-center flex-col hover:shadow-xl hover:scale-105 group transition-all duration-300"
                         onmouseover="this.style.backgroundColor='{{$category->image_background_color}}'"
                         onmouseout="this.style.backgroundColor=''">
                         <div class="img bg-gradient-to-r from-blue-500  overflow-hidden rounded-2xl group-hover:rotate-[10deg] transition-all duration-300"  style="background: linear-gradient(to right, #2563eb, {{ $category->image_background_color ?? '#6366f1' }})">
                             <img src="{{ asset('uploads/categories/1775458286_jpg') }}" alt=""
                                 class="w-[60px] h-[60px] object-cover mb-2 ">
                         </div>

                         <p class="group-hover:text-blue-500 font-bold text-[12px]">{{$category->name}}</p>
                         <p class="text-gray-500 text-[11px]">{{$category->products->count()}} Products</p>
                         <div class="absolute top-0 left-0 w-full h-[100%] group-hover:bg-white/80 z-[-1] transition-colors duration-300"></div>
                     </div>
                 @endforeach
             </div>
         </div>
         <hr>
         {{-- Deal of the Day --}}
         <div class="deal-of-day nd:p-15 p-5 bg-orange-100 min-h-[80vh]">
            
             <div class="deal-of-day-card rounded-2xl overflow-hidden">
                 <div
                     class="header h-[5rem] bg-gradient-to-r from-orange-600 via-orange-600 to-pink-600 px-10 flex items-center justify-between">
                     <div class="text flex gap-2 ">
                         <div
                             class="svg bg-white/20 flex items-center justify-center rounded-xl px-2 text-white animate-bounce">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-zap w-8 h-8 fill-current"
                                 data-fg-dag75="1.21:10.52042:/src/app/pages/Home.tsx:200:21:10264:40:e:Zap::::::Cp7"
                                 data-fgid-dag75=":r53:">
                                 <path
                                     d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                                 </path>
                             </svg>
                         </div>
                         <div class="title">
                             <h2 class="text-white font-bold text-2xl ">⚡ Deal of the Day</h2>
                             <p class="text-white text-[11px] text-gray-300">Limited stock - Grab it before it's gone!</p>
                         </div>
                     </div>
                     <div class="countdown">

                     </div>
                 </div>
                 <div
                     class="body h-max bg-gradient-to-r from-orange-500 via-orange-500 via-orange-400 to-pink-400   md:grid grid-cols-2  flex flex-col p-10 gap-5 items-center relative">
                     <div class="img w-[100%] bg-white rounded-2xl  flex items-center justify-end p-7 relative z-[11]">
                         <img src="{{ asset($dealOfTheDay->main_image) }}" alt=""
                             class="w-[100%]  h-[50vh] rounded-2xl object-cover border border-gray-300 shadow-lg hover:scale-105 transition-transform duration-300">
                         <div
                             class="hot-badge absolute top-[-10px] right-0 rotate-[5deg] bg-gradient-to-r from-orange-500 to-pink-500 font-bold text-[13px] text-black px-3 py-1 rounded-xl text-white ">
                             <h5>13% OFF</h5>
                         </div>
                     </div>
                     <div class="text flex flex-col w-full items-start gap-3 z-[11]">
                         <div class="offer-expiry flex items-center bg-red-100 w-max px-3 py-1 rounded-full">
                             <div class="w-[10px] h-[10px] bg-red-500 rounded-full mr-2 animate-pulse"></div>
                             <p class="text-red-700 text-[11px] font-bold">Limited Time Offer</p>
                         </div>
                         <div class="title">
                             <h2 class="text-3xl font-bold">{{ $dealOfTheDay->name }}</h2>
                         </div>
                         <div class="desc">
                             <p class="text-gray-500 text-[14px] font-bold">{{ $dealOfTheDay->description }}</p>
                         </div>
                         <div class="ratings flex items-center w-max gap-1 bg-white px-5 py-2 rounded-2xl ">
                             <div class="stars flex gap-1 items-center">

                                 @for ($i = 1; $i <= 5; $i++)
                                     <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="{{ $dealOfTheDay->average_rating >= $i ? 'currentColor' : 'none' }}"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         class="w-5 h-5 text-yellow-500">
                                         <path stroke-linecap="round" stroke-linejoin="round"
                                             d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.218 3.602a.563.563 0 00-.162.556l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.523 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.385a.562.562 0 00-.162-.556L3.25 9.988a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                     </svg>
                                 @endfor
                                 <p class=" font-bold mx-2 text-[13px]">{{ $dealOfTheDay->average_rating }}</p> | <p
                                     class="text-[13px] text-blue-500">
                                     {{ $dealOfTheDay->total_reviews }} reviews</p>
                             </div>
                         </div>
                         <div class="pricing w-full flex items-center justify-start gap-3 bg-cyan-50 px-5 py-3 h-[6rem] rounded-2xl ">
                             <div class="deal-price flex flex-col justify-center h-[100%]">
                                 <label for="" class="text-gray-600 text-[11px]">Deal Price</label>
                                 <h1 class="text-3xl text-green-600 font-bold">${{ round($dealOfTheDay->price - $dealOfTheDay->discount, 2) }}</h1>
                             </div>
                             <div class="regular-price flex flex-col justify-center h-[100%]">
                                 <label for="" class="text-gray-600 text-[11px]">Regular Price</label>
                                 <del class="text-gray-400 text-xl font-bold">${{ round($dealOfTheDay->old_price, 2) }}</del>
                             </div>
                             <div class="save-pro self-start text-white font-bold text-[13px] bg-green-600 rounded-xl px-5 py-1">
                                <h2>Save ${{ round($dealOfTheDay->old_price - ($dealOfTheDay->price - $dealOfTheDay->discount), 2) }}</h2>
                             </div>
                            </div>
                            <div class="deal-btn flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-pink-500 text-white font-bold text-[13px] rounded-xl px-5 py-3  hover:scale-105 transition-transform">
                                   <button
                                       class=" ">Grab This Deal Now ></button>
                            </div>
                     </div>
                     <div class="absolute top-0 w-full h-[100%]  bg-white  animate-pulse"></div>
                 </div>
             </div>
         </div>

         {{-- best seller --}}
         <div class="best-seller px-15 py-5">
             <div class="header flex justify-between items-center">
                 <div class="title flex gap-2 items-center">
                     <div
                         class="svg bg-gradient-to-r from-orange-500 via-pink-500 to-pink-500 px-3 py-[10px] rounded-xl flex items-center justify-center">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="lucide lucide-trending-up w-4 h-4 text-white">
                             <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                             <polyline points="16 7 22 7 22 13"></polyline>
                         </svg>
                     </div>
                     <div class="text">
                         <h2 class="text-2xl font-bold">Best Sellers</h2>
                         <p class="text-[12px] text-gray-600">Most Popular products</p>
                     </div>
                 </div>
                 <div class="add-product-btn product-modal-btn">
                     <button class="text-blue-700 text-[13px] font-bold">See All ></button>
                 </div>

             </div>
             <div class="best-seller-body">
                 <div class="best-seller-cards  flex flex-wrap gap-5 my-5">
                     @foreach ($topSeller as $item)
                         <div
                             class="best-seller-card border rounded-xl overflow-hidden p-2 hover:shadow-xl hover:translate-y-[-5px] transition-all duration-300 cursor-pointer group">
                             <div class="img w-[150px] h-[130px] overflow-hidden rounded-lg">
                                 <img src="{{ asset($item->products->main_image) }}" alt=""
                                     class="w-[100%] h-[100%] object-cover rounded-lg group-hover:scale-105 transition-transform duration-300">
                             </div>
                             <div class="title my-2">
                                 <h3 class="font-bold text-[12px] text-gray-600">{{ $item->products->name }}</h3>
                             </div>
                             {{-- rating --}}
                             <div class="ratings flex gap-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="lucide lucide-star w-3 h-3 fill-yellow-400 text-yellow-400"
                                     data-fg-dag192="1.21:10.52042:/src/app/pages/Home.tsx:374:19:19677:60:e:Star::::::hX0"
                                     data-fgid-dag192=":r7i:">
                                     <path
                                         d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                     </path>
                                 </svg>
                                 <span class="text-[9px] font-bold">{{ $item->products->total_reviews ?? '0' }}</span>
                             </div>
                             <div class="price my-2 flex items-center gap-1">
                                 <p class="font-bold text-[13px]">${{ number_format($item->products->price, 2) }}</p><del
                                     class="text-[10px] mt-1 text-gray-400">${{ number_format($item->products->old_price, 2) }}</del>
                             </div>


                             <!-- Best seller card content -->
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
         <hr>
         <div class=" top-rated-products-grid  my-5 px-15">
             <div class="header flex justify-between items-center">
                 <div class="title flex gap-2 items-center">
                     <div class="svg">
                         <div
                             class="svg bg-gradient-to-r from-amber-400 via-amber-500 to-amber-500 px-3 py-[10px] rounded-xl flex items-center justify-center">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-star w-5 h-5 text-white fill-current">
                                 <path
                                     d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                 </path>
                             </svg>
                         </div>
                     </div>
                     <div class="text">
                         <h2 class="text-2xl font-bold">Top Rated Products</h2>
                         <p class="text-[12px] text-gray-600">Loved by our customers</p>
                     </div>
                 </div>
                 <div class="add-product-btn product-modal-btn">
                     <button class="text-blue-700 text-[13px] font-bold">See All ></button>
                 </div>

             </div>
             <div class="top-rated-products md:grid grid-cols-5 flex flex-wrap gap-5 my-5">
                
             </div>
         </div>
         <hr>
         <div class=" new-arrivals-grid px-15 py-10">
             <div class="header flex justify-between items-center">
                 <div class="title flex gap-2 items-center">
                     <div
                         class="svg svg bg-gradient-to-r from-emerald-500  via-teal-600 to-teal-600 px-3 py-[10px] rounded-xl flex items-center justify-center">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="lucide lucide-tag w-4 h-4 text-white">
                             <path
                                 d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z">
                             </path>
                             <circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>
                         </svg>
                     </div>
                     <div class="text">
                         <h2 class="text-2xl font-bold">New Arrivals</h2>
                         <p class="text-[12px] text-gray-600">Fresh from the warehouse</p>
                     </div>
                 </div>
                 <div class="add-product-btn product-modal-btn">
                     <button class="text-blue-700 text-[13px] font-bold">See All ></button>
                 </div>

             </div>
             <div class="new-arrivals md:grid grid-cols-5 flex flex-wrap gap-5 my-5 ">

             </div>
         </div>
         <hr>
         {{-- why choose us --}}
         <div class="why-choose-us px-15 py-10">
             <div class="title text-center">
                 <h2 class="text-3xl font-bold">Why Choose Us?</h2>
             </div>
             <div class="reasons md:grid grid-cols-4 flex flex-wrap gap-3 my-5 w-full ">
                 {{-- free delviver --}}
                 <div
                     class="free-delivery border rounded-xl p-5 flex flex-col items-center justify-center gap-2 hover:translate-y-[-5px] transition-transform duration-300 group">
                     <div
                         class="img bg-blue-500 px-3 py-3 rounded-xl text-3xl group-hover:scale-105 transition-transform duration-500">
                         🚚</div>
                     <div class="title text-center">
                         <h5 class="font-bold text-[13px]">Free Delivery</h5>
                     </div>
                     <div class="condition text-center">
                         <p class="text-[10px] text-gray-500">On orders above $50</p>
                     </div>
                 </div>
                 {{-- secure payment --}}
                 <div
                     class="secure-payment border rounded-xl p-5 flex flex-col items-center justify-center gap-2 hover:translate-y-[-5px] transition-transform duration-300 group">
                     <div
                         class="img bg-green-500 px-3 py-3 rounded-xl text-3xl group-hover:scale-105 transition-transform duration-500">
                         💳</div>
                     <div class="title text-center">
                         <h5 class="font-bold text-[13px]">Secure Payment</h5>
                     </div>
                     <div class="condition text-center">
                         <p class="text-[10px] text-gray-500">100% protected</p>
                     </div>
                 </div>
                 {{-- easy returns --}}
                 <div
                     class="easy-returns border rounded-xl p-5 flex flex-col items-center justify-center gap-2 hover:translate-y-[-5px] transition-transform duration-300 group">
                     <div
                         class="img bg-purple-500 px-3 py-3 rounded-xl text-3xl group-hover:scale-105 transition-transform duration-500">
                         🔄</div>
                     <div class="title text-center">
                         <h5 class="font-bold text-[13px]">Easy Returns</h5>
                     </div>
                     <div class="condition text-center">
                         <p class="text-[10px] text-gray-500">30-day return policy</p>
                     </div>
                 </div>
                 {{-- Best offers --}}
                 <div
                     class="best-offers border rounded-xl p-5 flex flex-col items-center justify-center gap-2 hover:translate-y-[-5px] transition-transform duration-300 group">
                     <div
                         class="img bg-orange-500 px-3 py-3 rounded-xl text-3xl group-hover:scale-105 transition-transform duration-500">
                         🎁</div>
                     <div class="title text-center">
                         <h5 class="font-bold text-[13px]">Best Offers</h5>
                     </div>
                     <div class="condition text-center">
                         <p class="text-[10px] text-gray-500">Exclusive deals and discounts</p>
                     </div>
                 </div>


             </div>
         </div>
     </div>
 @endsection
 @section('scripts')
     <script>
         $(document).ready(function() {
             $.ajax({
                 url: '/products/top-rated',
                 method: 'GET',
                 success: function(response) {
                     $('.top-rated-products').html(response);
                 },
             })
         })
         $(document).ready(function() {
             $.ajax({
                 url: '/products/new-arrivals',
                 method: 'GET',
                 success: function(response) {
                     $('.new-arrivals').html(response);
                 },
             })
         })


         const items = ["item1", "item2", "item3"];
         const buttons = document.querySelectorAll("#carousel-btns .dot");
         const carousel = document.querySelector(".carousel");
         let current = 0;
         const interval = 3000; // 3 seconds

         function updateCarousel() {
             current = (current + 1) % items.length;
             const target = document.getElementById(items[current]);
             carousel.scrollTo({
                 left: target.offsetLeft,
                 behavior: "smooth"
             });

             // Update active button
             buttons.forEach((btn, index) => {
                 btn.classList.toggle("w-[30px]", index === current);
             });
         }

         // Initialize first active button
         buttons[current].classList.add("w-[30px]");

         setInterval(updateCarousel, interval);
     </script>
 @endsection
