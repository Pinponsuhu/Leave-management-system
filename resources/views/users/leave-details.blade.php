@extends('layout.users.app')
@section('content')
    <main class="w-full px-8">
        @include('layout.users.nav')
        <div class="mt-4">
            <div class="flex justify-between items-center md:px-4">
                <h1 class="text-xl md:text-2xl font-bold uppercase text-amber-400 mb-4">Leave Details</h1>
                <div class="flex gap-x-3 items-center">
                    @if ($leave->status == 'Pending')
                    <a href="/user/leave/edit/{{ Crypt::encrypt($leave->id) }}" class="px-4 py-1.5 text-white bg-green-400 rounded-sm">Edit</a>
                    <form action="/user/leave/delete/{{ Crypt::encrypt($leave->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-6 py-1.5 text-white bg-red-400 rounded-sm">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
            <div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Leave Type:</label>
                    <p>{{ $leave->leave_type }} Leave</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Status:</label>
                    @if ($leave->status == 'Pending')
                    <span class="py-1.5 font-bold rounded-full px-6 text-white bg-orange-400">{{ $leave->status }}</span>
                @elseif ($leave->status == 'Approved')
                    <span class="py-1.5 font-bold rounded-full px-6 text-white bg-green-400">{{ $leave->status }}</span>
                @else
                    <span class="py-1.5 font-bold rounded-full px-6 text-white bg-red-300">{{ $leave->status }}</span>
                @endif
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">From:</label>
                    <p>{{ $leave->from }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">To:</label>
                    <p>{{ $leave->to }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Created on:</label>
                    <p>{{ $leave->created_at->format("Y-m-d") }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Approved by:</label>
                    <p>{{ $leave->approved_by }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Approved on:</label>
                    <p>{{ $leave->approved_on }}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
