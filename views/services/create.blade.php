@extends('layouts.adminlayout')

@section('title', 'Add New Service')

@section('content')

    @if(session('fail'))
        <div class="text-red-600 mb-4">{{ session('fail') }}</div>
    @endif

    <div class="mb-6">
        <a href="{{ route('services.index') }}" class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
            ← Back to Service List
        </a>
    </div>

    <div class="bg-white rounded shadow p-6 w-full max-w-xl mx-auto">
        <h2 class="text-2xl font-semibold mb-6">Add New Service</h2>

        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="serviceName" class="block font-medium mb-1">Service Name</label>
                <input type="text" name="serviceName" id="serviceName" value="{{ old('serviceName') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('serviceName')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="serviceImage" class="block font-medium mb-1">Service Image</label>
                <input type="file" name="serviceImage" id="serviceImage" class="w-full px-4 py-2 border border-gray-300 rounded">
                @error('serviceImage')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full">
                    Add Service
                </button>
            </div>
        </form>
    </div>

@endsection
