@extends('layout.users.app')
@section('content')
    <main class="w-full px-8">
        @include('layout.users.nav')
        <h1 class="text-2xl text-amber-400 mt-3 font-bold uppercase">Edit User profile picture</h1>
        <form action="" class="mt-4">
            <label class="font-bold block mb-1">Profile Picture</label>
            <input type="file" class="block bg-white w-80 shadow-md py-3 px-2 rounded-md">
            <button class="block py-3 mt-4 bg-amber-400 text-white w-32 rounded-md">Submit</button>
        </form>
    </main>
@endsection
