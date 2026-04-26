<h2 class=" text-3xl font-bold">Shopping Cart</h2>
@if ($cartItems)
    <div class="cart-modals h-[100%] flex flex-col gap-5 overflow-y-auto my-5">
        @foreach ($cartItems as $item)
            <div class=" cart-modal flex gap-3  items-center p-2 rounded-xl shadow-lg border">
                <div class="img border border-gray-300 p-1 rounded-xl overflow-hidden shadow-lg h-[100%]">
                    <img src="{{ asset($item->product->main_image) }}" alt=""
                        class="w-[100px] h-[100%] object-cover">
                </div>
                <div class="details w-full">
                    <div class="title flex justify-between">
                        <h4 class="text-[16px] font-bold">{{ $item->product->name }}</h4>
                        <button
                            class="text-red-500 hover:text-red-700 bg-red-100 text-sm font-medium py-1 px-3 rounded-md cart-card-btn"
                            data-id="{{ $item->id }}">delete</button>
                    </div>
                    <div class="category">
                        <p class="text-[11px] text-gray-500">{{ $item->product->category->name }}</p>
                    </div>
                    <div class="description">
                        <p class="text-[11px] text-gray-600">{{ $item->product->description }}</p>
                    </div>
                    <div class="cart-qty-and-pricing py-1 flex justify-between items-center">
                        <div class="cart-qty">
                            <button class="bg-gray-200 text-gray-700 hover:bg-gray-300 py-1 px-3 rounded-md decreaseQty"
                                data-id="{{ $item->id }}">-</button>
                            <input type="text" name="" id=""
                                class="border border-gray-300 py-1 px-3 rounded-md w-[70px] text-center cartQty"
                                disabled readonly value="{{ $item->quantity }}">
                            <button class="bg-gray-200 text-gray-700 hover:bg-gray-300 py-1 px-3 rounded-md increaseQty"
                                data-id="{{ $item->id }}">+</button>
                        </div>
                        <div class="pricing">
                            <h5 class="text-lg font-bold">
                                ${{ number_format($item->product->price * $item->quantity, 2) }}</h5>
                            <p class="text-gray-500 text-[10px] float-end">
                                ${{ number_format($item->product->price, 2) }} each</p>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach

        <div class="continue-shopping">
            <a href="" class="text-blue-600 text-[14px]"><- Continue Shopping</a>
        </div>
    </div>
@else
<div class="text-[20px] text-gray-700 text-center">Cart not found</div>
@endif
