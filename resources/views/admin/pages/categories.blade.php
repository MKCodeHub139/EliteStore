@extends('admin.index')
@section('admin-content')
<div class="">
    <div class="header flex justify-between items-center">
        <div class="title">
            <h2 class="text-2xl font-bold">Categories Management</h2>
            <p class="text-[12px] text-gray-600">Manage Your Categories</p>
        </div>
        <div class="add-category-btn product-modal-btn">
            <button class="bg-gradient-to-r from-blue-500 to-purple-500 hover:shadow-xl px-3 py-1 rounded-xl text-white"  onclick="my_modal_4.showModal()">+ Add Category</button>
        </div>
    </div>
    <div class="categories_cards flex gap-2 my-10">
        {{-- all categories --}}
    </div>
</div>
@endsection
@section('admin-scripts')
<script>
    $(document).ready(function(){
        $.ajax({
            url:'/admin/categories/data',
            method:'GET',
            success:function(response){
                $('.categories_cards').html(response);
            }
        })
    })
    $(document).on('click','.add-category-btn',function(){
        $.ajax({
            url:'/admin/categories/create',
            method:'GET',
            success:function(response){
                $('.modal4').html(response);
            }
        })
    })
    $(document).on('submit','.category-form',function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url:'/admin/categories/store',
            method:'POST',
            data:formData,
            processData:false,
            contentType:false,
            success:function(response){
                alert('Category created successfully');
                my_modal_4.close();
            }

        })
    })
   
</script>
@endsection
