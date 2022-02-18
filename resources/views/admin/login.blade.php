<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leave management system</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/all.min.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'Ubuntu', sans-serif;
    }
</style>
</head>
<body class="bg-amber-50">
    <div class="mt-20 w-10/12 mx-auto md:w-4/12">
    <form action="/admin/login" method="POST" class="bg-amber-400 rounded-md shadow-md p-6 text-white">
        @csrf
        <div class=" flex items-center gap-x-4 justify-center px-8">
            <img src="{{ asset('images/lasu.png') }}" alt="" class="w-16 h-16">
            <h1 class="font-bold text-xl text-white">LASU-LMS - Admin</h1>
        </div>
        @if (session('message'))
            <p class="my-3 text-md text-red-50 text-center">{{ session('message') }}</p>
        @endif
        <div class="">
            <label class="text-md block w-full mt-1.5 font-bold">ID</label>
            <input type="text" name="username" placeholder="Input Username" class="p-3 text-amber-400 block w-full mt-1.5 rounded-md outline-none" id="">
        </div>
        <div class="">
            <label class="text-md block w-full mt-1.5 font-bold">Password</label>
            <input type="password" name="password" placeholder="Password" class="p-3 text-amber-400 block w-full mt-1.5 rounded-md outline-none" id="">
        </div>
        <button class="bg-white  text-amber-400 rounded-md block w-32 py-3 hover:bg-gray-100 text-center font-medium mt-3 outline-none">Sign in</button>
    </form>
</body>
</html>
