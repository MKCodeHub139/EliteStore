<h2 class=" text-3xl font-bold">Checkout</h2>
<form action="/order/submit/{{auth()->guard('web')->user()->id}}" method="POST" class="p-5 border rounded-2xl my-5">
    @csrf
    <h5 class="font-bold ">Shipping Information</h5>
    <div class="grid grid-cols-2 gap-3">
        <div class="name">
            <label for="" class="font-bold text-[11px]">Name</label>
            <input type="text" name="name" id="" class="w-full border py-1 px-2 rounded-lg" placeholder="Enter Name" value="{{auth()->guard('web')->user()->name}}">
        </div>
        <div class="email">
            <label for="" class="font-bold text-[11px]">Email</label>
            <input type="email" name="email" id="" class="w-full border py-1 px-2 rounded-lg" placeholder="Enter Email" value="{{auth()->guard('web')->user()->email}}">
        </div>
        <div class="phone col-span-2">
            <label for="" class="font-bold text-[11px]">Phone</label>
            <input type="phone" name="phone" id="" class="w-full border py-1 px-2 rounded-lg" placeholder="Enter Phone" value="{{auth()->guard('web')->user()->phone}}">
        </div>
        <div class="address col-span-2">
            <label for="" class="font-bold text-[11px]">address</label>
            <textarea type="address" name="address" id="" class="w-full border py-1 px-2 rounded-lg" placeholder="Enter Phone"></textarea>
        </div>
        <div class="city">
            <label for="" class="font-bold text-[11px]">City</label>
            <input type="city" name="city" id="" class="w-full border py-1 px-2 rounded-lg" placeholder="Enter Phone">
        </div>
        <div class="zip_code">
            <label for="" class="font-bold text-[11px]">Zip Code</label>
            <input type="zip_code" name="zip_code" id="" class="w-full border py-1 px-2 rounded-lg" placeholder="Enter Phone">
        </div>
        <div class="continue-to-payment-btn col-span-2 text-center">
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 cursor-pointer text-white text-[13px] py-3 text-center rounded-lg">Continue To Payment</button>
        </div>
    </div>
</form>
