@extends('layout.users.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll px-6">
        @include('layout.users.nav')
        <h1 class="text-xl md:text-2xl font-bold uppercase text-amber-400 mb-4">Apply for leave</h1>
        <form action="/user/leave/edit/{{ Crypt::encrypt($leave->id) }}" method="POST" enctype="multipart/form-data" class="w-full md:w-8/12 mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-x-4 px-6 items-center">
            @csrf
            @method('PUT')
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Employee Name</label>
                <input type="text" name="employee_id" value="{{ auth()->user()->firstname . ' ' . auth()->user()->lastname . ' ' . auth()->user()->middlename }}" readonly class="block w-full bg-white shadow-md text-amber-400 p-3 rounded-md outline-none">
            </div>
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Leave Type</label>
                <select name="leave_type" class="block w-full bg-white shadow-md p-3 rounded-sm outline-none" id="">
                    @foreach ($types as $type)
                        @if ($type == $leave->leave_type)
                            <option selected value="{{ $type }}">{{ $type }}</option>
                            @else
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endif
                    @endforeach
                </select>
            @error('leave_type')
    <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Marital Status</label>
                <input type="text" value="{{ $leave->marital }}" name="marital" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('marital')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">School/Faculty</label>
                <input type="text" value="{{ $leave->school }}" name="school" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('school')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class=" mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Date of first appointment</span></label>
                <input type="date" value="{{ $leave->date_app }}" name="date_app" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('date_app')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class=" mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Present Designation</span></label>
                <input type="text" value="{{ $leave->designation }}" name="designation" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('designation')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Grade/Level</span></label>
                <input type="text" value="{{ $leave->level }}" name="level" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('level')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="mt-2 lg:col-span-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Date of appointment to the present designation</span></label>
                <input type="date" value="{{ $leave->date_designation }}" name="date_designation" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('date_designation')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="mt-2 lg:col-span-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Date Resumed duty from last leave</span></label>
                <input type="date" value="{{ $leave->date_last }}" name="date_last" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('date_last')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Leave due for current year</span></label>
                <input type="date" value="{{ $leave->date_due }}" name="date_due" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('date_due')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="mt-2 lg:col-span-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Date for commencement of leave</span></label>
                <input type="date" value="{{ $leave->date_commence }}" name="date_commence" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('date_commence')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="mt-2 md:mt-2">
                <label class="text-md mb-1.5 block font-bold">Date leave to end</span></label>
                <input type="date" value="{{ $leave->date_end }}" name="date_end" class="block w-full bg-white shadow-md p-3 rounded-md outline-none">
            @error('date_end')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="mt-2 md:mt-2 md:col-span-3">
                <label class="text-md mb-1.5 block font-bold">Address and Phone number while on leave</label>
                <textarea name="details" id="" class="block w-full bg-white shadow-md p-3 rounded-md outline-none resize-none" rows="4">{{ $leave->details }}</textarea>
            @error('details')
                <p class="text-sm my-2 text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <button class="md:col-span-2 block w-32 rounded-md text-white bg-amber-300 hover:bg-amber-400 text-center mt-3 py-3">Submit</button>
        </form>
    </main>
@endsection
