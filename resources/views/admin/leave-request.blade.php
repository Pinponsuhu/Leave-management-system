@extends('layout.admin.app')
@section('content')
    <main class="w-full px-8">
        @include('layout.admin.nav')
        <div class="mt-4">
            <h1 class="text-xl md:text-2xl font-bold text-amber-400 uppercase mb-3">All Leave Request</h1>
            <div class="w-full md:w-11/12 overflow-x-scroll mx-auto">
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
                            <td class="py-3 px-4 bg-gray-50">{{ $leave->from }}</td>
                            <td class="py-3 px-4 bg-gray-100">{{ $leave->to }}</td>
                            <td class="py-3 px-4 bg-gray-50">@php
                                $from = $leave->from;
                                $to = $leave->to;
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
        </div>
    </main>
@endsection

