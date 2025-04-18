@extends('layouts.adminlayout')

@section('title', 'Bookings')

@section('content')

<h2 class="text-2xl font-semibold mb-4">Bookings</h2>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<div class="flex justify-between items-center mb-4">
    <a href="{{ route('bookings.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Create New
    </a>
    
    <form action="{{ route('bookings.search') }}" method="GET" class="flex">
        <input type="text" name="search" placeholder="Search by name, phone or status..." 
               class="border rounded-l px-4 py-2 w-64" value="{{ request('search') }}">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700">
            Search
        </button>
        <a href="{{ route('bookings.search') }}" class="bg-gray-400 text-white px-4 py-2 rounded-r hover:bg-gray-500">
            Clear
        </a>
    </form>
    
</div>

<table class="w-full table-auto border-collapse bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3">Name</th>
            <th class="p-3">User Email</th> <!-- 👈 New column -->
            <th class="p-3">Date</th>
            <th class="p-3">Time</th>
            <th class="p-3">Phone</th>
            <th class="p-3">Message</th>
            <th class="p-3">Status</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
        <tr class="border-b">
            <td class="p-3">{{ $booking->bookingName }}</td>
            <td class="p-3">{{ $booking->user->email ?? 'N/A' }}</td>
            <td class="p-3">{{ $booking->date }}</td>
            <td class="p-3">{{ $booking->time }}</td>
            <td class="p-3">{{ $booking->phoneNumber }}</td>
            <td class="p-3">{{ $booking->message }}</td>
            <td class="p-3 capitalize">{{ $booking->status }}</td>
            <td class="p-3 space-y-1">
                <form action="{{ route('bookings.updateStatus', $booking->bookingId) }}" method="POST" class="space-y-1">
                    @csrf
                    @method('PUT')

                    <select name="status" class="border rounded p-1 w-full">
                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="accepted" {{ $booking->status === 'accepted' ? 'selected' : '' }}>Accept</option>
                        <option value="rejected" {{ $booking->status === 'rejected' ? 'selected' : '' }}>Reject</option>
                    </select>

                    <input type="text" name="message" value="{{ $booking->message }}" placeholder="Message (optional)" class="border rounded p-1 w-full">

                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 w-full">
                        Update
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@if($bookings->isEmpty())
<div class="text-center py-8 text-gray-500">
    <p>No bookings found matching your search criteria.</p>
</div>
@endif

@endsection
