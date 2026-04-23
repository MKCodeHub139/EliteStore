<div class="specifications grid md:grid-cols-2 grid-cols-1  gap-4">
    <div class="spec-brand flex items-center justify-between bg-gray-100 p-3 rounded-lg">
        <h3 class="text-[12px] font-bold text-gray-500">Brand</h3>
        <p class="text-[13px] ">{{ $product->brand->name ?? 'N/A' }}</p>
    </div>
    <div class="spec-model flex items-center justify-between bg-gray-100 p-3 rounded-lg">
        <h3 class="text-[12px] font-bold text-gray-500">Model</h3>
        <p class="text-[13px] ">{{ $product->name ?? 'N/A' }}</p>
    </div>
    <div class="spec-category flex items-center justify-between bg-gray-100 p-3 rounded-lg">
        <h3 class="text-[12px] font-bold text-gray-500">Category</h3>
        <p class="text-[13px] ">{{ $product->category->name ?? 'N/A' }}</p>
    </div>
    <div class="spec-warrenty flex items-center justify-between bg-gray-100 p-3 rounded-lg">
        <h3 class="text-[12px] font-bold text-gray-500">Warranty</h3>
        <p class="text-[13px] ">{{ $product->warenty ?? 'N/A' }}</p>
    </div>
    <div class="spec-availability flex items-center justify-between bg-gray-100 p-3 rounded-lg">
        <h3 class="text-[12px] font-bold text-gray-500">Availability</h3>
        <p class="text-[13px] ">{{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}</p>
    </div>
    <div class="spec-sku flex items-center justify-between bg-gray-100 p-3 rounded-lg">
        <h3 class="text-[12px] font-bold text-gray-500">SKU</h3>
        <p class="text-[13px] ">{{ $product->sku ?? 'N/A' }}</p>
    </div>
 

</div>