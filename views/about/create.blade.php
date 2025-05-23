@extends('layouts.adminlayout')

@section('title', 'Create About Section')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Create About Section</h2>

@if($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md w-full max-w-xl">
    @csrf

    <div class="mb-4">
        <label for="aboutDesc" class="block font-medium mb-1">Description:</label>
        <textarea name="aboutDesc" id="aboutDesc" required class="w-full border border-gray-300 rounded p-2">{{ old('aboutDesc') }}</textarea>
    </div>

    <div class="mb-4">
        <label for="aboutImage" class="block font-medium mb-1">Image (optional):</label>
        <input type="file" name="aboutImage" id="aboutImage" class="block w-full text-sm text-gray-600">
        <p class="text-sm text-gray-500 mt-1">Accepted formats: jpeg, png, jpg, gif. Max size: 2MB</p>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Create</button>
        <a href="{{ route('abouts.index') }}" class="text-blue-600 hover:underline">← Back</a>
    </div>
</form>
@endsection
