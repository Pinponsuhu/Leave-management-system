@extends('layout.admin.app')
@section('content')
    <main class="w-full mt-4 px-8">
        @include('layout.admin.nav')
        <h1 class="text-xl md:text-2xl font-bold uppercase text-amber-400 mt-2">Edit user details</h1>
        <form action="/admin/update/details" method="POST" class="w-full md:w-8/12 mx-auto grid gap-x-4 items-center md:grid-cols-2">
            @csrf
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Fullname</label>
                <input type="text" name="fullname" value="{{ auth()->guard('admin')->user()->fullname }}" placeholder="Input Firstname" class="capitalize block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Username</label>
                <input type="text" name="username" value="{{ auth()->guard('admin')->user()->username }}" placeholder="Input Middlename" class="capitalize block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Email Address</label>
                <input type="email" name="email" value="{{ auth()->guard('admin')->user()->email }}" placeholder="Input Email Address" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold"> Phone Number</label>
                <input type="text" name="phone_number" value="{{ auth()->guard('admin')->user()->phone_number }}" placeholder="Input Phone Number" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold"> Date of Birth</label>
                <input type="text" name="date_of_birth" value="{{ auth()->guard('admin')->user()->date_of_birth }}" placeholder="Input Phone Number" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold"> Admin level</label>
                <select name="admin_level" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none" id="">
                    <option value="{{ auth()->guard('admin')->user()->admin_level }}">{{ auth()->guard('admin')->user()->admin_level }}</option>
                    @for ($i = 0; $i <= 1; $i++)
                        @if ($i != auth()->guard('admin')->user()->admin_level)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <button class="block md:col-span-2 w-32 mx-auto py-3 mt-3 bg-amber-400 text-white rounded-md text-center">Submit</button>
        </form>
    </main>
@endsection
