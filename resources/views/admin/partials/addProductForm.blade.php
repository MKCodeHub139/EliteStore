<h2 class="text-2xl font-bold">Add Product</h2>
<form action="/admin/products/store" class="w-full grid grid-cols-5 gap-2 my-5" id="add-product-form" enctype="multipart/form-data">
    @if ($product->id)
    <input type="hidden" name="id" value="{{$product->id}}">
    @endif
    <div class="form-group my-3">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Product Category</label>
        <select name="category_id" id="category_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="">Select a category</option>
            <!-- Options will be populated dynamically -->
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
        </select>
        <div id="category_id_error" class="text-red-700 text-[11px]"></div>
    </div>
        <div class="form-group my-3">
        <label for="brand_id" class="block text-sm font-medium text-gray-700">Product Brand</label>
        <select name="brand_id" id="brand_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="">Select a category</option>
            <!-- Options will be populated dynamically -->
            @foreach($brands as $brand)
            <option value="{{$brand->id}}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
            @endforeach
            <option value="">Other</option>
        </select>
        <div id="brand_id_error" class="text-red-700 text-[11px]"></div>

    </div>
        {{-- <div class="form-group my-3">
        <label for="slug" class="block text-sm font-medium text-gray-700">Product Slug</label>
        <input type="text" value="{{$product->slug ?? ''}}" name="slug" id="slug" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product slug">
    </div> --}}
     {{-- <div class="form-group my-3">
        <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
        <input type="text" value="{{$product->price ?? ''}}" name="price" id="price" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product price">
        <div id="price_error" class="text-red-700 text-[11px]"></div>

    </div> --}}
    <div class="form-group my-3">
        <label for="original_price" class="block text-sm font-medium text-gray-700">Product originol Price</label>
        <input type="text" value="{{$product->old_price ?? ''}}" name="old_price" id="original_price" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product original price">
                <div id="old_price_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="form-group my-3">
        <label for="discount_price" class="block text-sm font-medium text-gray-700">Product Discount Price</label>
        <input type="text" value="{{$product->discount_price ?? ''}}" name="discount_price" id="discount_price" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product discount price">
                <div id="discount_price_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="form-group my-3">
        <label for="cost_price" class="block text-sm font-medium text-gray-700">Product Cost Price</label>
        <input type="text" value="{{$product->cost_price ?? ''}}" name="cost_price" id="cost_price" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product cost price">
                <div id="cost_price_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="form-group my-3">
        <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Product Stock Quantity</label>
        <input type="number" value="{{$product->stock_quantity ?? ''}}" name="stock_quantity" id="stock_quantity" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product stock quantity">
        <div id="stock_quantity_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="form-group my-3">
        <label for="status" class="block text-sm font-medium text-gray-700">Product Status</label>
        <select name="status" id="" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="Active" {{$product->status =='Active'?'selected':''}}>Active</option>
            <option value="Inactive" {{$product->status =='Inactive'?'selected':''}}>Inactive</option>
        </select>
        <div id="status_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="form-group my-3">
        <label for="warenty" class="block text-sm font-medium text-gray-700">Product Warrenty</label>
        <input type="text" value="{{$product->warenty ?? ''}}" name="warenty" id="warrenty" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product warranty">
         <div id="warrenty_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="col-span-5 form-group my-3">
        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
        <input type="text" value="{{$product->name ?? ''}}" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product name">
        <div id="name_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="form-group my-3 flex items-center gap-3">
        <label for="is_featured" class="text-sm font-medium text-gray-700">Product is_featured: </label>
        <input type="checkbox" {{$product->is_featured ? 'checked' : ''}} name="is_featured" value="1" id="is_featured" class="mt-1 " placeholder="product is_featured">
        <div id="is_featured_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="form-group my-3 flex items-center gap-3">
        <label for="is_tranding" class=" text-sm font-medium text-gray-700">Product is_tranding: </label>
        <input type="checkbox" {{$product->is_tranding ? 'checked' : ''}} name="is_tranding" value="1" id="is_tranding" class="mt-1 " placeholder="product is_tranding">
        <div id="is_tranding_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="form-group my-3 flex items-center gap-3">
        <label for="is_hot" class=" text-sm font-medium text-gray-700">Product is_hot: </label>
        <input type="checkbox" {{$product->is_hot ? 'checked' : ''}} name="is_hot" value="1" id="is_hot" class="mt-1 " placeholder="product is_hot">
         <div id="is_hot_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="form-group my-3 flex items-center gap-3">
        <label for="is_new" class=" text-sm font-medium text-gray-700">Product is_new: </label>
        <input type="checkbox" {{$product->is_new ? 'checked' : ''}} name="is_new" value="1" id="is_new" class="mt-1   " placeholder="product is_new">
         <div id="is_new_error" class="text-red-700 text-[11px]"></div>

    </div>
   

    <div class="col-span-5 form-group my-3">
        <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
        <textarea type="text" name="description" id="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Product Description">{{$product->description ?? ''}}</textarea>
         <div id="description_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="col-span-5 form-group my-3">
        <label for="short_description" class="block text-sm font-medium text-gray-700">Product Short Description</label>
        <input type="text" value="{{$product->short_description ?? ''}}" name="short_description" id="short_description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product short description">
        <div id="short_description_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="col-span-3 form-group my-3">
        <label for="Key_features" class="block text-sm font-medium text-gray-700">Product Key Features</label>
        <input type="text" value="{{implode(',', $product->key_features ?? [''])}}" name="key_features" id="Key_features" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product key features">
        <div id="key_features_error" class="text-red-700 text-[11px]"></div>
    </div>
     <div class="form-group my-3 flex items-center flex-col gap-3">
        <label for="has_variants" class=" text-sm font-medium text-gray-700">Product Has Variants: </label>
        <input type="checkbox" {{$product->has_variants ? 'checked' : ''}} name="has_variants" value="1" id="has_variants" class="mt-1   " placeholder="product is_new">
                        <div id="has_variant_error" class="text-red-700 text-[11px]"></div>

    </div>
     <div class="form-group my-3 flex items-center flex-col gap-3">
        <label for="variant_type" class=" text-sm font-medium text-gray-700">Product Variant Type: </label>
        <input type="text" name="variant_type" value="{{$product->variant_type}}" id="variant_type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="product variant type">
                        <div id="variant_type_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="col-span-2 form-group my-3">
        <label for="main_image" class="block text-sm font-medium text-gray-700">Product Image</label>
        <img src="{{asset($product?->main_image)}}" alt="" class="mb-2 w-[100px] h-[100px] object-cover border border-gray-300 rounded-md shadow-sm">
        <input type="file" name="main_image" id="main_image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <div id="main_image_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="col-span-3 form-group my-3">
        <label for="gallery_images" class="block text-sm font-medium text-gray-700">Product Gallery Images</label>
        <div class="images flex gap-2">
        @forelse ($product->gallery_images ?? [] as $image)
    <img src="{{ asset($image) }}" 
         class="mb-2 w-[100px] h-[100px] object-cover border border-gray-300 rounded-md shadow-sm">
@empty
    <p>No images available</p>
@endforelse
          </div>
        <input type="file" multiple name="gallery_images[]" id="gallery_images" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <div id="images_gallery_error" class="text-red-700 text-[11px]"></div>

    </div>
    <div class="add-product-btn col-span-5 flex justify-end">
        <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-500 hover:shadow-xl px-3 py-1 rounded-xl text-white">{{$product->id ? 'Update' : 'Add'}} Product</button>
    </div>
</form>