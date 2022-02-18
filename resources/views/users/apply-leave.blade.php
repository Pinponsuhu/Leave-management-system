@extends('layout.users.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll px-6">
        @include('layout.users.nav')
        <h1 class="text-xl md:text-2xl font-bold uppercase text-amber-400 mb-4">Apply for leave</h1>
        <form action="/apply" method="POST" enctype="multipart/form-data" class="w-full md:w-8/12 mx-auto grid md:grid-cols-2 gap-x-4 px-6 items-center">
            @csrf
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Employee ID</label>
                <input type="text" name="employee_id" value="{{ auth()->user()->employee_id }}" readonly class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Leave Type</label>
                <select name="leave_type" class="block w-full bg-white shadow-md p-3 rounded-sm outline-none" id="">
                    <option value="">-- Select Leave type --</option>
                    <option value="Casual">Casual</option>
                    <option value="Sick">Sick</option>
                    <option value="Study">Study</option>
                    <option value="Maternity">Maternity</option>
                    <option value="Sabbatical">Sabbatical</option>
                </select>
            </div>
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">From</label>
                <input type="date" name="from" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">To</label>
                <input type="date" name="to" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            </div>
            <div class="md:col-span-2 mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Attachment <span class="font-normal">(Optional)</span></label>
                <input type="file" name="attachments[]" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-2 md:col-span-2">
                <label class="text-md mb-1.5 block font-bold">Note <span class="font-normal">(Optional)</span></label>
                <textarea name="note" placeholder="Attach Note if any" id="" class="block w-full bg-white shadow-md p-3 rounded-md outline-none resize-none" rows="4"></textarea>
            </div>
            <button class="md:col-span-2 block w-32 rounded-md text-white bg-amber-300 hover:bg-amber-400 text-center mt-3 py-3">Submit</button>
        </form>
    </main>
@endsection
