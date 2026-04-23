@extends('index')
@section('main')
<div class="main-content lg:px-15 px-2">
    @if($cartItems->count() > 0)
    <div class="lg:grid grid-cols-3 lg:my-5 gap-5 flex flex-col-reverse">
        {{-- cart Modal --}}
            <div class="cart-or-order-card cart-modals lg:col-span-2 w-full h-screen ">

            </div>
        <div class="orderSummary border rounded-xl p-2 lg:mt-15 h-[fit-content]">
            <h2 class="text-xl font-bold">Order Summary</h2>
            <div class="subtotal flex justify-between my-3">
                <p class="text-[12px] text-gray-500">Subtotal</p>
                <p class="text-[12px] font-[500]">${{$cartItems->sum(function($item){
                    return $item->product->price * $item->quantity;
                })}}</p>
            </div>
            <div class="shipping my-3 flex justify-between">
                <p class="text-[12px] text-gray-500">Shipping</p>
                <p class="text-[12px] font-[500] text-green-600">Free</p>

            </div>
            <div class="tax my-3 flex justify-between">
                <p class="text-[12px] text-gray-500">Tax</p>
                <p class="text-[12px] font-[500]">$19.90</p>

            </div><hr>
            <div class="total my-3 flex justify-between">
                <p class="text-[17px] font-bold">Total</p>
                <p class="text-[17px] font-bold">${{$cartItems->sum(function($item){
                    return $item->product->price * $item->quantity;
                })}}</p>
            </div>
            <div class="proceed-btn text-center w-full my-3">
                <button class="bg-blue-500 py-3 rounded-lg w-[100%] text-white text-[13px] font-[500] cursor-pointer hover:bg-blue-600">Proceed to checkout -></button>
            </div>
            <ul class="flex flex-col gap-2 py-2">
                <li class="flex items-center gap-3 text-[10px] text-gray-500"><div class="w-[5px] h-[5px] bg-green-600 rounded-full"></div> Secure checkout</li>
                <li class="flex items-center gap-3 text-[10px] text-gray-500"><div class="w-[5px] h-[5px] bg-green-600 rounded-full"></div> Free returns within 30 days</li>
                <li class="flex items-center gap-3 text-[10px] text-gray-500"><div class="w-[5px] h-[5px] bg-green-600 rounded-full"></div> 2-year warranty included</li>
            </ul>
        </div>
    </div>
    @else
    <div class="no-cart w-full h-[80vh] flex flex-col gap-3 justify-center items-center">
        <h5 class="text-2xl font-bold ">Your Cart Is Empty !</h5>
        <p class="text-[11px] text-gray-500">Looks like you haven't added anything to your cart yet.</p>
        <button class="bg-blue-500 px-5 py-2 rounded-2xl text-white cursor-pointer hover:bg-blue-600">Start Shopping -></button>
    </div>
    @endif
</div>
@endsection
@section('scripts')
<script>
      $(document).ready(function(){
            $.ajax({
                url:'/cart-data',
                method:'GET',
                success:function(res){
                    $('.cart-or-order-card').html(res)
                }
            })
        })
        $(document).on('click','.proceed-btn',function(){
              $.ajax({
                url:'/proceed-data',
                method:'GET',
                success:function(res){
                    $('.cart-or-order-card').html(res)
                }
            })
        })

        // delete cart item
        $(document).on('click','.cart-card-btn',function(){
            let id=$(this).data('id')
            $.ajax({
                url:'/cart/remove-item/'+id,
                method:'POST',
                success:function(res){
                    $('.cart-or-order-card').html(res.html)
                }
            })
        })
</script>
@endsection