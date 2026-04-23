<div class="sidebar w-[250px] h-screen bg-gray-800 text-white px-2 sticky top-0">
    <div class="logo flex items-center gap-1">
        <span class=" px-2 bg-gradient-to-r from-blue-600 to-purple-600 rounded text-2xl font-bold">E</span>
        <h2 class="text-2xl font-bold text-center py-4">Admin Panel</h2>
    </div>
    <ul class="p-4">
        <li class="mb-4"><a href="/admin/dashboard" class="block py-2 px-4 rounded {{ request()->is('admin/dashboard') ? 'bg-blue-500 hover:bg-blue-600' : 'hover:bg-gray-700' }}">Dashboard</a></li>
        <li class="mb-4"><a href="/admin/products" class="block py-2 px-4 rounded {{ request()->is('admin/products') ? 'bg-blue-500 hover:bg-blue-600' : 'hover:bg-gray-700' }}">Products</a></li>
        <li class="mb-4"><a href="/admin/categories" class="block py-2 px-4  rounded {{ request()->is('admin/categories') ? 'bg-blue-500 hover:bg-blue-600' : 'hover:bg-gray-700' }}">Categories</a></li>
        <li class="mb-4"><a href="/admin/orders" class="block py-2 px-4  rounded {{ request()->is('admin/orders') ? 'bg-blue-500 hover:bg-blue-600' : 'hover:bg-gray-700' }}">Orders</a></li>
        <li class="mb-4"><a href="/admin/users" class="block py-2 px-4  rounded {{ request()->is('admin/users') ? 'bg-blue-500 hover:bg-blue-600' : 'hover:bg-gray-700' }}">Users</a></li>
    </ul>

</div>