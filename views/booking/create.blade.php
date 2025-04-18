@extends('layouts.adminlayout')

@section('title', 'Create Booking')

@section('content')

<h2 class="text-2xl font-semibold mb-4">Create Booking</h2>

@if(session('fail'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('fail') }}</div>
@endif

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('bookings.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-medium">User ID</label>
        <input type="number" name="userId" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Booking Name</label>
        <input type="text" name="bookingName" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Date</label>
        <input type="date" name="date" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Time</label>
        <input type="time" name="time" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Phone Number</label>
        <input type="text" name="phoneNumber" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Message</label>
        <textarea name="message" class="w-full border rounded px-3 py-2"></textarea>
    </div>

    <div>
        <label class="block font-medium">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2" required>
            <option value="pending" selected>Pending</option>
            <option value="accepted">Accepted</option>
            <option value="rejected">Rejected</option>
        </select>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Submit Booking
    </button>
</form>

@endsection
