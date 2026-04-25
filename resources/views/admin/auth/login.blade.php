<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body>
    <div class="wrapper flex items-center justify-center w-[100vw] h-[100vh]">
        <div class="login max-w-[500px] w-[400px] min-h-[300px] max-w-[500px] border rounded-2xl border-gray-300 shadow-2xl p-5">
            @if(session('success'))
            <div class="text-green-700 my-5">{{session('success')}}</div>
            @endif
            @if(session('error'))
            <div class="text-red-700 my-5">{{session('error')}}</div>
            @endif
            <h2 class="text-2xl font-[500]">Admin Login</h2>
            <form action="/admin/login" method="POST" class="flex flex-col my-5 gap-4">
                @csrf
                <div class="email flex flex-col gap-1">
                    <label for="" class="font-[500] text-[14px]">Email</label>
                    <input type="text" name="email" id="" class="w-full px-2 py-1 border border-gray-300 rounded-xl" placeholder="example@gmail.com" value="admin@gmail.com">
                </div>
                <div class="password flex flex-col gap-1">
                    <label for="" class="font-[500] text-[14px]">Password</label>
                    <input type="password" name="password" id="" class="w-full px-2 py-1 border border-gray-300 rounded-xl" placeholder="Password" value="12345678">
                </div>
                <div class="login-btn w-full">
                    <button type="submit" class="w-full py-2 bg-green-500 text-white font-[500] rounded-xl text-[15px] cursor-pointer hover:bg-green-600 transition-colors ">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>