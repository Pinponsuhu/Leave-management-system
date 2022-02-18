@extends('layout.users.app')
@section('content')
    <main class="w-full px-6">
        @include('layout.users.nav')
        <h1 class="text-xl md:text-2xl font-bold uppercase text-amber-400 mb-4">Apply for leave</h1>
        <form action="/user/leave/edit/{{ Crypt::encrypt($leave->id) }}" method="POST" class="md:w-8/12 mx-auto grid md:grid-cols-2 gap-x-4 px-6 items-center">
            @method('PUT')
            @csrf
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Employee ID</label>
                <input type="text" name="employee_id" value="{{ auth()->user()->employee_id }}" readonly class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">Leave Type</label>
                <select name="leave_type" class="block w-full bg-white shadow-md p-3 rounded-sm outline-none" id="">
                    <option value="{{ $leave->leave_type }}">{{ $leave->leave_type }}</option>
                    @foreach ($types as $type)
                    @if ($type != $leave->leave_type)
                    <option value="{{ $type }}">{{ $type }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">From</label>
                <input type="date" name="from" value="{{ $leave->from }}" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-4">
                <label class="text-md mb-1.5 block font-bold">To</label>
                <input type="date" name="to" value="{{ $leave->to }}" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            </div>
            <button class="mdLcol-span-2 block w-32 rounded-md text-white bg-amber-300 hover:bg-amber-400 text-center mt-3 py-3">Submit</button>
        </form>
    </main>
@endsection
