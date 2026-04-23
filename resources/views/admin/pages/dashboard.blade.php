@extends('admin.index')
@section('admin-content')
    <div class="">
        <div class="header flex justify-between items-center">
            <div class="title">
                <h2 class="text-2xl font-bold">Dashboard</h2>
                <p class="text-[12px] text-gray-600">Manage Your Dashboard</p>
            </div>
        </div>
        <div class="content my-5">
            {{-- orders --}}
            {{-- <h2 class="text-xl font-black">Orders</h2> --}}
            <div class="orders-cards flex flex-wrap gap-4 m-4">
                <div class="total-orders border border-gray-500 hover:border-blue-500 hover:translate-y-[-5px] transition-transform duration-300  p-5 rounded-lg shadow-md text-center ">
                    <h3 class="text-[14px] text-gray-500 font-bold">Total Orders</h3>
                    <p class="text-2xl">{{ $orders->count() ?? 0 }}</p>
                </div>
                <div class="pending-orders border border-gray-500 hover:border-blue-500 hover:translate-y-[-5px] transition-transform duration-300 p-5 rounded-lg shadow-md text-center ">
                    <h3 class="text-[14px] text-gray-500 font-bold">Pending Orders</h3>
                    <p class="text-2xl">{{ $orders->where('status', 'Pending')->count() ?? 0 }}</p>
                </div>
                <div class="pending-orders border border-gray-500 hover:border-blue-500 hover:translate-y-[-5px] transition-transform duration-300 p-5 rounded-lg shadow-md text-center ">
                    <h3 class="text-[14px] text-gray-500 font-bold">Processing Orders</h3>
                    <p class="text-2xl">{{ $orders->where('status', 'Processing')->count() ?? 0 }}</p>
                </div>
                <div class="pending-orders border border-gray-500 hover:border-blue-500 hover:translate-y-[-5px] transition-transform duration-300 p-5 rounded-lg shadow-md text-center ">
                    <h3 class="text-[14px] text-gray-500 font-bold">Shipped Orders</h3>
                    <p class="text-2xl">{{ $orders->where('status', 'Shipped')->count() ?? 0 }}</p>
                </div>
                <div class="delivered-orders border border-gray-500 hover:border-blue-500 hover:translate-y-[-5px] transition-transform duration-300 p-5 rounded-lg shadow-md text-center ">
                    <h3 class="text-[14px] text-gray-500 font-bold">Delivered Orders</h3>
                    <p class="text-2xl">{{ $orders->where('status', 'Delivered')->count() ?? 0 }}</p>
                </div>
                <div class="total-categories border border-gray-500 hover:border-blue-500 hover:translate-y-[-5px] transition-transform duration-300 p-5 rounded-lg shadow-md text-center ">
                    <h3 class="text-[14px] text-gray-500 font-bold">Total Categories</h3>
                    <p class="text-2xl">{{ $categories->count() ?? 0 }}</p>
                </div>
                <div class="total-products border border-gray-500 hover:border-blue-500 hover:translate-y-[-5px] transition-transform duration-300 p-5 rounded-lg shadow-md text-center ">
                    <h3 class="text-[14px] text-gray-500 font-bold">Total Products</h3>
                    <p class="text-2xl">{{ $products->count() ?? 0 }}</p>
                </div>
                 <div class="total-users border border-gray-500 hover:border-blue-500 hover:translate-y-[-5px] transition-transform duration-300 p-5 rounded-lg shadow-md text-center ">
                    <h3 class="text-[14px] text-gray-500 font-bold">Total Users</h3>
                    <p class="text-2xl">{{ $users->count() ?? 0 }}</p>
                </div>

            </div>
            
           
           

        </div>
    </div>
@endsection
