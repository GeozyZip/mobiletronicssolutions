@extends('layouts.adminlayout')

@section('title', 'All Services')

@section('content')

    @php use Illuminate\Support\Str; @endphp

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    @if(session('fail'))
        <div class="text-red-600 mb-4">{{ session('fail') }}</div>
    @endif

    <div class="mb-6">
        <a href="{{ route('services.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Add New Service
        </a>
    </div>

    @if($services->count() > 0)
        <div class="overflow-hidden bg-white rounded shadow p-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="py-3 px-4 text-sm font-semibold">ID</th>
                        <th class="py-3 px-4 text-sm font-semibold">Image</th>
                        <th class="py-3 px-4 text-sm font-semibold">Service Name</th>
                        <th class="py-3 px-4 text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $service->serviceId }}</td>
                        <td class="py-2 px-4">
                            @if($service->serviceImage)
                                <img src="{{ asset('service_images/' . $service->serviceImage) }}" alt="Service Image" class="w-24">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="py-2 px-4">{{ Str::limit($service->serviceName, 100) }}</td>
                        <td class="py-2 px-4 whitespace-nowrap space-y-2">
                            <a href="{{ route('services.edit', $service->serviceId) }}" class="block bg-blue-600 text-white text-center px-3 py-1 rounded hover:bg-blue-700">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('services.destroy', $service->serviceId) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">No services found.</p>
    @endif

@endsection
