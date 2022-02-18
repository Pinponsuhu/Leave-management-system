@extends('layout.users.app')
@section('content')
    <main class="w-full mt-4 px-8">
        @include('layout.users.nav')
        <h1 class="text-xl md:text-2xl font-bold uppercase text-amber-400 mt-2">Edit user details</h1>
        <form action="{{ route('user_details') }}" method="POST" class="md:w-8/12 mx-auto grid gap-x-4 items-center md:grid-cols-2">
            @csrf
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Firstname</label>
                <input type="text" name="firstname" value="{{ auth()->user()->firstname }}" placeholder="Input Firstname" class="capitalize block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Middlename</label>
                <input type="text" name="middlename" value="{{ auth()->user()->middlename }}" placeholder="Input Middlename" class="capitalize block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Lastname</label>
                <input type="text" name="lastname" value="{{ auth()->user()->lastname }}" placeholder="Input Lastname" class="capitalize block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Gender</label>
                <select name="gender" class="block w-full bg-white shadow-md p-3 rounded-sm outline-none" id="">
                    <option value="{{ auth()->user()->gender }}">{{ auth()->user()->gender }}</option>
                    @foreach ($gender as $gen)
                        @if ($gen != auth()->user()->gender)
                            <option value="{{ $gen }}">{{ $gen }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Email Address</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}" placeholder="Input Email Address" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold"> Phone Number</label>
                <input type="text" name="phone_number" value="{{ auth()->user()->phone_number }}" placeholder="Input Phone Number" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Department</label>
                <input type="text" name="department" value="{{ auth()->user()->department }}" placeholder="Input Department" class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <button class="block md:col-span-2 w-32 mx-auto py-3 mt-3 bg-amber-400 text-white rounded-md text-center">Submit</button>
        </form>
    </main>
@endsection
