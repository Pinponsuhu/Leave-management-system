@extends('layout.admin.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll px-8">
        @include('layout.admin.nav')
        <div class="mt-4">
            <h1 class="text-2xl font-bold uppercase text-amber-400 mb-4">Leave Details</h1>
            <div class="flex justify-between items-center">
                <h1 class="text-2xl capitalize font-bold my-2">{{ $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname }}</h1>
                <div class="flex gap-x-3 items-center">
                    @if ($leave->status == 'Pending')
                    <a href="#" onclick="open_action()" class="px-4 py-1.5 text-white bg-green-400 rounded-sm">Action</a>
                    <form action="/user/leave/delete/{{ Crypt::encrypt($leave->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-6 py-1.5 text-white bg-red-400 rounded-sm">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
            <div>
                <div class="flex gap-x-5 mt-1 items-center py-2">
                    <label class="font-bold text-lg ">Leave Type:</label>
                    <p>{{ $leave->leave_type }} Leave</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-2">
                    <label class="font-bold text-lg ">Status:</label>
                    @if ($leave->status == 'Pending')
                    <span class="py-1.5 font-bold rounded-full px-6 text-white bg-orange-400">{{ $leave->status }}</span>
                @elseif ($leave->status == 'Approved')
                    <span class="py-1.5 font-bold rounded-full px-6 text-white bg-green-400">{{ $leave->status }}</span>
                @else
                    <span class="py-1.5 font-bold rounded-full px-6 text-white bg-red-300">{{ $leave->status }}</span>
                @endif
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-2">
                    <label class="font-bold text-lg ">From:</label>
                    <p>{{ $leave->from }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-2">
                    <label class="font-bold text-lg ">To:</label>
                    <p>{{ $leave->to }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-2">
                    <label class="font-bold text-lg ">Created on:</label>
                    <p>{{ $leave->created_at->format("Y-m-d") }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-2">
                    <label class="font-bold text-lg ">Approved by:</label>
                    <p>{{ $leave->approved_by }}</p>
                </div>
                <div class="flex gap-x-5 mt-1 items-center py-2">
                    <label class="font-bold text-lg ">Approved on:</label>
                    <p>{{ $leave->approved_on }}</p>
                </div>
                <div class="flex flex-col gap-x-5 mt-1 py-2">
                    <label class="font-bold text-lg ">Remark:</label>
                    <p>{{ $leave->remark }}</p>
                </div>
            </div>
        </div>
    </main>
    <div class="w-screen h-screen hidden bg-gray-900 bg-opacity-75 fixed" id="action_container">
        <div class="mt-20 md:w-96 w-80 p-4 rounded-md bg-white mx-auto ">
            <div class="flex justify-end">
                <i class="fa fa-times text-xl cursor-pointer" onclick="close_action()"></i>
            </div>
            <form action="/admin/update/status/{{ Crypt::encrypt($leave->id) }}" method="POST" class="mt-4">
                @csrf
                <div>
                    <label class="text-md block font-bold text-gray-900">Change Status</label>
                    <select name="status" class="py-3 shadow-sm rounded-md px-2 w-full border-l-4 outline-none mt-1 border-amber-400" id="">
                        @foreach ($status as $stat)
                            @if ($stat != $leave->status)
                                <option value="{{ $stat }}">{{ $stat }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mt-2">
                    <label class="text-md block font-bold text-gray-900">Add Remark</label>
                    <textarea name="remark" id="" class="border-l-4 shadow-sm resize-none border-amber-400 rounded-md p-2 outline-none block w-full mt-1" placeholder="Add remark here" cols="30" rows="3"></textarea>
                </div>
                <button class="border-l-4 border-gray-900 bg-amber-400 text-white font-bold block w-28 py-3 mx-auto mt-2 rounded-md">Submit</button>
            </form>
        </div>
    </div>
    <script>
        function open_action(){
            document.getElementById('action_container').classList.remove('hidden');
        }
        function close_action(){
            document.getElementById('action_container').classList.add('hidden');
        }
    </script>
@endsection
