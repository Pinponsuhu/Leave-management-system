@extends('layout.users.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll px-6">
        @include('layout.users.nav')
        <h1 class="text-2xl font-bold uppercase mb-4">Dashboard <i class="fa fa-chart-pie text-amber-400"></i></h1>
        <div class="mt-5">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-y-8 gap-x-4">
                <div class="w-64 mx-auto p-8 flex gap-x-3 shadow-sm rounded-md bg-green-100 text-black">
                    <div class=" w-8 h-8 rounded-full flex justify-center items-center bg-green-400 text-white">
                        <i class="fa fa-user text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl">Leave</h1>
                        <h1 class="font-bold text-xl">{{ $leaves_count }}</h1>
                    </div>
                </div>
                <div class="w-64 mx-auto p-8 flex gap-x-3 shadow-sm rounded-md bg-blue-100 text-black">
                    <div class=" w-8 h-8 rounded-full flex justify-center items-center bg-blue-400 text-white">
                        <i class="fa fa-check text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl">Approved</h1>
                        <h1 class="font-bold text-xl">{{ $approved }}</h1>
                    </div>
                </div>
                <div class="w-64 mx-auto p-8 flex gap-x-3 shadow-sm rounded-md bg-fuchsia-100 text-black">
                    <div class=" w-8 h-8 rounded-full flex justify-center items-center bg-fuchsia-400 text-white">
                        <i class="fa fa-clock text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl">Pending</h1>
                        <h1 class="font-bold text-xl">{{ $pending }}</h1>
                    </div>
                </div>
                <div class="w-64 mx-auto p-8 flex gap-x-3 shadow-sm rounded-md bg-red-100 text-black">
                    <div class=" w-8 h-8 rounded-full flex justify-center items-center bg-red-400 text-white">
                        <i class="fa fa-times text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl">Cancelled</h1>
                        <h1 class="font-bold text-xl">{{ $cancelled }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

