@extends('layout.admin.app')
@section('content')
    <main class="w-full px-8">
        @include('layout.admin.nav')
        <h1 class="text-xl md:text-2xl font-bold text-amber-400 mt-3 uppercase">Profile Settings</h1>
            <div class="grid grid-cols-1 gap-y-4 md:grid-col-2 lg:grid-cols-3 w-11/12 mx-auto mt-4 gap-x">
                <a href="/admin/change/picture">
                    <div class="py-6 px-4 w-64 mx-auto shadow-md bg-lime-100 hover:bg-lime-200">
                        <div class="w-16 bg-white h-16 flex justify-center items-center mx-auto rounded-full">
                            <i class="fa fa-image text-lime-400 fa-2x"></i>
                        </div>
                        <h1 class="text-center text-xl font-bold text-lime-500 mt-1.5">Profile Picture</h1>
                    </div>
                </a>
                <a href="/admin/update/details">
                    <div class="py-6 px-4 w-64 mx-auto shadow-md bg-cyan-100 hover:bg-cyan-200">
                        <div class="w-16 bg-white h-16 flex justify-center items-center mx-auto rounded-full">
                            <i class="fa fa-user-plus fa-2x text-cyan-400"></i>
                        </div>
                        <h1 class="text-center text-xl font-bold text-cyan-500 mt-1.5">Admin Details</h1>
                    </div>
                </a>
                <a href="/admin/change/password">
                    <div class="py-6 px-4 w-64 mx-auto shadow-md bg-red-100 hover:bg-red-200">
                        <div class="w-16 bg-white h-16 flex justify-center items-center mx-auto rounded-full">
                            <i class="fa fa-user-lock fa-2x text-red-400"></i>
                        </div>
                        <h1 class="text-center text-xl font-bold text-red-500 mt-1.5">Change Password</h1>
                    </div>
                </a>

            </div>
    </main>
@endsection
