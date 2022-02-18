@extends('layout.admin.app')
@section('content')
<main class="w-full px-8 ">
    @include('layout.admin.nav')
    <div class="flex justify-between my-5 items-center">
        <h1 class="text-xl md:text-2xl font-bold uppercase text-amber-400">All Employees</h1>
        <a href="/new/employee" class="bg-amber-400 px-6 py-3 rounded-md shadow-md text-white">Add New</a>
    </div>
    <div class=" overflow-x-scroll mt-4 w-full md:w-10/12 mx-auto">
        <table class="w-full">
            <thead class="bg-amber-400 text-white font-medium">
                <tr>
                    <td class="border-r-4 py-3 px-4 border-amber-200">Fullname</td>
                    <td class="border-r-4 py-3 px-4 border-amber-200">Department</td>
                    <td class="border-r-4 py-3 px-4 border-amber-200">Phone Number</td>
                    <td class="border-r-4 py-3 px-4 border-amber-200">Email Address</td>
                    <td class="py-3 px-4">ID Number</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="py-3 px-4 bg-gray-100">{{ $user->firstname . ' ' .$user->lastname }}</td>
                    <td class="py-3 px-4 bg-gray-50">{{ $user->department }}</td>
                    <td class="py-3 px-4 bg-gray-100">{{ $user->phone_number }}</td>
                    <td class="py-3 px-4 bg-gray-50">{{ $user->email }}</td>
                    <td class="py-3 px-4 bg-gray-100 ">{{ $user->employee_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
