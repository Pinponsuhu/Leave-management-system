<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leave Management System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/all.min.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'Ubuntu', sans-serif;
    }
    *::-webkit-scrollbar {
    width: 7px;
}
    *::-webkit-scrollbar-track {
    background: #f1f1f1;
}
/* Handle */
*::-webkit-scrollbar-thumb {
    background: rgb(255, 200, 82);
}
/* Handle on hover */
*::-webkit-scrollbar-thumb:hover {
    background: #d6900d;
}
</style>
</head>
<body class="flex h-screen bg-amber-50 bg-opacity-60">
    <nav id="nav_cont" class="w-72 z-40 fixed md:relative hidden md:block h-screen px-4 pb-12 pt-4 overflow-y-scroll bg-amber-400 text-white">
        <div class="flex justify-between md:justify-start gap-x-4 py-4 bg-white px-4 rounded-md items-center text-amber-400">
            <div class="flex items-center gap-x-5">
                <img src="{{ asset('images/lasu.png') }}" class="w-12 h-12" alt="">
                <h1 class="text-2xl font-bold">Lv-MS</h1>
            </div>
            <i class="fa fa-times text-2xl md:hidden" onclick="close_nav()"></i>
        </div>

        <div class="mt-3">
            <ul>
                <li class="gap-x-2 text-md font-medium hover:text-amber-400 flex items-center mb-2 p-3 bg-opacity-10 rounded-md hover:bg-amber-50"><div class="w-10 h-10 bg-white text-amber-300 rounded-full flex justify-center items-center"><i class="fa fa-chart-pie"></i></div><a href="/admin/dashboard">Dashboard</a></li>
                <li class="gap-x-2 text-md font-medium hover:text-amber-400 flex items-center mb-2 p-3 bg-opacity-25 rounded-md hover:bg-amber-50"><div class="w-10 h-10 bg-white text-amber-300 rounded-full flex justify-center items-center"><i class="fa fa-users"></i></div><a href="/all/employee">All Employees</a></li>
                <li class="gap-x-2 text-md font-medium  flex items-center mb-2 p-3 bg-opacity-25 rounded-md"><div class="w-10 h-10 bg-white text-amber-300 rounded-full flex justify-center items-center"><i class="fa fa-user-plus"></i></div>Add New</li>
                <ol class="ml-14">
                    <li class="py-1.5 text-sm font-bold my-1"><a href="/new/employee">Employee</a></li>
                    @if (auth()->guard('admin')->user()->admin_level == '1')
                        <li class="py-1.5 text-sm font-bold my-1"><a href="/new/admin">Admin</a></li>
                    @endif
                </ol>
                <li class="gap-x-2 text-md font-medium hover:text-amber-400 flex items-center mb-2 p-3 bg-opacity-25 rounded-md hover:bg-amber-50"><div class="w-10 h-10 bg-white text-amber-300 rounded-full flex justify-center items-center"><i class="fa fa-envelope-open"></i></div><a href="/admin/leave/history/{{ Crypt::encrypt('All') }}">All Leaves</a></li>
                <li class="gap-x-2 text-md font-medium hover:text-amber-400 flex items-center mb-2 p-3 bg-opacity-25 rounded-md hover:bg-amber-50"><div class="w-10 h-10 bg-white text-amber-300 rounded-full flex justify-center items-center"><i class="fa fa-envelope"></i></div><a href="/admin/leave/request">Leave Request</a></li>
                <li class="gap-x-2 text-md font-medium hover:text-amber-400 flex items-center mb-2 p-3 bg-opacity-25 rounded-md hover:bg-amber-50"><div class="w-10 h-10 bg-white text-amber-300 rounded-full flex justify-center items-center"><i class="fa fa-user-check"></i></div><a href="/admin/active/leaves">Active leave</a></li>
                <li class="gap-x-2 text-md font-medium hover:text-amber-400 flex items-center mb-2 p-3 bg-opacity-25 rounded-md hover:bg-amber-50"><div class="w-10 h-10 bg-white text-amber-300 rounded-full flex justify-center items-center"><i class="fa fa-user-cog"></i></div><a href="/admin/setting">Settings</a></li>
            </ul>
        </div>
        <form method="POST" class="fixed bottom-3" action="/admin/logout">
            @csrf
            <button class="text-amber-400 hover:bg-gray-50 flex items-center justify-center bg-white py-3 gap-x-3 w-32 rounded-md mx-auto text-center">Logout <i class="fa fa-power-off"></i></button>
        </form>
    </nav>
    <div onclick="open_nav()" class="fixed top-4 bg-amber-50 left-3 flex justify-center w-10">
        <i class="fa fa-bars text-4xl text-amber-400"></i>
    </div>
    @yield('content')
    <script>
        function open_nav(){
            document.getElementById('nav_cont').classList.remove('hidden');
        }
        function close_nav(){
            document.getElementById('nav_cont').classList.add('hidden');
        }
    </script>
</body>
</html>

