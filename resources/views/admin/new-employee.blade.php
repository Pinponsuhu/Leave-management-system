@extends('layout.admin.app')
@section('content')
    <main class="w-full px-8 h-full overflow-y-scroll">
        @include('layout.admin.nav')
        <div>
            <h1 class="text-xl md:text-2xl text-amber-400 font-bold uppercase mb-4">Register new employee</h1>
            <form action="/new/employee" enctype="multipart/form-data" method="POST" class="md:w-8/12 w-full mx-auto grid gap-x-4 items-center md:grid-cols-2">
                @csrf
                <div class="mt-4">
                    <label class="text-md mb-1.5 block font-bold">Profile Picture</label>
                    <input type="file" name="picture" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
                    @error('picture')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="text-md mb-1.5 block font-bold">Employee ID</label>
                    <input type="text" name="employee_id" placeholder="Input ID number" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
                    @error('employee_id')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="text-md mb-1.5 block font-bold">Firstname</label>
                    <input type="text" name="firstname" placeholder="Input Firstname" class="capitalize block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
                    @error('firstname')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="text-md mb-1.5 block font-bold">Middlename</label>
                    <input type="text" name="middlename" placeholder="Input Middlename" class="capitalize block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
                    @error('middlename')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="text-md mb-1.5 block font-bold">Lastname</label>
                    <input type="text" name="lastname" placeholder="Input Lastname" class="capitalize block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
                    @error('lastname')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="text-md mb-1.5 block font-bold">Gender</label>
                    <select name="gender" class="block w-full bg-white shadow-md p-3 rounded-sm outline-none" id="">
                        <option value="" disabled selected>-- Select Gender --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="text-md mb-1.5 block font-bold">Email Address</label>
                    <input type="email" name="email" placeholder="Input Email Address" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
                    @error('email')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="text-md mb-1.5 block font-bold"> Phone Number</label>
                    <input type="text" name="phone_number" placeholder="Input Phone Number" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
                    @error('phone_number')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="text-md mb-1.5 block font-bold">Department</label>
                    <input type="department" name="department" placeholder="Input Department" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
                    @error('department')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <button class="block md:col-span-2 w-32 mx-auto py-3 mt-3 bg-amber-400 text-white rounded-md text-center">Submit</button>
            </form>
        </div>
    </main>
@endsection
