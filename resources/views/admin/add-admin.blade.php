@extends('layout.admin.app')
@section('content')
    <main class="w-full px-8 h-full overflow-y-scroll">
        @include('layout.admin.nav')
        <div class="mt-4">
            <h1 class="text-xl md:text-2xl font-bold text-amber-400 uppercase">Add new Admin</h1>
            <form action="/new/admin" enctype="multipart/form-data" class="w-full md:w-9/12 items-center gap-x-6 mx-auto mt-4 grid md:grid-cols-2" method="post">
                @csrf
                <div class="mt-2 md:mt-4">
                    <label class="font-bold text-md mb-1.5 block">Profile Picture</label>
                    <input type="file" name="picture" class="w-full block py-3 rounded-md bg-white px-3 capitalize shadow-md" id="">
                    @error('picture')
                        <p class="mt-0.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2 md:mt-4">
                    <label class="font-bold text-md mb-1.5 block">Fullname</label>
                    <input type="text" name="fullname" placeholder="Input Fullname" class="w-full block py-3 rounded-md bg-white px-3 capitalize shadow-md" id="">
                    @error('fullname')
                        <p class="mt-0.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2 md:mt-4">
                    <label class="font-bold text-md mb-1.5 block">Username</label>
                    <input type="text" name="username" placeholder="Input Username" class="w-full block py-3 rounded-md bg-white px-3 capitalize shadow-md" id="">
                    @error('username')
                        <p class="mt-0.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2 md:mt-4">
                    <label class="font-bold text-md mb-1.5 block">Phone Number</label>
                    <input type="text" name="phone_number" placeholder="Input Phone number" class="w-full block py-3 rounded-md bg-white px-3 capitalize shadow-md" id="">
                    @error('phone_number')
                        <p class="mt-0.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2 md:mt-4">
                    <label class="font-bold text-md mb-1.5 block">Email Address</label>
                    <input type="email" name="email" placeholder="Input Email Address" class="w-full block py-3 rounded-md bg-white px-3 capitalize shadow-md" id="">
                    @error('email')
                        <p class="mt-0.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="font-bold text-md mb-1.5 block">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="w-full block py-3 rounded-md bg-white px-3 shadow-md" id="">
                    @error('date_of_birth')
                        <p class="mt-0.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2 md:mt-4">
                    <label class="font-bold text-md mb-1.5 block">Admin Level</label>
                    <select name="admin_level" class="w-full block py-3 rounded-md bg-white px-3 shadow-md" id="">
                        <option value="" disabled selected>-- Select Admin Level --</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    @error('admin_level')
                        <p class="mt-0.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2 md:mt-4">
                    <label class="font-bold text-md mb-1.5 block">Password</label>
                    <input type="password" placeholder="Input Password" name="password" class="w-full block py-3 rounded-md bg-white px-3 capitalize shadow-md" id="">
                    @error('password')
                        <p class="mt-0.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2 md:mt-4">
                    <label class="font-bold text-md mb-1.5 block">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Repeat Password" class="w-full block py-3 rounded-md bg-white px-3 capitalize shadow-md" id="">
                </div>
                <button class="py-3 w-32 mt-4 rounded-md bg-amber-400 text-white font-bold block mx-auto md:col-span-2">Submit</button>
            </form>
        </div>
    </main>
@endsection
