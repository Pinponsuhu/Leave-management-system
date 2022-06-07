@extends('layout.admin.app')
@section('content')
<main class="w-full px-8">
    @include('layout.admin.nav')
    <h1 class="text-xl md:text-2xl font-bold uppercase text-amber-400 mb-4">All Leave history</h1>
    <div class="md:flex md:justify-end grid grid-cols-2 gap-4 gap-x-3">
        <a href="/admin/leave/history/{{ Crypt::encrypt('All') }}" class="py-2 block text-center rounded-lg px-7 bg-blue-400 hover:bg-blue-500 text-white font-bold">All</a>
        <a href="/admin/leave/history/{{ Crypt::encrypt('Approved') }}" class="py-2 block text-center rounded-lg px-5 bg-green-400 hover:bg-green-500 text-white font-bold">Approved</a>
        <a href="/admin/leave/history/{{ Crypt::encrypt('Pending') }}" class="py-2 block text-center rounded-lg px-5 bg-amber-400 hover:bg-amber-500 text-white font-bold">Pending</a>
        <a href="/admin/leave/history/{{ Crypt::encrypt('Cancelled') }}" class="py-2 block text-center rounded-lg px-5 bg-red-400 hover:bg-red-500 text-white font-bold">Cancelled</a>
    </div>
    <h1 class="text-xl font-bold my-2 text-amber-400 capitalize text-center">Leave Type : {{ $status }}</h1>
    <div class="w-full mt-4 overflow-x-scroll shadow-md md:w-11/12 mx-auto">
        <table class="w-full">
            <thead class="bg-amber-400 text-white font-bold">
                <tr>
                    <td class="border-r-4 py-3 px-4 border-amber-200">Leave Type</td>
                    <td class="border-r-4 py-3 px-4 border-amber-200">From</td>
                    <td class="border-r-4 py-3 px-4 border-amber-200">To</td>
                    <td class="border-r-4 py-3 px-4 border-amber-200">Days</td>
                    <td class="border-r-4 py-3 px-4 border-amber-200">Status</td>
                    <td class="py-3 px-4">Created on</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaves as $leave)
                <tr>
                    <td class="py-3 px-4 bg-gray-100"><a href="/admin/leave/details/{{ Crypt::encrypt($leave->id) }}" class="underline">{{ $leave->leave_type }} Leave</a></td>
                    <td class="py-3 px-4 bg-gray-50">{{ $leave->date_commence }}</td>
                    <td class="py-3 px-4 bg-gray-100">{{ $leave->date_end }}</td>
                    <td class="py-3 px-4 bg-gray-50">@php
                        $from = $leave->date_commence;
                        $to = $leave->date_end;
                        $date1 = new DateTime($from);
                        $date2 = new DateTime($to);
                        $interval = $date1->diff($date2);
                        $days = $interval->format('%a');
                        echo $days;
                    @endphp</td>
                    <td class="py-3 px-4 bg-gray-100">@if ($leave->status == 'Pending')
                        <span class="py-1.5 rounded-full px-6 text-white bg-orange-400">{{ $leave->status }}</span>
                    @elseif ($leave->status == 'Approved')
                        <span class="py-1.5 rounded-full px-6 text-white bg-green-400">{{ $leave->status }}</span>
                    @else
                        <span class="py-1.5 rounded-full px-6 text-white bg-red-300">{{ $leave->status }}</span>
                    @endif </td>
                    <td class="py-3 px-4 bg-gray-50">{{ $leave->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4 w-full">
        {{ $leaves->links() }}
    </div>
</main>
@endsection
