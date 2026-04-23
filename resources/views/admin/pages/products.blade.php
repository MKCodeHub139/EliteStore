@extends('admin.index')
@section('admin-content')
    <div>
        <div class="header flex justify-between items-center">
            <div class="title">
                <h2 class="text-2xl font-bold">Products Management</h2>
                <p class="text-[12px] text-gray-600">Manage Your Products Inventory</p>
            </div>
            <div class="add-product-btn product-modal-btn">
                <button class="bg-gradient-to-r from-blue-500 to-purple-500 hover:shadow-xl px-3 py-1 rounded-xl text-white"
                    onclick="my_modal_4.showModal()">+ Add Product</button>
            </div>
        </div>
        {{-- datatable --}}
        <table class="product-table table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
@section('admin-scripts')
    <script>
        $(document).ready(function() {
            $('.product-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/products/data',
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'stock_quantity',
                        name: 'stock'
                    },
                    {
                        data: 'average_rating',
                        name: 'rating'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
        $(document).on('click', '.product-modal-btn', function() {
            let id = $(this).data('id');
            let url = id ? '/admin/products/edit/' + id : '/admin/products/create';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    // Show the create product form in a modal
                    $('.modal4').html(response);
                }
            })
        })
        $(document).on('submit', '#add-product-form', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let id = formData.get('id');
            let url = id ? '/admin/products/update/' + id : '/admin/products/store';
            // Add checkbox manually if it is unchecked
            ['is_featured', 'is_tranding', 'is_hot', 'is_new', 'has_variants'].forEach(function(name) {
                if (!$('input[name="' + name + '"]').is(':checked')) {
                    formData.append(name, 0);
                }
            });
            console.log(formData);

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success response, e.g., show a success message, close the modal, and refresh the product list
                    alert(response.message);
                    my_modal_4.close();
                    $('.product-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    if (xhr.status == 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key +'_error').text('*'+value[0])
                        })
                    }
                }

            })

        });
    </script>
@endsection
