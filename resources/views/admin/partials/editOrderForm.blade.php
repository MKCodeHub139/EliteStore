<h2 class="text-2xl font-bold">Edit Order</h2>
<form action="" method="POST" class="grid grid-cols-2 gap-4 edit-order-form" data-id="{{$order->id}}">
    @csrf
    <div class="form-group flex flex-col gap-2">
        <label for="name" class="text-sm font-[500]">Name</label>
        <input type="text" id="name" name="name" value="{{ $order->user->name }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="form-group flex flex-col gap-2">
        <label for="email" class="text-sm font-[500]">Email</label>
        <input type="text" id="email" name="email" value="{{ $order->user->email }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="form-group flex flex-col gap-2">
        <label for="phone" class="text-sm font-[500]">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ $order->user->phone }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="form-group flex flex-col gap-2">
        <label for="order_number" class="text-sm font-[500]">Order Number</label>
        <input type="text" id="order_number" name="order_number" value="{{ $order->order_number }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="form-group flex flex-col gap-2">
        <label for="sub_total" class="text-sm font-[500]">Sub Total</label>
        <input type="text" id="sub_total" name="subtotal" value="{{ $order->subtotal }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="form-group flex flex-col gap-2">
        <label for="tax" class="text-sm font-[500]">Tax</label>
        <input type="text" id="tax" name="tax" value="{{ $order->tax }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="form-group flex flex-col gap-2">
        <label for="shipping" class="text-sm font-[500]">Shipping</label>
        <input type="text" id="shipping" name="shipping" value="{{ $order->shipping }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    
    <div class="form-group flex flex-col gap-2">
        <label for="total" class="text-sm font-[500]">Total</label>
        <input type="text" id="total" name="total" value="{{ $order->total }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    
    <div class="form-group flex flex-col gap-2">
        <label for="payment_method" class="text-sm font-[500]">Payment Method</label>
        <input type="text" id="payment_method" name="payment_method" value="{{ $order->payment_method }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="form-group flex flex-col gap-2">
        <label for="payment_status" class="text-sm font-[500]">Payment Status</label>
        <input type="text" id="payment_status" name="payment_status" value="{{ $order->payment_status }}" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="form-group flex flex-col gap-2 col-span-2">
        <label for="shipping_address" class="text-sm font-[500]">Shipping Address</label>
        <textarea id="shipping_adderess" name="shipping_adderess" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $order->shipping_adderess }}</textarea>
    </div>
    <div class="form-group flex flex-col gap-2 col-span-2">
        <label for="shipping_address" class="text-sm font-[500]">Status</label>
        <select name="status" id="status" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="pending" name="pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="processing" name="processing" {{ $order->status === 'Processing' ? 'selected' : '' }}>Processing</option>
            <option value="shipped" name="shipped" {{ $order->status === 'Shipped' ? 'selected' : '' }}>Shipped</option>
            <option value="delivered" name="delivered" {{ $order->status === 'Delivered' ? 'selected' : '' }}>Delivered</option>
        </select>
    </div>
    <div class="orderItems col-span-2">
        <h3 class="text-xl font-bold mt-4">Order Items</h3>
        <table class="table-auto w-full text-left mt-2">
            <thead>
                <tr>
                    <th class="px-4 py-2">Product Name</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $item)
                <tr class="order-qty-update">
                    <td class="border px-4 py-2">{{ $item->products->name }}</td>
                    <td class="border px-4 py-2"><input type="number" name="quantity[]" id="" value="{{ $item->quantity }}"></td>
                    <td class="border px-4 py-2">{{ $item->products->price }}</td>
                    <td class="border px-4 py-2">
                        <button class="btn btn-sm btn-primary" data-id="{{$item->id}}">Update</button>
                        <button type="button" class="btn btn-sm btn-danger delete-item-btn" data-id="{{ $item->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class=""></div>
    <div class="">
        <button type="submit" class="btn btn-sm btn-primary float-end">Update Order</button>
    </div>
</form>
 