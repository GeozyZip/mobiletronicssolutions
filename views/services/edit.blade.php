@extends('layouts.adminlayout')

@section('title', 'Edit Service')

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
        <h2 class="text-2xl font-semibold mb-6">Edit Service</h2>

        <form action="{{ route('services.update', $service->serviceId) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="serviceName" class="block font-medium mb-1">Service Name</label>
                <input type="text" name="serviceName" id="serviceName" 
                    value="{{ old('serviceName', $service->serviceName) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('serviceName')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="serviceImage" class="block font-medium mb-1">Service Image</label>
                <input type="file" name="serviceImage" id="serviceImage" 
                    class="w-full px-4 py-2 border border-gray-300 rounded">
                
                @if($service->serviceImage)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                        <img 
                            src="{{ asset('service_images/' . $service->serviceImage) }}" 
                            alt="Service Image" 
                            class="w-32 rounded border cursor-pointer" 
                            onclick="openModal('{{ asset('service_images/' . $service->serviceImage) }}')"
                        >
                    </div>
                @else
                    <p class="text-gray-500 mt-1">No image uploaded</p>
                @endif

                @error('serviceImage')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">
                    💾 Update Service
                </button>
            </div>
        </form>
    </div>

    <!-- Custom Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white w-96 p-4 rounded shadow relative" onclick="event.stopPropagation()">
            <img id="modalImage" src="" alt="Full Image" class="w-full h-auto max-h-[400px] object-contain">
        </div>
    </div>

    <script>
        function openModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        document.getElementById('imageModal').addEventListener('click', function () {
            this.classList.remove('flex');
            this.classList.add('hidden');
        });
    </script>

@endsection
