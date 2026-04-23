@extends('index')
@section('main')
    <div class="content">
        {{-- header --}}
        <div
            class="header h-[10rem] bg-gradient-to-r from-blue-600 via-purple-600 to-purple-600 text-white md:px-15 px-2 flex flex-col justify-center">
            <div class="title">
                <h2 class="text-4xl font-bold">All Products</h2>
            </div>
            <div class="description my-2">
                <p class="text-[14px] text-gray-200">Explore our complete collection of {{ $products->count() }} premium
                    electronics</p>
            </div>
        </div>
        {{-- content --}}
        <div class="main-content md:px-15 px-2 py-10 ">
            <div class="grid grid-cols-5 gap-7 relative ">
                <div class="lg:col-span-1 col-span-5 border-1 rounded-2xl min-h-[50vh] filters p-5 lg:visible hidden  lg:flex lg:static flex-col absolute lg:w-[100%] w-[90%] right-0 bg-white lg:z-[1] z-[111]"> 
                    <div class="header pb-2">
                        <h2 class="text-[16px] font-bold">Filters</h2>
                    </div>
                    <hr>
                    <div class="title">
                        <h5 class="my-3 text-[14px] font-[600]">Categories</h5>
                    </div>
                    <div class="filters-list mb-5">
                        <ul class="text-[13px] font-[500] flex flex-col gap-1">
                            <li
                                class="filter-category text-white bg-gradient-to-r from-blue-600 via-purple-600 to-purple-600 rounded-xl px-2 py-2 flex justify-between">
                                <p>All Proucts</p>
                                <p class="bg-white rounded-full px-2 text-black">{{ $products->count() }}</p>
                            </li>
                            @foreach ($categories as $category)
                                <li class="px-2 py-2 hover:bg-gray-100 rounded-xl flex justify-between filter-category"
                                    data-catId="{{ $category->id }}">
                                    <p>{{ $category->name }}</p>
                                    <p class="bg-gray-200 rounded-full px-2 text-black">{{ $category->products->count() }}
                                    </p>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <hr>
                    {{-- price range filter --}}
                    <div class="price-filter mb-5">
                        <div class="title">
                            <h5 class="my-3 text-[14px] font-[600]">Price Range</h5>
                        </div>
                        <div class="price-filters">
                            <ul class="flex flex-col gap-3 text-[12px]">
                                <li class="flex gap-2"><input type="checkbox" name="price_range[]" id=""
                                        value="100">Under $100</li>
                                <li class="flex gap-2"><input type="checkbox" name="price_range[]" id=""
                                        value="100-300">$100 - $300</li>
                                <li class="flex gap-2"><input type="checkbox" name="price_range[]" id=""
                                        value="300-500">$300 - $500</li>
                                <li class="flex gap-2"><input type="checkbox" name="price_range[]"
                                        id=""value="500+">$500+</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    {{-- minimum rating filter --}}
                    {{-- <div class="price-filter mb-5">
                         <div class="title">
                        <h5 class="my-3 text-[14px] font-[600]">Minimum Rating</h5>
                         </div>
                         <div class="filters-list">
                            <ul class="flex flex-col gap-3 text-[12px]">
                                <li class="flex gap-2"><input type="checkbox" name="" id="" value="100">Under $100</li>
                                <li class="flex gap-2"><input type="checkbox" name="" id="" value="100-300">$100 - $300</li>
                                <li class="flex gap-2"><input type="checkbox" name="" id="" value="300-500">$300 - $500</li>
                                <li class="flex gap-2"><input type="checkbox" name="" id=""value="500+">$500+</li>
                            </ul>
                         </div>
                    </div><hr> --}}

                </div>
                <div class="lg:col-span-4 col-span-5 products">
                    <div
                        class="products-header md:h-[4rem] border rounded-2xl flex justify-between w-full md:px-5 px-2 py-2 md:py-0  items-center">
                        <div class="qty flex gap-1">
                            {{-- filter btn --}}
                            <button class="filter-btn lg:hidden">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <line x1="4" y1="6" x2="20" y2="6" />
                                    <circle cx="10" cy="6" r="2" />

                                    <line x1="4" y1="12" x2="20" y2="12" />
                                    <circle cx="14" cy="12" r="2" />

                                    <line x1="4" y1="18" x2="20" y2="18" />
                                    <circle cx="8" cy="18" r="2" />
                                </svg>
                            </button>
                            <p>{{ $products->count() }} Products found </p>
                        </div>
                        <div class="actions flex md:flex-row flex-col gap-2 items-center h-[100%]">
                            <div
                                class="display-classes bg-gray-200 flex justify-center items-center rounded h-[30px] w-[70px] gap-3">
                                <button
                                    class="text-blue-600 bg-white p-1 rounded h-[22px] w-[22px] flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-grid3x3 lucide-grid-3x3 w-4 h-44"
                                        data-fg-d3gt76="1.23:29.464:/src/app/pages/Products.tsx:242:23:9771:31:e:Grid3x3::::::DWOM"
                                        data-fgid-d3gt76=":rka:">
                                        <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                                        <path d="M3 9h18"></path>
                                        <path d="M3 15h18"></path>
                                        <path d="M9 3v18"></path>
                                        <path d="M15 3v18"></path>
                                    </svg>
                                </button>
                                <button
                                    class="grid-view full-view p-1 rounded h-[22px] w-[22px] flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-layout-list w-5 h-5"
                                        data-fg-d3gt78="1.23:29.464:/src/app/pages/Products.tsx:252:23:10227:34:e:LayoutList::::::DrdG"
                                        data-fgid-d3gt78=":rkc:">
                                        <rect width="7" height="7" x="3" y="3" rx="1"></rect>
                                        <rect width="7" height="7" x="3" y="14" rx="1"></rect>
                                        <path d="M14 4h7"></path>
                                        <path d="M14 9h7"></path>
                                        <path d="M14 15h7"></path>
                                        <path d="M14 20h7"></path>
                                    </svg>
                                </button>
                            </div>

                            {{-- <select name="" id="" class="md:w-[150px] w-[100px] border rounded-xl px-2 py-1 text-[14px]">
                                <option value="">Featured</option>
                            </select> --}}
                        </div>
                    </div>
                    <div class="product-cards md:grid grid-cols-4 flex flex-wrap my-5 gap-5">
                        {{-- card --}}


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
                url: '/products/filters',
                method: 'GET',
                success: function(response) {
                    $('.product-cards').html(response);
                }
            })
        })
        $(document).on('click', '.filter-category', function() {
            let catId = $(this).data('catid');
            $(this).addClass('text-white bg-gradient-to-r from-blue-600 via-purple-600 to-purple-600').removeClass(
                'text-black bg-gray-200').siblings().removeClass(
                'text-white bg-gradient-to-r from-blue-600 via-purple-600 to-purple-600').addClass(
                'text-black bg-gray-200');
            $.ajax({
                url: '/products/filters',
                method: 'GET',
                data: {
                    category_id: catId
                },
                success: function(response) {
                    $('.product-cards').html(response);
                }
            })
        })
        // filter by price range
        $(document).on('click', '.price-filters input[type="checkbox"]', function() {
            let priceRange = [];
            $('.price-filters input[type="checkbox"]:checked').each(function() {
                priceRange.push($(this).val());
            })
            $.ajax({
                url: '/products/filters',
                method: 'GET',
                data: {
                    price_range: priceRange
                },
                success: function(response) {
                    $('.product-cards').html(response);
                }
            })
        })
        // add class of display
        $(document).on('click', '.display-classes button svg', function(e) {
            e.preventDefault();
            let target = $(e.target);
            $(e.target).closest('button').siblings().removeClass('text-blue-600 bg-white');
            target.closest('button').addClass('text-blue-600 bg-white');
            if (target.closest('button').hasClass('grid-view')) {
                $('.product-cards').removeClass('grid-cols-4').addClass('grid-cols-1');
            } else {
                $('.product-cards').addClass('grid-cols-4').removeClass('grid-cols-1');
            }

        })
    </script>
@endsection
