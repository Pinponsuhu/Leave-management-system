@extends('layout.admin.app')
@section('content')
    <main class="w-full px-8">
        @include('layout.admin.nav')
        <h1 class="text-xl md:text-2xl font-bold text-amber-400 my-3 uppercase">change Profile Picture</h1>
        <div class="w-60 h-60 rounded-md shadow-md">
            <img src="{{ '/storage/admins/' . auth()->guard('admin')->user()->picture }}" class="w-60 rounded-md h-60" alt="Profile Picture">
        </div>

        <form action="/admin/change/picture" class="mt-4" method="post" enctype="multipart/form-data">
            @csrf
            <label class="font-bold my-2">New Picture</label>
            <input type="file" name="picture" class="py-3 block w-80 px-3 bg-white rounded-md shadow-md">
            <button class="bg-amber-400 text-white py-3 w-32 text-center mt-3 block rounded-md shadow-md">Submit</button>
        </form>
    </main>
@endsection
