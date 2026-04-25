<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
@vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- datatable link --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
    <title>Document</title>
</head>
<body>
<div class="main flex">
    <div class="sidebar">
        @include('admin.partials.sidebar')
    </div>
    <div class="main-content px-3 w-full">
        <nav class="py-3 flex justify-between items-center">
            <div class="logo">
                <h2 class="text-2xl font-bold">Dashboard</h2>
            </div>
            <div class="admin-user flex items-center gap-2">
                <div class="px-3 py-1 text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-full text-2xl font-bold ">A</div>
                <div class="text-[12px]">
                    <p class="text-sm font-[500]">Admin</p>
                    <p class="text-gray-500">ansarikafi757@gmail.com</p>
                </div>
                <a href="/admin/logout" class="btn">Logout</a>
            </div>
        </nav> <hr>
        <div class="content py-5">
            @yield('admin-content')
        </div>
    </div>
</div>

{{-- modals --}}
<!-- You can open the modal using ID.showModal() method -->
<dialog id="my_modal_4" class="modal">
  <div class="modal-box w-11/12 max-w-5xl">
    <form method="dialog">
       <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
     </form>
    <div class="modal4">
        
    </div>
  </div>
</dialog>


     {{-- jquery cdn --}}
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
    {{-- datatable script --}}
    <script src="//cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
    <script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    </script>
    @yield('admin-scripts')
</body>
</html>