@extends('admin.index')

@section('admin-content')
<div class="">
        <div class="header flex justify-between items-center">
        <div class="title">
            <h2 class="text-2xl font-bold">Users Management</h2>
            <p class="text-[12px] text-gray-600">Manage Your Users</p>
        </div>
        <div class="add-product-btn product-modal-btn">
            <button class="bg-gradient-to-r from-blue-500 to-purple-500 hover:shadow-xl px-3 py-1 rounded-xl text-white"  onclick="my_modal_4.showModal()">+ Add User</button>
        </div>
    </div>

    <table class="usersTable table">
        <thead class="">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Total Orders</th>
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
        $('.usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/users/data',
            columns: [
                { data: 'name', name: 'name' },
                {data:'phone', name:'phone'},
                { data: 'email', name: 'email' },
                { data: 'total_orders', name: 'total_orders' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection