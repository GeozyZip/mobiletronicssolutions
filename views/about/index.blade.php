@extends('layouts.adminlayout')

@section('title', 'About Sections')

@section('content')

<h2 class="text-2xl font-semibold mb-4">About Sections</h2>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

@if(session('fail'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('fail') }}</div>
@endif

<div class="mb-4">
    <a href="{{ route('abouts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Create New
    </a>
</div>

<table class="w-full table-auto border-collapse bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3">Image</th>
            <th class="p-3">Description</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($abouts as $about)
        <tr class="border-b">
            <td class="p-3">
                @if($about->aboutImage)
                    <img src="{{ asset('about_images/' . $about->aboutImage) }}" class="w-24 h-auto rounded shadow">
                @else
                    <span class="text-gray-500">No Image</span>
                @endif
            </td>
            <td class="p-3">{{ $about->aboutDesc }}</td>
            <td class="p-3 space-x-2">
                <a href="{{ route('abouts.edit', $about->aboutId) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('abouts.destroy', $about->aboutId) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this entry?')" class="text-red-600 hover:underline">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
