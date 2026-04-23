<h2 class="text-2xl font-bold">Create Category</h2>
<form action="" class="my-10 grid grid-cols-2 gap-5 category-form">
    <div class="">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category Name</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 "placeholder="Enter category Name">
    </div>
    <div class="">
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Category slug</label>
        <input type="text" id="slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 "placeholder="Enter category slug">
    </div>
    <div class=" col-span-2">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Category Description</label>
        <textarea type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 "placeholder="Enter category description"></textarea>
    </div>
    <div class="">
        <label for="image_background_color" class="block mb-2 text-sm font-medium text-gray-900">Category image background color</label>
        <input type="color" id="image_background_color" name="image_background_color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 ">
    </div>
    <div class="">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Category Image</label>
        <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 ">
    </div>
    <div class="category-submit-btn col-span-2">
        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 to-purple-500 hover:shadow-xl px-3 py-1 rounded-xl">Create Category</button>
    </div>
</form>