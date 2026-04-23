@extends('admin.index')
@section('admin-content')
    <div>
        @if (@session('success'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endsession
            <div class="header flex justify-between items-center">
                <div class="title">
                    <h2 class="text-2xl font-bold">Order Management</h2>
                    <p class="text-[12px] text-gray-600">Manage Your Orders</p>
                </div>
                {{-- <div class="add-product-btn product-modal-btn">
            <button class="bg-gradient-to-r from-blue-500 to-purple-500 hover:shadow-xl px-3 py-1 rounded-xl text-white"  onclick="my_modal_4.showModal()">+ Add Product</button>
        </div> --}}
            </div>
            {{-- datatable --}}
            <div class="filter-by-status my-10">
                <label for="status-filter">Filter by Status:</label><br>
                <select name="status" id="status-filter" class="border w-[200px] rounded-xl py-1 px-2">
                    <option value="all">All</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                </select>
            </div>
            <table class="order-table table text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Order Number</th>
                        <th>Subtotal</th>
                        <th>Tax</th>
                        <th>Shipping Charge</th>
                        <th>Total</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Shipping Address</th>
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
            let status = $('#status-filter').val();
            $('.order-table').DataTable({
                preventDefault: true,
                serverSide: true,
                ajax: {
                    url: '/admin/orders/data',
                    data: function(d) {
                        d.status = $('#status-filter').val(); // 👈 yaha bhejna hai
                    }
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'order_number',
                        name: 'order_number'
                    },
                    {
                        data: 'subtotal',
                        name: 'subtotal'
                    },
                    {
                        data: 'tax',
                        name: 'tax'
                    },
                    {
                        data: 'shipping',
                        name: 'shipping_charge'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'payment_method',
                        name: 'payment_method'
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'shipping_adderess',
                        name: 'shipping_adderess'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions',
                        orderable: false,
                        searchable: false
                    }
                ]

            })
        })
        // edit modal open
        $(document).on('click', '.edit-order-btn', function() {
            let id = $(this).data('id');
            $.ajax({
                url: `/admin/orders/edit/${id}`,
                method: 'GET',
                success: function(res) {
                    $('.modal4').html(res);
                }
            })
        })
        $(document).on('click', '.order-qty-update button', function(e) {
            e.preventDefault();
            let quantity = $(this).closest('tr').find('input[name="quantity[]"]').val();
            let id = $(this).data('id');
            $.ajax({
                url: `/admin/orders/update-quantity/${id}`,
                method: 'POST',
                data: {
                    quantity: quantity
                },
                success: function(res) {
                    alert('Quantity updated successfully');
                }
            })
        })
        // edit order form submit
        $(document).on('submit', '.edit-order-form', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let formData = $(this).serialize();
            $.ajax({
                url: `/admin/orders/update-order/${id}`,
                method: 'POST',
                data: formData,
                success: function(res) {
                    alert('Order updated successfully');
                    location.reload();
                }
            })
        })
        // filter by status
        $(document).on('change', '#status-filter', function() {
            $('.order-table').DataTable().ajax.reload();
        });
    </script>
@endsection
