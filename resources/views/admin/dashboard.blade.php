@extends('layout.admin.app')
@section('content')
    <main class="w-full px-6">
        @include('layout.admin.nav')
        <h1 class="text-2xl font-bold uppercase mb-4">Admin Dashboard <i class="fa fa-chart-pie text-amber-400"></i></h1>
        <div class="mt-5">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-8 gap-x-4">
                <div class="w-72 md:w-64 mx-auto p-8 flex gap-x-3 shadow-sm rounded-md bg-green-100 text-black">
                    <div class=" w-8 h-8 rounded-full flex justify-center items-center bg-green-400 text-white">
                        <i class="fa fa-users text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl">All Employees</h1>
                        <h1 class="font-bold text-xl">{{ $user_count }}</h1>
                    </div>
                </div>
                <div class="w-72 md:w-64 mx-auto p-8 flex gap-x-3 shadow-sm rounded-md bg-blue-100 text-black">
                    <div class=" w-8 h-8 rounded-full flex justify-center items-center bg-blue-400 text-white">
                        <i class="fa fa-check text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl">Active <br> Leave</h1>
                        <h1 class="font-bold text-xl">{{ $active_count }}</h1>
                    </div>
                </div>
                <div class="w-72 md:w-64 mx-auto p-8 flex gap-x-3 shadow-sm rounded-md bg-fuchsia-100 text-black">
                    <div class=" w-8 h-8 rounded-full flex justify-center items-center bg-fuchsia-400 text-white">
                        <i class="fa fa-clock text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl">Pending <br> Leave</h1>
                        <h1 class="font-bold text-xl">{{ $pend_count }}</h1>
                    </div>
                </div>
                <div class="w-72 md:w-64 mx-auto p-8 flex gap-x-3 shadow-sm rounded-md bg-red-100 text-black">
                    <div class=" w-8 h-8 rounded-full flex justify-center items-center bg-red-400 text-white">
                        <i class="fa fa-times text-xl"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl">Cancelled <br> Leave</h1>
                        <h1 class="font-bold text-xl">{{ $cancel_count }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

