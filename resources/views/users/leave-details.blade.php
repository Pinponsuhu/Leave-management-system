@extends('layout.users.app')
@section('content')
    <main class="w-full overflow-y-scroll px-8">
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
                    <p>{{ $leave->date_commence }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">To:</label>
                    <p>{{ $leave->date_end }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Grade/Level:</label>
                    <p>{{ $leave->level }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Date of appointment to the present designation:</label>
                    <p>{{ $leave->designation }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Date Resumed duty from last leave:</label>
                    <p>{{ $leave->date_last }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Leave due for current year:</label>
                    <p>{{ $leave->date_due }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Date for commencement of leave:</label>
                    <p>{{ $leave->date_commence }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Date leave to end:</label>
                    <p>{{ $leave->date_end }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Address and Phone number while on leave:</label>
                    <p>{{ $leave->details }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Created on:</label>
                    <p>{{ $leave->created_at->format("Y-m-d") }}</p>
                </div>
                @if ($leave->status != 'Pending')
                <div class="flex gap-x-5 mt-1 items-center py-3">
                    <label class="font-bold text-lg ">Remark:</label>
                    <p>{{ $leave->remark }}</p>
                </div>
                @endif
            </div>
        </div>
    </main>
@endsection
