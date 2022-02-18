@extends('layout.users.app')
@section('content')
    <main class="w-full px-8">
        @include('layout.users.nav')
        <h1 class="text-xl md:text-2xl font-bold text-amber-400 mt-3 uppercase">Profile Settings</h1>
            <div class="grid md:grid-cols-2 gap-y-4 lg:grid-cols-3 w-11/12 mx-auto mt-4 gap-x">
                <a href="/user/change/picture">
                    <div class="py-6 px-4 w-72 md:w-60 mx-auto shadow-md bg-lime-100">
                        <div class="w-16 bg-white h-16 flex justify-center items-center mx-auto rounded-full">
                            <i class="fa fa-image text-lime-400 fa-2x"></i>
                        </div>
                        <h1 class="text-center text-xl font-bold text-lime-500 mt-1.5">Profile Picture</h1>
                    </div>
                </a>
                <a href="/user/details">
                    <div class="py-6 px-4 w-72 md:w-60 mx-auto shadow-md bg-cyan-100">
                        <div class="w-16 bg-white h-16 flex justify-center items-center mx-auto rounded-full">
                            <i class="fa fa-user-plus fa-2x text-cyan-400"></i>
                        </div>
                        <h1 class="text-center text-xl font-bold text-cyan-500 mt-1.5">Users Details</h1>
                    </div>
                </a>
                <a href="/user/change/password">
                    <div class="py-6 px-4 w-72 md:w-60 mx-auto shadow-md bg-red-100">
                        <div class="w-16 bg-white h-16 flex justify-center items-center mx-auto rounded-full">
                            <i class="fa fa-user-lock fa-2x text-red-400"></i>
                        </div>
                        <h1 class="text-center text-xl font-bold text-red-500 mt-1.5">Change Password</h1>
                    </div>
                </a>

            </div>
    </main>
@endsection
